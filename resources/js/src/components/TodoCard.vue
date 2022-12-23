<template>
  <div class="bg-white rounded-md p-2">
    <div class="flex gap-x-2">
      <div class="self-center">
        <sortIcon class="w-5 text-slate-400" />
      </div>
      <div class="overflow-hidden">
        <h2
          class="leading-none"
          :class="done && 'line-through decoration-secondary-400'"
        >
          {{ title }}
        </h2>
        <div class="text-sm truncate text-slate-500">{{ description }}</div>
        <span class="text-xs text-slate-400">Due on {{ dueDate }}</span>
        <div class="mt-2 flex gap-x-2 just">
          <button
            v-if="done"
            class="
              text-xs
              font-semibold
              text-slate-500
              px-2
              py-1
              rounded-md
              bg-slate-100
            "
            @click="updateDoneStatusFn(id, false)"
          >
            Mark as undone
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
            @click="updateDoneStatusFn(id, true)"
          >
            Mark as done
          </button>
          <router-link
            :to="`/${id}`"
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
            Show details
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";
import sortIcon from "@/assets/icons/sort.svg";

const props = defineProps({
  id: Number,
  title: String,
  description: String,
  dueDate: String,
  done: [Number, Boolean],
  updateDoneStatusFn: Function,
});
</script>
