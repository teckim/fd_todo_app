<template>
  <div class="pt-12">
    <h1 class="text-2xl mb-4">Create todo</h1>
    <form class="flex flex-col gap-y-3">
      <div class="flex flex-col">
        <div>Title</div>
        <input
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
        <div>Description</div>
        <textarea
          class="
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="description"
        />
      </div>
      <div class="flex flex-col">
        <div>Due date</div>
        <input
          class="
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="due_date"
          type="date"
        />
      </div>
      <button class="rounded-md px-3 py-2 bg-primary-500 text-slate-100">
        Save
      </button>
    </form>
  </div>
</template>
