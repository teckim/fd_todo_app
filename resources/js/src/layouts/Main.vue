<template>
  <div class="py-4 mb-2 text-slate-400">
    <button class="text-secondary-500" @click="onSignoutClick">Signout</button>
    <div class="text-sm">{{ email }}</div>
  </div>
  <router-view></router-view>
</template>

<script setup>
import { reactive } from "vue";
import { useRouter } from "vue-router";
import http from "@/modules/http";

const router = useRouter();
const email = reactive(localStorage.getItem("email"));

function onSignoutClick() {
  localStorage.removeItem("email");
  delete http.defaults.headers.common["X-Email"];
  router.push("/login");
}
</script>
