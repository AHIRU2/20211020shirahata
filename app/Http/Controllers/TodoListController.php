<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $items = TodoList::all();
        return view('index', ['items' => $items]);
    }

    public function add()
    {
        $contents = TodoList::all();
        return view('todo/create', ['contents' => $contents]);
    }

    public function create(Request $request)
    {
        $this->validate($request, TodoList::$rules);
        $form = $request->all();
        TodoList::create($form);
        return redirect('todo/create');
    }

    public function edit(Request $request)
    {
        $contents = TodoList::all();
        return view('todo/update', ['contents' => $contents]);
    }

    public function update(Request $request)
    {
        $this->validate($request, TodoList::$rules);
        $form = $request->all();
        unset($form['_token']);
        TodoList::where('contents', $request->contents)->update($form);
        return redirect('todo/update');
    }

    public function delete()
    {
        $contents = TodoList::all();
        return view('todo/delete', ['contents' => $contents]);
    }

    public function remove($contents)
    {
        TodoList::where('contents', $contents)->delete();
        return redirect('todo/delete');
    }
}
