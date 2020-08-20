<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel | DropDown</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    </head>
    <body style="background: #eaedf0;">

        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Laravel Aplication</a>
            </div>
        </nav>

        <div class="container">
            <div class="row pb-2 pt-2">
                <div class="col-md-12 text-right">
                <a class="btn btn-primary" href="{{url('/crud')}}">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Form
                        </div>
                        <div class="card-body">
                            <form action="{{url('/crud/edit/')}}" method="post" name="addUser" id="addUser">
                                @csrf
                                <div class="form-group">
                                    <label for="nameid">Example select</label>
                                    <select class="form-control" id="nameid" name="nameid">
                                        <option>--Select--</option>
                                        @if($cruds)
                                            @foreach($cruds as $crud)
                                                <option value="{{$crud->id}}">{{$crud->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{old('name',$crud->name)}}" placeholder="Enter Name" class="form-control {{ ($errors->any() && $errors->first('name')) ? 'is-invalid' : '' }}">
                                    @if($errors->any())
                                        <small class="form-text invalid-feedback">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="text" name="age" id="age" value="{{old('age',$crud->age)}}" placeholder="Age" class="form-control {{ ($errors->any() && $errors->first('age')) ? 'is-invalid' : '' }}">
                                    @if($errors->any())
                                        <small class="form-text invalid-feedback">{{$errors->first('age')}}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" value="{{old('address',$crud->address)}}" placeholder="Address" class="form-control {{ ($errors->any() && $errors->first('address')) ? 'is-invalid' : '' }}">
                                    @if($errors->any())
                                        <small class="form-text invalid-feedback">{{$errors->first('address')}}</small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>