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
        // $cruds = DB::table('crud')->orderBy('id')->get();
        $cruds = Crud::all();

        $name = "Add New";
        return view('list')->with(compact('cruds'))->with(compact('name'));
        // return view('list', ['cruds' => $cruds],['name' => $name]);
    }

    //Insert User
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

    //Edit Crud
    function editCrud($id, Request $request){
        $crud = Crud::where('id', $id)->first();
        
        if(!$crud){
            $request->session()->flash('errmsg','No Data Found');
            return redirect('/crud');
        }

        return view('edit')->with(compact('crud'));
    }

    function updateCrud($id, Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:20',
            'age' => 'required',
            'address' => 'required'
        ]);

        if($validator->passes()){
            $crud = Crud::find($id);
            $crud->name = $request->name;
            $crud->age = $request->age;
            $crud->address = $request->address;
            $crud->save();

            $request->session()->flash('msg','Data Updated Successfully');
            return redirect('/crud');
        }
        else{
            return redirect('crud/edit/'.$id)->withErrors($validator)->withInput();
        }
    }

    //Delete Crud
    function deleteCrud($id, Request $request){
        $crud = Crud::where('id', $id)->first();
        
        if(!$crud){
            $request->session()->flash('errmsg','No Data Found');
            return redirect('/crud');
        }

        Crud::where('id',$id)->delete();
        $request->session()->flash('msg','Data Deleted Successfully');
        return redirect('/crud');
    }

    //DropDown Form
    function ddForm(){
        $cruds = Crud::all();

        return view('ddform')->with(compact('cruds'));
    }

    function ajaxCall($id = 0){
        $id2 = $_GET['id'];
        $crud = Crud::where('id', $id2)->first();
        // return Response::json(array(
        //     'name' => 'hello',  
        // ));
        // return response()->json(['success' => true, 'html' => 'Hello']);
        // Fetch all records
        
        // $userData['data'] = $id;
        // echo json_encode($userData);
        // exit;

        $msg = "This is a simple message.id: ".$id." From Obj: ".$crud->name;
        return response()->json(array('msg'=> $msg, 'obj'=> $crud), 200);
    }

    //Test
    public function index() {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }





    
    //=== Ajax Crud ===
    public function get_crud_data(Request $request)
    {
        // $companies = Company::latest()->paginate(5);

        // return Request::ajax() ? 
        //     response()->json($companies,Response::HTTP_OK) 
        //     : abort(404);

        $cruds = Crud::all();
        return response()->json($cruds, 200);
    }

    public function store(Request $request)
    {
        $crud = new Crud;

        $crud->name = $request->name;
        $crud->age = $request->age;
        $crud->address = $request->address;

        $crud->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );
    }

    public function update(Request $request)
    {

        $crud = Crud::find($request->id);
        $crud->name = $request->name;
        $crud->age = $request->age;
        $crud->address = $request->address;
        $crud->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data Updated successfully'
            ]
        );
    }

    public function destroy($id)
    {
        $company = Crud::find($id);

        $company->delete();

        return response()->json([
            'message' => 'Data deleted successfully!'
        ]);
    }

}
