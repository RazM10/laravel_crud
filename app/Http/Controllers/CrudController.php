<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    function test(){
        echo "Hello there";
    }

    function show(){
        return view('list');
    }

    function addUser(){
        return view('add');
    }

    function saveUser(Request $request){
        dd($request->all());
    }
}
