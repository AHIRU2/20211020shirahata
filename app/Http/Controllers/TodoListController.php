<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TodoListController extends Controller
{
    public function index()
    {
        $contents = TodoList::all();
        return view('index', ['contents' => $contents]);
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $item = TodoList::where('contents', 'LIKE', "%{$request->input}%")->first();
        $param = [
            'input' => $request->input,
            'item' => $item
        ];
        return view('find', $param);
    }

    public function add()
    {
        $contents = TodoList::all();
        return view('/todo/create', ['contents' => $contents]);
    }

    public function create(Request $request)
    {
        $this->validate($request, TodoList::$rules);
        $form = $request->all();
        TodoList::create($form);
        return redirect('/todo/create');
    }

    public function edit()
    {
        $contents = TodoList::all();
        return view('/todo/update', ['contents' => $contents]);
    }

    public function update(Request $request)
    {
        $contents = $request->all();
        TodoList::where('id', $request->id)->update($contents);
        return redirect('/todo/update');
    }

    public function delete()
    {
        $contents = TodoList::all();
        return view('/todo/delete', ['contents' => $contents]);
    }

    public function remove(TodoList $contents)
    {
        $contents->delete();
        return redirect('/todo/delete');
    }
}
