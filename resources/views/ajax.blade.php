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

        <div class="container">
            <h2>Modal Example</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="age" class="col-form-label">Age:</label>
                                <input type="text" class="form-control" id="age" name="age">
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-form-label">Address:</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Modal End -->

        <!-- Table start -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
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
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Table End -->
            
        </div>

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script>
            
            var root_url = <?php echo json_encode(route('data')) ?>;
            var store = <?php echo json_encode(route('crud.store')) ?>;

            $(document).ready(function () {
                get_crud_data()

                //Get all crud
                function get_crud_data() {
                    
                    $.ajax({
                        url: root_url,
                        type:'GET',
                        data: { }
                    }).done(function(data){
                        table_data_row(data)
                    });
                }

                //Crud table row
                function table_data_row(data) {

                    var	rows = '';

                    $.each( data, function( key, value ) {
                        console.log(value.name);
                        rows = rows + '<tr>';
                        rows = rows + '<td>'+value.id+'</td>';
                        rows = rows + '<td>'+value.name+'</td>';
                        rows = rows + '<td>'+value.age+'</td>';
                        rows = rows + '<td>'+value.address+'</td>';
                        rows = rows + '<td>'+value.created_at+'</td>';
                        rows = rows + '<td data-id="'+value.id+'">';
                                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCompany" data-id="'+value.id+'" data-toggle="modal" data-target="#modal-id">Edit</a> ';
                                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCompany" data-id="'+value.id+'" >Delete</a> ';
                                rows = rows + '</td>';
                        rows = rows + '</tr>';
                    });

                    $("tbody").html(rows);
                }
            });
    
        </script>

    </body>
</html>