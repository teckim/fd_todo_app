<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user->todos()->orderBy('position', 'asc')->get();
        // return Todo::all();
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
        $todo->user_id = $request->user->id;
        $todo->save();

        return $todo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return Todo::where('id', $id)
            ->where('user_id', $request->user->id)
            ->firstOrFail();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoRequest $request, $id)
    {
        $todo = Todo::where('id', $id)
            ->where('user_id', $request->user->id)
            ->firstOrFail();

        return $todo->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $todo = Todo::where('id', $id)
            ->where('user_id', $request->user->id)
            ->firstOrFail();

        return $todo->delete();
    }

    /**
     * Mark as done the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request, $todo_id)
    {
        $todo = Todo::findOrFail($todo_id);
        $todo->done = $request["done"];
        $todo->save();

        return $todo;
    }

    public function move(Request $request, $todo_id)
    {
        $new_position = $request->new_position;

        $todo = Todo::where('id', $todo_id)
            ->where('user_id', $request->user->id)
            ->firstOrFail();

        $todo->move($new_position);

        return ['todo' => $todo];
    }
}
