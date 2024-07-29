@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Teachers</h4>
                        <a style="max-width: 150px; float: right; display: inline-block;"
                            href="{{ url('admin/add-edit-quran-teacher') }}" class="btn btn-block btn-primary"> Add
                            Quran Teacher</a>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-reponsive pt-3">
                            <table id="teachers" class="table table-bordered">
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
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td> {{ $teacher['first_name'] }} </td>
                                            <td> {{ $teacher['last_name'] }} </td>
                                            <td> {{ $teacher['address'] }} </td>
                                            <td> {{ $teacher['mobile'] }} </td>
                                            <td> {{ $teacher['email'] }} </td>
                                            <td>
                                                @if ($teacher['status'] == 0)
                                                    <a class="updateQuranTeacherStatus" id="teacher_id-{{ $teacher['id'] }}"
                                                        section_id="{{ $teacher['id'] }}" href="javascript:void(0)">
                                                        <i style="font-size: 25px;" class="mdi mdi-bookmark-outline">
                                                        </i>
                                                    </a>
                                                @elseif ($teacher['status'] == 1)
                                                    <a class="updateQuranTeacherStatus" id="teacher_id-{{ $teacher['id'] }}"
                                                        section_id="{{ $teacher['id'] }}" href="javascript:void(0)">
                                                        <i style="font-size: 25px;" class="mdi mdi-bookmark-check">
                                                        </i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/add-edit-quran-teacher/' . $teacher['id']) }}"><i
                                                        style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                <a href="{{ url('admin/delete-quran-teacher/' . $teacher['id']) }}"><i
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
