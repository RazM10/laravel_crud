<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Crud;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    function test(){
        echo "Hello there";
    }

    function show(){
        $cruds = DB::table('crud')->orderBy('id')->get();
        
        $name = "Add New";
        return view('list')->with(compact('cruds'))->with(compact('name'));
        // return view('list', ['cruds' => $cruds],['name' => $name]);
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
            $crud = new Crud;

            $crud->name = $request->name;
            $crud->age = $request->age;
            $crud->address = $request->address;

            $crud->save();

            $request->session()->flash('msg','Data Saved Successfully');
            return redirect('/crud');
        }
        else{
            return redirect('crud/add')->withErrors($validator)->withInput();
        }
    }
}
