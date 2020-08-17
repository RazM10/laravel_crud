<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel | Add</title>
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
                        Add New User Info
                    </div>
                    <div class="card-body">
                        <form action="{{url('/crud/add')}}" method="post" name="addUser" id="addUser">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="" aria-describedby="emailHelp" placeholder="Enter Name">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your Namw with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" name="age" id="age" value="" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="address" value="" placeholder="Address">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>