@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Add/Edit School</h3>
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
                                @if (empty($school['id'])) action="{{ url('admin/add-edit-school') }}" 
                                @else 
                                    action="{{ url('admin/add-edit-school/' . $school['id']) }}" @endif
                                method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="school_name">School Name</label>
                                    <input type="text" class="form-control" id="school_name" name ="school_name"
                                        @if (!empty($school['school_name'])) value="{{ $school['school_name'] }}"
                                            @else
                                                value="{{ old('school_name') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="school_address">School Address</label>
                                    <input type="text" class="form-control" id="school_address" name ="school_address"
                                        @if (!empty($school['school_address'])) value="{{ $school['school_address'] }}"
                                            @else
                                                value="{{ old('school_address') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="school_description">School Description</label>
                                    <input type="text" class="form-control" id="school_description"
                                        name ="school_description"
                                        @if (!empty($school['school_description'])) value="{{ $school['school_description'] }}"
                                            @else
                                                value="{{ old('school_description') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="school_mobile">School Mobile</label>
                                    <input type="text" class="form-control" id="school_mobile" name ="school_mobile"
                                        @if (!empty($school['school_mobile'])) value="{{ $school['school_mobile'] }}"
                                            @else
                                                value="{{ old('school_mobile') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="email">School Email</label>
                                    <input type="text" class="form-control" id="email" name ="email"
                                        @if (!empty($school['email'])) value="{{ $school['email'] }}"
                                        @else
                                                value="{{ old('email') }}" @endif
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="school_image">School Image</label>
                                    <input type="file" class="form-control" id="school_image" name ="school_image">
                                    @if (!@empty($school['school_image']))
                                        <a target="_blank"
                                            href="{{ url('admin/images/photos/school' . $school['school_image']) }}">View
                                            Image</a>
                                        <input type="hidden" name="current_school_image"
                                            value="{{ $school['school_image'] }} ">
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
