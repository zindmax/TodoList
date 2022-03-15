<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::get();
        return view("todo", ["todos" => $todos]);
    }

    public function store(Request $request) {
        $todo = new Todo();
        $todo->todo = $request->input("todo_add");
        $todo->save();
        return redirect("/todo");
    }

    public function delete($id) {
        Todo::destroy($id);

        return redirect("/todo");
    }

    public function edit($id) {

    }

    public function complete() {

    }
}
