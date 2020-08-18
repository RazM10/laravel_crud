<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | CRUD</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body style="background: #eaedf0;">

    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel Aplication</a>
        </div>
    </nav>

    <!-- <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Laravel Application</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div> -->

    <div class="container">
        <div class="row pb-2 pt-2">
            <div class="col-md-12 text-right">
                <!-- <a class="btn btn-primary" href="{{url('crud/add')}}">Add New</a> -->
                <a class="btn btn-primary mb-1" href="{{route('crud.add')}}">{{$name}}</a>
            </div>

            @if(Session::has('msg'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('msg')}}</div>
                </div>
            @endif
            @if(Session::has('errmsg'))
                <div class="col-md-12">
                    <div class="alert alert-danger">{{Session::get('errmsg')}}</div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        User Info
                    </div>
                    <div class="card-body">
                      <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cruds)
                                    @foreach($cruds as $crud)
                                        <tr>
                                            <th scope="row">{{$crud->id}}</th>
                                            <td>{{$crud->name}}</td>
                                            <td>{{$crud->age}}</td>
                                            <td>{{$crud->address}}</td>
                                            <td>{{$crud->created_at}}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{'crud/edit/'.$crud->id}}">Edit</a>
                                                <a class="btn btn-danger" href="#" onclick="deleteCrud({{$crud->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5">Users not added yet</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function deleteCrud(id){
            if(confirm('Are you sure?')){
                window.location.href = "{{url('/crud/delete')}}/"+id;
            }
        }
    </script>

</body>
</html>