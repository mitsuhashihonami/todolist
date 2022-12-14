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
        $form= $request->input('name');
        Todolist::create($form);
        return redirect('/');
    }
}
