import { createRouter, createWebHistory } from 'vue-router'

const Main = () => import('@/layouts/Main.vue')
const Todos = () => import('@/views/Todos.vue')
const CreateTodo = () => import('@/views/CreateTodo.vue')
const Login = () => import('@/views/Login.vue')
const Signup = () => import('@/views/Signup.vue')

const router = createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: Main, children: [{ path: '/', component: Todos }, { path: '/create', component: CreateTodo }] },
    { path: '/login', component: Login },
    { path: '/signup', component: Signup }
  ],
})

export default router