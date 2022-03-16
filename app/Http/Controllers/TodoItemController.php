<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index() {
        $todos = User::find(Auth::id())->todos;
        return view("todo", ["todos" => $todos]);
    }

    public function store(Request $request) {
        $todo = new Todo();
        $todo->todo = $request->input("todo_add");
        $todo->user_id = Auth::id();
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
