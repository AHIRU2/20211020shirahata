<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class TodoListController extends Controller
{
    public function index()
    {
        $items = TodoList::all();
        return view('index', ['items' => $items]);
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

    // public function delete()
    // {
    //     $contents = TodoList::all();
    //     return view('todo/delete', ['contents' => $contents]);
    // }

    // public function remove(TodoList $contents)
    // {
    //     $contents->delete();
    //     return redirect('todo/delete');
    // }


    public function delete()
    {
        $contents = TodoList::all();
        return view('todo/delete', ['contents' => $contents]);
    }

    public function remove(TodoList $contents)
    {
        // $this->validate($request, TodoList::$rules);
        // $form = $request->all();
        // TodoList::create($form);
        TodoList::find($contents->id)->delete();
        return redirect('/');
    }
}
