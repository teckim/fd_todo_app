<template>
  <div class="bg-slate-100 min-h-screen">
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from "vue";
import { useRouter } from "vue-router";
import { login } from "@/services/auth";
import http from "@/modules/http";

onMounted(() => {
  const router = useRouter();
  const email = localStorage.getItem("email");

  if (!email) return router.push("/login");

  login(email)
    .then(({ data }) => {
      localStorage.setItem("email", data.email);
      http.defaults.headers.common["X-Email"] = email;
    })
    .catch((e) => {
      router.push("/login");
    });
});
</script>
