import { createRouter, createWebHashHistory } from 'vue-router'

const Home = () => import('@/views/Main.vue')

const router = createRouter({
  history: createWebHashHistory(),
  routes: [{ path: '/', component: Home }],
})

export default router