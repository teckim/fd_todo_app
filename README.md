## About This Project

A simple ToDo app that allows users to register and sing in with email, create and manage their ToDo list.
It's built using Laravel 9, Vue 3, TailwindCSS, and Vite.

## Install Guide

### Prerequisites

- IDE to edit and run the code (We use Visual Studio Code 🔥).
- Docker
- Node and NPM

## Project Setup

- Clone this project by the command: 

```
$ git clone https://github.com/teckim/fd_todo_app
```

- Open the project in the terminal and run `sail up` (Note: this will take sometime to install the Docker images)
- Run `sail artisan migrate` and then `sail artisan db:seed`
- Run `npm install` and then `npm run dev`
- If everything went well you will be able to access the web application from http://fd_todo.test/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
