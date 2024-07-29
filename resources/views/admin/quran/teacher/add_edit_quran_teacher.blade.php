@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Add Quran Teacher</h3>
                            {{-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> --}}
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
                            <h4 class="card-title">{{ $title }}</h4>
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
                            <form class="forms-sample"
                                @if (empty($quran_teacher['id'])) action="{{ url('admin/add-edit-quran-teacher') }}" 
                                @else 
                                    action="{{ url('admin/add-edit-quran-teacher/' . $quran_teacher['id']) }}" @endif
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="js-example-basic-single w-100" name="category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>School</label>
                                    <select class="js-example-basic-single w-100" name="school">
                                        @foreach ($schools as $school)
                                            <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quran_teacher_first_name">First Name</label>
                                    <input type="text" class="form-control" id="quran_teacher_first_name"
                                        name ="quran_teacher_first_name"
                                        @if (!empty($quran_teacher['first_name'])) value="{{ $quran_teacher['first_name'] }}"
                                        @else
                                            value="{{ old('first_name') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_teacher_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="quran_teacher_last_name"
                                        name ="quran_teacher_last_name"
                                        @if (!empty($quran_teacher['last_name'])) value="{{ $quran_teacher['last_name'] }}"
                                        @else
                                            value="{{ old('last_name') }}" @endif
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="quran_teacher_address">Address</label>
                                    <input type="text" class="form-control" id="quran_teacher_address"
                                        name ="quran_teacher_address"
                                        @if (!empty($quran_teacher['address'])) value="{{ $quran_teacher['address'] }}"
                                            @else
                                                value="{{ old('address') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_teacher_mobile">Mobile</label>
                                    <input type="text" class="form-control" id="quran_teacher_mobile"
                                        name ="quran_teacher_mobile"
                                        @if (!empty($quran_teacher['mobile'])) value="{{ $quran_teacher['mobile'] }}"
                                            @else
                                                value="{{ old('mobile') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name ="email"
                                        @if (!empty($quran_teacher['email'])) value="{{ $quran_teacher['email'] }}"
                                        @else
                                                value="{{ old('email') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_teacher_password">Password</label>
                                    <input type="password" class="form-control" id="quran_teacher_password"
                                        name ="quran_teacher_password"
                                        @if (!empty($quran_teacher['password'])) value="{{ $quran_teacher['password'] }}"
                                        @else
                                                value="{{ old('password') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_teacher_image">Image</label>
                                    <input type="file" class="form-control" id="quran_teacher_image"
                                        name ="quran_teacher_image">
                                    @if (!@empty($quran_teacher['image']))
                                        <a target="_blank"
                                            href="{{ url('admin/images/photos/quran_teacher/' . $quran_teacher['image']) }}">View
                                            Image</a>
                                        <input type="hidden" name="current_quran_teacher_image"
                                            value="{{ $quran_teacher['image'] }} ">
                                    @endif
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
