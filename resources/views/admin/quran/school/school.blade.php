@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">

                <div class="col-ms-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> All School</h4>
                            <a style="max-width: 150px; float: right; display: inline-block;"
                                href="{{ url('admin/add-edit-school') }}" class="btn btn-block btn-primary"> Add
                                School</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-reponsive ">
                                <table id="schools" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>School ID</th>
                                            <th>School Name</th>
                                            <th>School Address</th>
                                            <th>School Mobile</th>
                                            <th>School email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($schools as $school)
                                            <tr>
                                                <td> {{ $school['id'] }} </td>
                                                <td> {{ $school['school_name'] }} </td>
                                                <td> {{ $school['school_address'] }} </td>
                                                <td> {{ $school['school_mobile'] }} </td>
                                                <td> {{ $school['email'] }} </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-school/' . $school['id']) }}"><i
                                                            style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                    <a href="{{ url('admin/delete-school/' . $school['id']) }}"><i
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
