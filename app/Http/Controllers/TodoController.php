<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = User::find(Auth::id())->todos;
        return response()->view('todo.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::id());
        $category = Category::find($request->input('id'));
        $todo = new Todo();
        $todo->name = $request->input('todo_name');
        $user->todos()->save($todo);
        $category->todos()->save($todo);
        return response()->view('todo.show', ['todo' => $todo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        if ($todo->user_id === Auth::id()) {
            $items = Todo::find($id)->items;
        }else{
            return back();
        }
        $categoryId = Todo::find($id)->category_id;
        return response()->view('todo.show', ['items' => $items, 'todo' => $todo, 'catId' => $categoryId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return back();
    }
}
