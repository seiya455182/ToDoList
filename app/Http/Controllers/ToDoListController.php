<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;
use Illuminate\Support\Facades\Auth;

class ToDoListController extends Controller
{
    public function index()
    {
      $lists = ToDoList::latest()->get();
      // orderBy('created_at','desc')とlatest()はほぼ同じ
      return view('index',['lists'=>$lists]);
    }

    public function store(Request $request)
    {

      $user = Auth::user();
      $data = $request->validate([
        'todo' =>'required|string|max:10'
      ]);
      $data['user_id'] = $user->id;
      ToDoList::create($data);

      return redirect()->route('todo.index');
    }

    public function destroy($id)
    {
      $todo_delete = ToDoList::findOrFail($id);
      $todo_delete->delete();
      return redirect()->route('todo.index');
    }
}
