import http from "@/modules/http";

export const getTodos = () => http.get('/todos');

export const getTodoById = (id) => http.get(`/todos/${id}`);

export const postTodo = (todo) => http.post('/todos', todo);

export const updateTodo = (id, new_todo) => http.put(`/todos/${id}`, new_todo);

export const removeTodo = (id) => http.delete(`/todos/${id}`);

export const updateTodoDoneStatus = (id, done) => http.put(`/todos/${id}/done`, { done });

export const moveTodo = (todo_id, new_position) => http.put(`/todos/${todo_id}/move`, { new_position });
