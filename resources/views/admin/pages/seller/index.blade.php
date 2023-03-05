@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="progress-container bg-white rounded-30 p-sm-5 p-3 mb-3">
                    <div class="d-md-flex mb-4">
                        <div class="align-self-center mb-3">
                            <h2 class="primary_title text-black ">All Buyer List</h2>
                        </div>
                        {{-- <div class="ms-auto ">
                            <p>
                                <a class="sort_by" id="" href="{{ route('admin.category.create') }}">Add User</a>
                            </p>
                        </div> --}}
                    </div>
                    <div class="ms-auto">
                        <p class="rate">
                        <table id="example1" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Company</th>
                                    <th>Status by Admin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($seller) > 0)
                                    @foreach ($seller as $key => $myuser)
                                        <tr>
                                            <td>{{ ++$key }}. </td>
                                            <td>{{ $myuser->user->name }}</td>
                                            <td>{{ $myuser->user->email }}</td>
                                            <td>{{ $myuser->brand_name }}</td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control"
                                                        id="FormControlAdminSelect-{{ $myuser->id }}"
                                                        onchange="adminstatus({{ $myuser->id }});">
                                                        <option @if ($myuser->status == 1) selected @endif value='1'>
                                                            Active</option>
                                                        <option @if ($myuser->status == 0) selected @endif value='0'>
                                                            Not Active</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td style="width: 11rem">
                                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-trash mr-2"></i>
                                                    View</a>
                                                <a onclick="admindelete({{ $myuser->id }})"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-trash mr-2"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" align="center">No data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('bottom_script')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });


        function adminstatus(id) {

            //   console.log(id);
            const adminuserstatus = jQuery("#FormControlAdminSelect-" + id).val();
            //  console.log(adminuserstatus);

            swal({
                title: "Are you sure?",
                text: "Do you want to change the User status!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // var rowid = "#myphotoremoverrow-"+id;
                    // jQuery(rowid).remove();
                    $.get('{{ URL::to('/admin/userstatus/') }}/' + id + '/' + adminuserstatus, function(data) {

                        //  window.location.reload();
                    });
                    swal("Your User status has changed!", {
                        icon: "success",
                    });
                } else {
                    swal("Your User status has not changed!");
                }
            });
        }

        function adminrolechange(id) {

            //   console.log(id);
            const adminrole = jQuery("#FormControlAdminrolechange-" + id).val();
            //  console.log(adminuserstatus);

            swal({
                title: "Are you sure?",
                text: "Do you want to change the user role!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // var rowid = "#myphotoremoverrow-"+id;
                    // jQuery(rowid).remove();
                    $.get('{{ URL::to('/admin/rolechange/') }}/' + id + '/' + adminrole, function(data) {

                        //  window.location.reload();
                    });
                    swal("Your User role has changed!", {
                        icon: "success",
                    });
                } else {
                    swal("Your User role has not changed!");
                }
            });
        }

        function admindelete(id) {

            //   console.log(id);
            // const adminrole = jQuery("#FormControlAdminrolechange-"+id).val();
            //  console.log(adminuserstatus);

            swal({
                title: "Are you sure?",
                text: "Do you want to delete the user!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    // var rowid = "#myphotoremoverrow-"+id;
                    // jQuery(rowid).remove();
                    $.get('{{ URL::to('/admin/delete/') }}/' + id, function(data) {

                        window.location.reload();
                    });
                    swal("Your User role has delete!", {
                        icon: "success",
                    });
                } else {
                    swal("Your User role has not delete!");
                }
            });
        }
    </script>
@endsection