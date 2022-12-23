<template>
  <div class="pt-12">
    <div class="mb-4">
      <h1 class="text-xl">Create todo</h1>
      <p v-if="state.error" class="text-sm text-red-400">
        {{ state.error }}
      </p>
    </div>
    <form class="flex flex-col gap-y-3">
      <div class="flex flex-col">
        <div class="text-sm">Title</div>
        <input
          v-model="state.todo.title"
          class="
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="title"
          type="text"
        />
      </div>
      <div class="flex flex-col">
        <div class="text-sm">Description</div>
        <textarea
          v-model="state.todo.description"
          class="
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="description"
        />
      </div>
      <div class="flex flex-col">
        <div class="text-sm">Due date</div>
        <input
          v-model="state.todo.due_date"
          class="
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="due_date"
          type="date"
        />
      </div>
      <button
        class="rounded-md px-3 py-2 bg-primary-500 text-slate-100"
        @click.prevent="onSaveClick"
      >
        Save
      </button>
    </form>
  </div>
</template>

<script setup>
import { onMounted, reactive } from "vue";
import { useRouter, useRoute } from "vue-router";
import { updateTodo, getTodoById } from "@/services/todo";

const router = useRouter();
const route = useRoute();
const state = reactive({
  error: null,
  todo: {
    title: null,
    description: null,
    due_date: null,
  },
});

onMounted(() => {
  getTodoById(route.params.id)
    .then(({ data }) => (state.todo = data))
    .finally(() => (state.loading = false));
});

function onSaveClick() {
  updateTodo(route.params.id, state.todo)
    .then(() => {
      router.push("/");
    })
    .catch((e) => {
      state.error =
        e?.response?.data?.message || "Somthing went wrong, please try again.";
    });
}
</script>
