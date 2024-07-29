@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> All Categories</h4>

                            <a style="max-width: 150px; float: right; display: inline-block;"
                                href="{{ url('admin/add-edit-category') }}" class="btn btn-block btn-primary"> Add
                                Category</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-reponsive pt-3">
                                <table id="categories" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td> {{ $category['id'] }} </td>
                                                <td> {{ $category['name'] }} </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-category/' . $category['id']) }}"><i
                                                            style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                    <a href="{{ url('admin/delete-category/' . $category['id']) }}"><i
                                                            style="font-size: 25px;" class="mdi mdi-file-excel-box"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
