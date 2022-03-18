<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $todos = User::find(Auth::id())->todos;
        return response()->view('todos.index', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = User::find(Auth::id())->categories;
        return view('todos.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TodoRequest  $request
     * @return Response
     */
    public function store(TodoRequest $request)
    {
        $validated = $request->validated();
        $todo = new Todo();
        $user = User::find(Auth::id());
        $todo->name = $validated['todo_name'];
        $user->todos()->save($todo);
        if ($request->input('category') !== null) {
            $category = Category::find($request->input('category'));
            $category->todos()->save($todo);
        }
        return response()->view('todos.show', ['todo' => $todo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
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
        return response()->view('todos.show', ['items' => $items, 'todo' => $todo, 'catId' => $categoryId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
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
