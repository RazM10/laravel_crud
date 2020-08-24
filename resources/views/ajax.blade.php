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
            <button type="button" class="btn btn-info btn-lg" id="createNewCrud">Open Modal</button>

            <!-- Modal -->
            <div class="modal fade" id="modal-id" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="userCrudModal">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="cruddata">
                            <input type="hidden" id="crud_id" name="crud_id" value="">
                            
                            <div class="modal-body">
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
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" id="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
                                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="editCrud" data-id="'+value.id+'" data-toggle="modal" data-target="#modal-id">Edit</a> ';
                                rows = rows + '<a class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteCrud" data-id="'+value.id+'" >Delete</a> ';
                                rows = rows + '</td>';
                        rows = rows + '</tr>';
                    });

                    $("tbody").html(rows);
                }


                
                //Insert crud data
                $("body").on("click","#createNewCrud",function(e){

                    e.preventDefault;
                    $('#userCrudModal').html("Create Crud");
                    $('#submit').val("Create crud");
                    $('#modal-id').modal('show');
                    $('#crud_id').val('0');
                    $('#cruddata').trigger("reset");

                });



                //Save data into database
                $('body').on('click', '#submit', function (event) {
                    event.preventDefault()
                    var id = $("#crud_id").val();
                    var name = $("#name").val();
                    var age = $("#age").val();
                    var address = $("#address").val();
                    if(id == 0){
                        $.ajax({
                            url: store,
                            type: "GET",
                            data: {
                                // id: id,
                                name: name,
                                age: age,
                                address: address
                            },
                            dataType: 'json',
                            success: function (data) {
                                
                                $('#cruddata').trigger("reset");
                                $('#modal-id').modal('hide');
                                console.log("Saved");
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Success',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                                get_crud_data()
                            },
                            error: function (data) {
                                console.log('Error......');
                            }
                        });
                    }
                    else{
                        $.ajax({
                            url: store,
                            type: "GET",
                            data: {
                                id: id,
                                name: name,
                                age: age,
                                address: address
                            },
                            dataType: 'json',
                            success: function (data) {
                                
                                $('#cruddata').trigger("reset");
                                $('#modal-id').modal('hide');
                                console.log("Saved");
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Success',
                                    showConfirmButton: false,
                                    timer: 3000
                                })
                                get_crud_data()
                            },
                            error: function (data) {
                                console.log('Error......');
                            }
                        });
                    }
                    
                });


                //Edit modal window
                $('body').on('click', '#editCrud', function (event) {

                    event.preventDefault();
                    var id = $(this).data('id');
                    console.log("id is: "+id);

                    $.ajax({
                        // url: '/crud/ajaxCall/'+nameid,
                        url: "{{url('/ajax/edit')}}/"+id,
                        type: 'GET',
                        data: { id: id },
                        success: function(response){
                            console.log(response.msg+", yes data retrieve done");
                            $('#userCrudModal').html("Edit company");
                            $('#submit').val("Edit company");
                            $('#modal-id').modal('show');
                            $('#crud_id').val(response.obj.id);
                            $('#name').val(response.obj.name);
                            $('#age').val(response.obj.age);
                            $('#address').val(response.obj.address);
                        }
                    });

                    // $.get('/ajax/'+ id ='/edit', function (data) {
                        
                    //     $('#userCrudModal').html("Edit company");
                    //     $('#submit').val("Edit company");
                    //     $('#modal-id').modal('show');
                    //     $('#crud_id').val(data.data.id);
                    //     $('#name').val(data.data.name);
                    //     $('#age').val(data.data.age);
                    //     $('#address').val(data.data.address);
                    // })
                });


            });
    
        </script>

    </body>
</html>