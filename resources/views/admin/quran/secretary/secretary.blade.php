@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-ms-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> All Secretaries</h4>
                            <a style="max-width: 150px; float: right; display: inline-block;"
                                href="{{ url('admin/add-secretary') }}" class="btn btn-block btn-primary"> Add
                                Secretary</a>
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-reponsive ">
                                <table id="secretaries" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>last Name</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>email</th>
                                            <th>Statut</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($secretaries as $secretary)
                                            <tr>

                                                <td> {{ $secretary['first_name'] }} </td>
                                                <td> {{ $secretary['last_name'] }} </td>
                                                <td> {{ $secretary['address'] }} </td>
                                                <td> {{ $secretary['mobile'] }} </td>
                                                <td> {{ $secretary['email'] }} </td>
                                                <td>
                                                    @if ($secretary['status'] == 0)
                                                        <a class="updateQuranSecretaryStatus"
                                                            id="secretary_id-{{ $secretary['id'] }}"
                                                            section_id="{{ $secretary['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px;" class="mdi mdi-bookmark-outline">
                                                            </i>
                                                        </a>
                                                    @elseif ($secretary['status'] == 1)
                                                        <a class="updateQuranSecretaryStatus"
                                                            id="secretary_id-{{ $secretary['id'] }}"
                                                            section_id="{{ $secretary['id'] }}" href="javascript:void(0)">
                                                            <i style="font-size: 25px;" class="mdi mdi-bookmark-check">
                                                            </i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-secretary/' . $secretary['id']) }}"><i
                                                            style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                    <a href="{{ url('admin/delete-secretary/' . $secretary['id']) }}"><i
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

    </div>
@endsection