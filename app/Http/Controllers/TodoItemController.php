<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoItemController extends Controller
{
    public function index($id)
    {
        $todo = Todo::find($id);
        if ($todo->user_id === Auth::id()) {
            $items = Todo::find($id)->items;
        }else{
            return back();
        }
        $categoryId = Todo::find($id)->category_id;
        return view('todo', ['items' => $items, 'todo' => $todo, 'catId' => $categoryId]);
    }

    public function store(Request $request, $id)
    {
        $todo = Todo::find($id);
        $item = new TodoItem();
        $item->todo = $request->input('todo_add');
        $todo->items()->save($item);
        return redirect()->route('show_items', [$id]);
    }

    public function delete($id, $itemId)
    {
        TodoItem::destroy($itemId);
        return redirect()->route('show_items', ['id' => $id]);
    }

    public function edit($id)
    {

    }

    public function complete()
    {

    }
}
