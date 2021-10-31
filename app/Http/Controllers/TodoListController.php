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

    public function create(Request $request)
    {
        $this->validate($request, TodoList::$rules);
        $form = $request->all();
        TodoList::create($form);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $contents = $request->all();
        unset($contents['_token']);
        TodoList::where('id', $request->id)->update($contents);
        return redirect('/');
    }

    public function remove(TodoList $contents)
    {
        $contents->delete();
        return redirect('/');
    }
}
