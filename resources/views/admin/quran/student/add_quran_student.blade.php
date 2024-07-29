@extends('admin.layout.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">{{ $title }}</h3>
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
                {{-- Personal information & Subscription information --}}
                <div class="col-md-6 grid-margin ">
                    {{-- Personal information --}}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Personal information</h4>
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
                            <form class="forms-sample" action="{{ url('admin/add-quran-student') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="quran_student_first_name">First Name</label>
                                    <input type="text" class="form-control" id="quran_student_first_name"
                                        name ="quran_student_first_name" value="{{ old('first_name') }}" required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_student_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="quran_student_last_name"
                                        name ="quran_student_last_name" value="{{ old('last_name') }}" required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sexe</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe"
                                                    id="membershipRadios1" value="Homme" checked>
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe"
                                                    id="membershipRadios2" value="Femme">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quran_student_date_of_birthday">Date of birthday</label>
                                    <input type="date" class="form-control" id="quran_student_date_of_birthday"
                                        name ="quran_student_date_of_birthday" value="{{ old('dateOfBirthday') }}"
                                        required="">
                                </div>

                                <div class="form-group">
                                    <label for="quran_student_image">Image</label>
                                    <input type="file" class="form-control" id="quran_student_image"
                                        name ="quran_student_image">
                                    @if (!@empty($quran_student['image']))
                                        <a target="_blank"
                                            href="{{ url('admin/images/photos/quran_student/' . $quran_student['image']) }}">View
                                            Image</a>
                                        <input type="hidden" name="current_quran_student_image"
                                            value="{{ $quran_student['image'] }} ">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="birth_certificate">Birth certificate</label>
                                    <input type="file" class="form-control" id="birth_certificate"
                                        name ="birth_certificate">
                                    @if (!@empty($quran_student['birth_certificate']))
                                        <a target="_blank"
                                            href="{{ url('admin/birth_certificate/photos/quran_student/' . $quran_student['birth_certificate']) }}">View
                                            birth_certificate</a>
                                        <input type="hidden" name="current_quran_student_birth_certificate"
                                            value="{{ $quran_student['birth_certificate'] }} ">
                                    @endif
                                </div>
                        </div>
                    </div>
                    <br>
                    {{-- Subscription information --}}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Subscription information</h4>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Is he/she a beneficiary of the
                                    subscription?</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="">
                                            <input type="radio" name="beneficiaire" value="yes" id="yesOptionDate"
                                                onchange="toggleInputPrice()">
                                            <label for="yesOptionDate">Yes</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="">
                                            <input type="radio" name="beneficiaire" value="no" id="noOptionDate"
                                                onchange="toggleInputPrice()">
                                            <label for="noOptionDate">No</label>
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="pric_of_subcription" style="display:none;">Pric of subcription</label>
                                <input type="number" class="form-control" id="pric_of_subcription"
                                    name ="pric_of_subcription" style="display:none;" placeholder="Pric of subcription">
                            </div>
                            <div class="form-group">
                                <label for="date_subscription">Date of Subscription</label>
                                <input type="date" class="form-control" id="date_subscription"
                                    name ="date_subscription" required="">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Insurance</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="insurance"
                                                id="membershipRadios1" value="yes" checked>
                                            Yes
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="insurance"
                                                id="membershipRadios2" value="no">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Family information & Health information & Quranic information --}}
                <div class="col-md-6 grid-margin ">
                    {{-- Family information --}}
                    <div class="card">
                        <div class="card-body">
                            <a style="max-width: 150px; float: right; display: inline-block;"
                                href="{{ url('admin/add-edit-parent') }}" class="btn btn-block btn-primary">
                                Add Parent
                            </a>
                            <h4 class="card-title">Family information</h4>


                            <div class="form-group">

                                <label>Father name</label>
                                <select class="js-example-basic-single w-100" name="father">
                                    @foreach ($parentFathers as $father)
                                        <option name="father" value="{{ $father->id }}">
                                            {{ $father->first_name }}
                                            {{ $father->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mother name</label>
                                <select class="js-example-basic-single w-100" name="mother">
                                    @foreach ($parentMothers as $mother)
                                        <option name="mother" value="{{ $mother->id }}">
                                            {{ $mother->first_name }}
                                            {{ $mother->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Statut</label>
                                <select class="js-example-basic-single w-100" name="statut">
                                    <option value="عادي">عادي</option>
                                    <option value="يتيم الاب">يتيم الاب</option>
                                    <option value="يتم الام">يتم الام</option>
                                    <option value="يتيم الابوين">يتيم الابوين</option>
                                    <option value="الوالدين مطلقين">الوالدين مطلقين</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Statut familly</label>
                                <select class="js-example-basic-single w-100" name="statut_familly">
                                    <option value="ميسورة">ميسورة</option>
                                    <option value="متوسطة">متوسطة</option>
                                    <option value="ضعيفة">ضعيفة</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <br>
                    {{-- Health information --}}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Health information</h4>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Does he suffer from a disease?</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="">
                                            <input type="radio" name="disease" value="yes" id="yesOption"
                                                onchange="toggleInput()">
                                            <label for="yesOption">Yes</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="">
                                            <input type="radio" name="disease" value="no" id="noOption"
                                                onchange="toggleInput()">
                                            <label for="noOption">No</label>
                                        </label>
                                    </div>
                                </div>
                                <label for="typeDisease" style="display: none">Type of the disease</label>
                                <input type="text" class="form-control" id="typeDisease" name="typeDisease"
                                    style="display:none;" placeholder="Type of the disease">
                            </div>

                        </div>
                    </div>
                    <br>
                    {{-- Quranic information --}}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Quranic information</h4>
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
                                <label for="quran_student_N_parties_the_Koran">N parties the quranic</label>
                                <input type="text" class="form-control" id="quran_student_N_parties_the_Koran"
                                    name ="quran_student_N_parties_the_Koran" value="{{ old('N_parties_the_Koran') }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="quran_student_current_party">Current party</label>
                                <input type="text" class="form-control" id="quran_student_current_party"
                                    name ="quran_student_current_party"
                                    value="{{ old('current_party') }}" @endif>
                            </div> --}}
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
