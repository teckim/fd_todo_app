<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = new Todo($request->all());
        $todo->save();

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return $todo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        return $todo->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        return $todo->delete();
    }

    /**
     * Mark as done the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done(UpdateTodoRequest $request, $todo_id)
    {
        $todo = Todo::findOrFail($todo_id);
        $todo->done = $request["done"];
        $todo->save();

        return $todo;
    }
}
