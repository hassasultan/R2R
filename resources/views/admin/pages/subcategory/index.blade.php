@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="progress-container bg-white rounded-30 p-sm-5 p-3 mb-3">
                    <div class="d-md-flex mb-4">
                        <div class="align-self-center mb-3">
                            <h2 class="primary_title text-black "> Sub Categories List</h2>
                        </div>
                        <div class="ms-auto ">
                            <p>
                                <span><i class="fa-solid fa-filter filter_icon me-3"></i></span>
                                <!--<span class="sort_by">Sort by: Popular Class</span>-->
                                <a class="sort_by" id="" href="{{ route('admin.subcategory-create') }}">Add SubCategory</a>
                            </p>
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($subCat) > 0)
                        @foreach ($subCat as $key=>$row)
                        <tr>
                            <td>{{ ++$key }}. </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                <img src="{{ asset('public/storage/'.$row->avatar) }}" style="width: 100px; height: 100px; border-radius: 50%;"/>
                            </td>
                            <td style="width: 11rem">
                            <a href="#" class="btn btn-info btn-sm"><i
                                class="fas fa-edit mr-2"></i> Edit</a>

                            <a onclick="admindelete({{$row->id}})" class="btn btn-danger btn-sm"><i
                                class="fa fa-trash mr-2"></i> Delete</a>
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
@endsection
@section('bottom_script')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "searching": false,
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
</script>
@endsection