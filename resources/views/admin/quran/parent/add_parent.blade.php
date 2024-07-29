@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Add Perent</h3>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <h3 class="btn btn-sm btn-light bg-white " aria-haspopup="true" aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> <span id="currentDateDisplay"></span>
                                    </h3>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Father</h4>
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('admin/add-parent') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="parent_first_name_father">First Name</label>
                                    <input type="text" class="form-control" id="parent_first_name_father"
                                        name ="parent_first_name_father" value="{{ old('first_name') }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="parent_last_name_father">Last Name</label>
                                    <input type="text" class="form-control" id="parent_last_name_father"
                                        name ="parent_last_name_father" value="{{ old('last_name') }}" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sexe</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe_father"
                                                    id="membershipRadios1" value="male" checked>
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe_father"
                                                    id="membershipRadios2" value="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="parent_mobile_father">Mobile</label>
                                    <input type="text" class="form-control" id="parent_mobile_father"
                                        name ="parent_mobile_father" value="{{ old('mobile') }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="parent_profession_father">Profession</label>
                                    <input type="text" class="form-control" id="parent_profession_father"
                                        name ="parent_profession_father" value="{{ old('profession') }}" required="">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add mother</h4>
                            @if (Session::has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (Session::has('success_message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error:</strong> {{ Session::get('error_message') }}
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="parent_first_name_mother">First Name</label>
                                <input type="text" class="form-control" id="parent_first_name_mother"
                                    name ="parent_first_name_mother" value="{{ old('first_name') }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="parent_last_name_mother">Last Name</label>
                                <input type="text" class="form-control" id="parent_last_name_mother"
                                    name ="parent_last_name_mother" value="{{ old('last_name') }}" required="">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Sexe</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sexe_mother"
                                                id="membershipRadios1" value="male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="sexe_mother"
                                                id="membershipRadios2" value="female" checked>
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="parent_mobile_mother">Mobile</label>
                                <input type="text" class="form-control" id="parent_mobile_mother"
                                    name ="parent_mobile_mother" value="{{ old('mobile') }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="parent_profession_mother">Profession</label>
                                <input type="text" class="form-control" id="parent_profession_mother"
                                    name ="parent_profession_mother" value="{{ old('profession') }}" required="">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection
