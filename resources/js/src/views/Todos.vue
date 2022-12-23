<template>
  <div class="flex flex-col gap-y-4 pb-8">
    <router-link
      class="rounded-md text-center px-3 py-2 bg-primary-500 text-slate-100"
      to="/create"
    >
      Create new todo
    </router-link>
    <div class="p-1 px-2 text-sm bg-slate-200 text-slate-500 rounded-md">
      Drag and drop to reorganize ToDos
    </div>
    <VueDraggableNext
      v-if="state.todos?.length"
      class="flex flex-col gap-y-2"
      :list="state.todos"
      @change="onDrop"
    >
      <transition-group>
        <TodoCard
          v-for="todo in state.todos"
          :key="todo.id"
          :id="todo.id"
          :title="todo.title"
          :dueDate="todo.due_date"
          :description="todo.description"
          :done="todo.done"
          :updateDoneStatusFn="updateDoneStatus"
        />
      </transition-group>
    </VueDraggableNext>
    <div v-else-if="!state.loading">
      <span>No todos yet, let's create one 👆</span>
    </div>
  </div>
</template>

<script>
import { VueDraggableNext } from "vue-draggable-next";
import TodoCard from "@/components/TodoCard.vue";
import { getTodos, moveTodo, updateTodoDoneStatus } from "@/services/todo";

let todosClone = [];

export default {
  name: "TodosView",
  components: {
    VueDraggableNext,
    TodoCard,
  },
  data() {
    return {
      state: {
        todos: [],
        loading: true,
      },
    };
  },

  mounted() {
    this.fetch();
  },

  methods: {
    fetch() {
      this.state.loading = true;
      getTodos()
        .then(({ data }) => {
          todosClone = JSON.parse(JSON.stringify(data));
          this.state.todos = data;
        })
        .finally(() => (this.state.loading = false));
    },
    onDrop(event) {
      const todo_id = event.moved.element.id;
      const new_position = todosClone[event.moved.newIndex].position;

      moveTodo(todo_id, new_position)
        .then(({ data }) => console.log(data))
        .catch((e) => console.log(e));
    },
    updateDoneStatus(id, done) {
      updateTodoDoneStatus(id, done).then(() => this.fetch());
    },
  },
};
</script>
