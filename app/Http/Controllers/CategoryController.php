<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [];
        if (Auth::check()) {
            $categories = User::find(Auth::id())->categories;
        }
        return view('categories', ['categories' => $categories]);
    }

    public function add(Request $request)
    {
        $user = User::find(Auth::id());
        $category = new Category();
        $category->name = $request->input('category_name');
        $user->categories()->save($category);
        return redirect()->route('show_categories');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('show_categories');
    }
}
