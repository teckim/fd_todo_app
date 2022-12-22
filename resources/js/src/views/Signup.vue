<template>
  <div class="h-screen flex justify-center items-center">
    <div class="flex flex-col gap-y-12">
      <div class="text-center">
        <h1 class="text-2xl uppercase font-bold">Welcome</h1>
        <span class="text-slate-500 text-sm">Never miss a ToDo with us</span>
      </div>
      <form class="flex flex-col gap-y-2">
        <input
          class="
            w-64
            mb-2
            bg-slate-100
            rounded-md
            hover:ring-primary-500 hover:border-primary-500
          "
          name="email"
          type="email"
          placeholder="example@email.com"
        />
        <button
          class="rounded-md px-3 py-2 bg-primary-500 text-slate-100"
          @click.prevent="onSignupClick"
        >
          Sign Up
        </button>
        <p class="text-sm text-slate-400">
          Don't have an account?
          <router-link
            class="text-primary-500 underline underline-offset-4"
            to="/login"
            >Login</router-link
          >
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import { signup } from "@/modules/auth";

const state = reactive({ email: "" });

function onSignupClick() {
  signup(state.email);
}
</script>