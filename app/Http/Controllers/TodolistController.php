<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Http\Requests\TodolistRequest;

class TodolistController extends Controller
{
    public function index()
    {
        $todos = Todolist::all();
        
        return view('todolist.index',['todos'=>$todos]);
    }

    public function create(TodolistRequest $request)
    {
        $form= $request->all();
        unset($form['_token']);
        Todolist::create($form);
        return redirect('/');
    }

    public function update(TodolistRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todolist::where('id', $request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        Todolist::find($request->id)->delete();

        return redirect('/');
    }
}
