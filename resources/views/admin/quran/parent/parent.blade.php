@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Parent</h4>
                        <a style="max-width: 150px; float: right; display: inline-block;" href="{{ url('admin/add-parent') }}"
                            class="btn btn-block btn-primary"> Add
                            Parent</a>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-reponsive pt-3">
                            <table id="parents" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>last Name</th>
                                        <th>Mobile</th>
                                        <th>Sexe</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($parents as $parent)
                                        <tr>
                                            <td> {{ $parent['first_name'] }} </td>
                                            <td> {{ $parent['last_name'] }} </td>
                                            <td> {{ $parent['mobile'] }} </td>
                                            <td> {{ $parent['sexe'] }} </td>
                                            <td>
                                                <a href="{{ url('admin/edit-parent/' . $parent['id']) }}"><i
                                                        style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                <a href="{{ url('admin/delete-parent/' . $parent['id']) }}"><i
                                                        style="font-size: 25px;"
                                                        class="mdi mdi-file-excel-box delete-btn"></i></a>
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
@endsection
