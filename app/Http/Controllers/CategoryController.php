<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = [];
        if (Auth::check()) {
            $categories = User::find(Auth::id())->categories;
        }
        foreach ($categories as $category) {
            $todos = Category::find($category->id)->todos;
            if($todos->isNotEmpty()) {
                $category->isset = true;
            }else{
                $category->isset = false;
            }
        }
        return response()->view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $user = User::find(Auth::id());
        $category = new Category();
        $category->name = $validated['category_name'];
        $user->categories()->save($category);
        return redirect()->route('categories.show', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Category::find($id)->user_id === Auth::id()) {
            $category = Category::find($id);
            $todos = Category::find($id)->todos;
        }else{
            return back();
        }
        return response()->view('categories.show', ['todos' => $todos, 'category' => $category]);
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
        Category::destroy($id);
        return redirect()->route('categories.index');
    }
}
