<template>
  <div class="h-screen flex justify-center items-center">
    <div class="w-full max-w-xs flex flex-col gap-y-12">
      <div class="text-center">
        <h1 class="text-2xl uppercase font-bold">Welcome Back</h1>
        <span class="text-slate-500 text-sm"
          >Let's see what you have todo today</span
        >
      </div>
      <form class="flex flex-col gap-y-2">
        <div class="mb-2">
          <input
            v-model="state.email"
            class="
              w-full
              bg-slate-100
              rounded-md
              hover:ring-primary-500 hover:border-primary-500
            "
            name="email"
            type="email"
            placeholder="example@email.com"
          />
          <p v-if="state.error" class="text-sm text-red-400">
            {{ state.error }}
          </p>
        </div>
        <button
          class="rounded-md px-3 py-2 bg-primary-500 text-slate-100"
          @click.prevent="onLoginClick"
        >
          Log In
        </button>
        <p class="text-sm text-slate-400">
          Don't have an account?
          <router-link
            class="text-primary-500 underline underline-offset-4"
            to="/signup"
            >Signup</router-link
          >
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import { login } from "@/services/auth";
import http from "@/modules/http"

const router = useRouter();
const state = reactive({ email: null, error: null });

function onLoginClick() {
  state.error = null;

  login(state.email)
    .then(({ data }) => {
      localStorage.setItem("email", data.email);
      http.defaults.headers.common['X-Email'] = state.email
      router.push("/");
    })
    .catch((e) => {
      state.error =
        e?.response?.data?.message || "There's no user with that email";
    });
}
</script>

