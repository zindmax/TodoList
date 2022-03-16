<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index($id)
    {
        if (Category::find($id)->user_id === Auth::id()) {
            $todos = Category::find($id)->todos;
        }else{
            return back();
        }
        return view('todos', ['todos' => $todos, 'catId' => $id]);
    }

    public function add(Request $request, $id)
    {
        $user = User::find(Auth::id());
        $category = Category::find($id);
        $todo = new Todo();
        $todo->name = $request->input('todo_name');
        $user->todos()->save($todo);
        $category->todos()->save($todo);
        return redirect()->route('show_category', ['id' => $id]);
    }

    public function delete($id)
    {
        Todo::destroy($id);
        return back();
    }
}
