<template>
  <div class="flex flex-col gap-y-2">
    <div class="flex gap-x-2">
      <router-link
        to="/"
        class="
          text-xs
          font-semibold
          text-primary-500
          px-2
          py-1
          rounded-md
          bg-primary-100
        "
      >
        All ToDos
      </router-link>
      <button
        class="
          text-xs
          font-semibold
          text-red-500
          px-2
          py-1
          rounded-md
          bg-red-100
        "
        @click="onRemoveClick"
      >
        Remove 🗑️
      </button>
      <button
        v-if="state.todo.done"
        class="
          text-xs
          font-semibold
          text-slate-600
          px-2
          py-1
          rounded-md
          bg-slate-200
        "
        @click="onDoneClick(false)"
      >
        Mark as undone 🤞
      </button>
      <button
        v-else
        class="
          text-xs
          font-semibold
          text-green-500
          px-2
          py-1
          rounded-md
          bg-green-100
        "
        @click="onDoneClick(true)"
      >
        Mark as done 👌
      </button>
    </div>
    <div class="pb-8">
      <h1 class="text-xl">{{ state.todo.title }}</h1>
      <p class="text-slate-500">{{ state.todo.description }}</p>
      <div class="mt-2 text-sm text-slate-400">
        Due on {{ state.todo.due_date }}
      </div>
      <div class="text-sm text-slate-400">
        {{ state.todo.done ? "Done ✅" : "Waiting ⌛" }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, reactive } from "vue";
import { useRoute, useRouter } from "vue-router";
import { getTodoById, updateTodoDoneStatus, removeTodo } from "@/services/todo";

const route = useRoute();
const router = useRouter();
const state = reactive({ todo: {}, loading: true });

onMounted(() => {
  state.loading = true;

  getTodoById(route.params.id)
    .then(({ data }) => (state.todo = data))
    .finally(() => (state.loading = false));
});

function onDoneClick(done) {
  updateTodoDoneStatus(route.params.id, done).then(
    (res) => (state.todo.done = done)
  );
}

function onRemoveClick() {
  removeTodo(route.params.id).then((res) => router.push("/"));
}
</script>
