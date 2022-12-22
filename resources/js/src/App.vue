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
import { login } from "@/modules/auth";

onMounted(() => {
  const router = useRouter();
  const email = localStorage.getItem("email");
  console.log(email);

  if (!email) return router.push("/login");

  login(email)
    .then(({ data }) => {
      localStorage.setItem("email", data.email);
    })
    .catch(() => router.push("/login"));
});
</script>
