@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> All Student</h4>
                        <div class="container">
                            <div class="main-body">

                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('admin/quran-student') }}">All
                                                Student</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                                <!-- /Breadcrumb -->

                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="{{ url('admin/images/photos/quran_student/' . $student['image']) }}"
                                                        alt="Admin" class="rounded-circle" width="150">
                                                    <div class="mt-3">
                                                        <h4>{{ $student['firstName'] }} {{ $student['lastname'] }}</h4>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mt-3">
                                            <ul class="list-group list-group-flush">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">School</h6>
                                                    <span class="text-secondary">{{ $school->school_name }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Category</h6>
                                                    <span class="text-secondary">{{ $category->name }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Birthday date</h6>
                                                    <span class="text-secondary">{{ $student->dateOfBirthday }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">N° Parties the Quran</h6>
                                                    <span class="text-secondary">{{ $student->N_parties_the_Koran }}</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0">Current party</h6>
                                                    <span class="text-secondary">{{ $student->current_party }}</span>
                                                </li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h2 class="d-flex align-items-center mb-3"><i
                                                        class="material-icons text-info mr-2">Family</i>information
                                                </h2>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Father</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $father->first_name }} {{ $father->last_name }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Profession father</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $father->profession }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Mobile father</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $father->mobile }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Mother</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $mother->first_name }} {{ $mother->last_name }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Profession mother</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $mother->profession }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Mobile mother</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $mother->mobile }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Statut familly</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $student->statut_familly }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Statut</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $student->statut }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h2 class="d-flex align-items-center mb-3"><i
                                                        class="material-icons text-info mr-2">Health</i>information
                                                </h2>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Health condition</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{ $student->type_malade }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
