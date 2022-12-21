<template>
  <div class="flex bg-white rounded-md px-4 py-2">
    <div class="overflow-hidden">
      <h2 class="text-xl">{{ title }}</h2>
      <p class="text-slate-500 text-sm truncate">{{ description }}</p>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";
const props = defineProps({
  title: String,
  description: String,
  dueDate: String,
});
</script>
