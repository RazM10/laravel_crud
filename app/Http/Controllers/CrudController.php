<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:20',
            'age' => 'required',
            'address' => 'required'
        ]);

        if($validator->passes()){
            echo "success";
        }
        else{
            echo "fail";
        }
    }
}
