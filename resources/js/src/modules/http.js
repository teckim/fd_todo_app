import axios from "axios";

const API_BASE_URL = import.meta.env.API_URL || 'http://fd_todo.test/api';

const http = axios.create({ baseURL: API_BASE_URL });

http.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response.status === 401) {
      localStorage.removeItem('user');
      localStorage.removeItem('jwt');
      console.log('401')
      // window.location = '/login';
    }

    return Promise.reject(error);
  },
);

export default http;