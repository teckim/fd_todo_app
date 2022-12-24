## About This Project

A simple ToDo app that allows users to register and sing in with email, create and manage their ToDo list.
It's built using Laravel 9, Vue 3, TailwindCSS, and Vite.

## Screenshots

<img width="373" alt="Screenshot 2022-12-24 at 12 28 36 AM" src="https://user-images.githubusercontent.com/30724283/209415018-a2f109b6-25a7-4151-bd1e-3d926a1b875a.png">
<img width="373" alt="Screenshot 2022-12-24 at 12 55 22 AM" src="https://user-images.githubusercontent.com/30724283/209415013-5b1a3acd-d66a-48c1-a580-af5a04587592.png">
<img width="373" alt="Screenshot 2022-12-24 at 12 55 52 AM" src="https://user-images.githubusercontent.com/30724283/209415008-a8cc5f24-5829-4f73-ac1b-9860b885812a.png">
<img width="373" alt="Screenshot 2022-12-24 at 12 56 01 AM" src="https://user-images.githubusercontent.com/30724283/209415005-51bdb3b3-eeca-467b-ab0f-2ee7b7eebfe6.png">
<img width="373" alt="Screenshot 2022-12-24 at 12 56 15 AM" src="https://user-images.githubusercontent.com/30724283/209415002-c7d9b838-54f3-43e0-a9c3-be67f65a241a.png">
<img width="373" alt="Screenshot 2022-12-24 at 12 56 26 AM" src="https://user-images.githubusercontent.com/30724283/209414999-0c73198a-9b0a-43f5-a961-7fdded0ff399.png">

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
