import { createRouter, createWebHistory } from 'vue-router'

const Main = () => import('@/layouts/Main.vue')
const Todos = () => import('@/views/Todos.vue')
const CreateTodo = () => import('@/views/CreateTodo.vue')
const UpdateTodo = () => import('@/views/UpdateTodo.vue')
const Todo = () => import('@/views/Todo.vue')
const Login = () => import('@/views/Login.vue')
const Signup = () => import('@/views/Signup.vue')

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: Main,
      children: [
        { path: '', component: Todos },
        { path: '/create', component: CreateTodo },
        { path: '/:id', component: Todo },
        { path: '/:id/update', component: UpdateTodo }
      ]
    },
    { path: '/login', component: Login },
    { path: '/signup', component: Signup }
  ],
})

export default router