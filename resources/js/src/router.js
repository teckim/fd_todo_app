import { createRouter, createWebHistory } from 'vue-router'

const Main = () => import('@/layouts/Main.vue')
const Todos = () => import('@/views/Todos.vue')
const CreateTodo = () => import('@/views/CreateTodo.vue')
const Auth = () => import('@/views/Auth.vue')

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: Main, children: [{ path: '/', component: Todos }, { path: '/create', component: CreateTodo }] },
    { path: '/auth', component: Auth }
  ],
})

export default router