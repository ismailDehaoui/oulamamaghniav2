@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Add Secratry</h3>
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
                            <form class="forms-sample" action="{{ url('admin/add-secretary') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>School</label>
                                    <select class="js-example-basic-single w-100" name="school">
                                        @foreach ($schools as $school)
                                            <option value="{{ $school['id'] }}">{{ $school['school_name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="secretary_first_name">First Name</label>
                                    <input type="text" class="form-control" id="secretary_first_name"
                                        name ="secretary_first_name"
                                        @if (!empty($secretary['first_name'])) value="{{ $secretary['first_name'] }}"
                                            @else
                                                value="{{ old('first_name') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="secretary_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="secretary_last_name"
                                        name ="secretary_last_name"
                                        @if (!empty($secretary['last_name'])) value="{{ $secretary['last_name'] }}"
                                            @else
                                                value="{{ old('last_name') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="secretary_address">Address</label>
                                    <input type="text" class="form-control" id="secretary_address"
                                        name ="secretary_address"
                                        @if (!empty($secretary['address'])) value="{{ $secretary['address'] }}"
                                            @else
                                                value="{{ old('address') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="secretary_mobile">Mobile</label>
                                    <input type="text" class="form-control" id="secretary_mobile"
                                        name ="secretary_mobile"
                                        @if (!empty($secretary['mobile'])) value="{{ $secretary['mobile'] }}"
                                            @else
                                                value="{{ old('mobile') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name ="email"
                                        @if (!empty($secretary['email'])) value="{{ $secretary['email'] }}"
                                        @else
                                                value="{{ old('email') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="secretary_password">Password</label>
                                    <input type="password" class="form-control" id="secretary_password"
                                        name ="secretary_password"
                                        @if (!empty($secretary['password'])) value="{{ $secretary['password'] }}"
                                        @else
                                                value="{{ old('password') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="image" name ="image">
                                    @if (!@empty($secretary['image']))
                                        <a target="_blank"
                                            href="{{ url('admin/images/photos/secretary/' . $secretary['image']) }}">View
                                            Image</a>
                                        <input type="hidden" name="current_secretary_image"
                                            value="{{ $secretary['image'] }} ">
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
