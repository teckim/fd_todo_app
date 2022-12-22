import http from "@/modules/http"

export const login = (email) => http.post('/login', { email })

export const signup = (email) => http.post('/signup', { email })
