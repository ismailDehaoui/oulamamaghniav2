@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Student</h4>
                        <a style="max-width: 150px; float: right; display: inline-block;"
                            href="{{ url('admin/add-quran-student') }}" class="btn btn-block btn-primary"> Add
                            Quran Student</a>
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="table-reponsive pt-3">

                            <table id="students" class="table table-bordered students">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Date Of Birthday</th>
                                        <th>Malad</th>
                                        <th>Type Malade</th>
                                        <th>N° Parties The Koran</th>
                                        <th>Current Party</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quran_students as $quran_student)
                                        <tr>

                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}"
                                                    class="tiles default">
                                                    {{ $quran_student['firstName'] }}
                                                </a>
                                            </td>


                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['lastName'] }}
                                                </a>
                                            </td>
                                            >

                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['dateOfBirthday'] }}
                                                </a>
                                            </td>


                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['malad'] }}
                                                </a>
                                            </td>


                                            <td><a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['type_malade'] }}
                                                </a>
                                            </td>


                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['N_parties_the_Koran'] }}
                                                </a>
                                            </td>


                                            <td>
                                                <a href="{{ url('admin/profile/' . $quran_student['id']) }}">
                                                    {{ $quran_student['current_party'] }}
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ url('admin/edit-quran-student/' . $quran_student['id']) }}"><i
                                                        style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                <a href="{{ url('admin/edit-current-party/' . $quran_student['id']) }}"><i
                                                        style="font-size: 25px;" class="mdi mdi-pencil-box"></i></a>
                                                <a href="{{ url('admin/delete-quran-student/' . $quran_student['id']) }}"><i
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
