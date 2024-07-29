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
                            <form class="forms-sample"
                                action="{{ url('admin/edit-quran-student/' . $quran_student['id']) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="quran_student_first_name">First Name</label>
                                    <input type="text" class="form-control" id="quran_student_first_name"
                                        name ="quran_student_first_name" value="{{ $quran_student['firstName'] }}"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <label for="quran_student_last_name">Last Name</label>
                                    <input type="text" class="form-control" id="quran_student_last_name"
                                        name ="quran_student_last_name" value="{{ $quran_student['lastName'] }}"
                                        required="">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sexe</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe"
                                                    id="membershipRadios1" value="Homme"
                                                    @if ($quran_student['sexe'] == 'Homme') checked @endif>
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="sexe"
                                                    id="membershipRadios2" value="Femme"
                                                    @if ($quran_student['sexe'] == 'Femme') checked @endif>
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quran_student_date_of_birthday">Date of birthday</label>
                                    <input type="date" class="form-control" id="quran_student_date_of_birthday"
                                        name ="quran_student_date_of_birthday"
                                        value="{{ $quran_student['dateOfBirthday'] }}" required="">
                                </div>

                                <div class="form-group">
                                    <label for="quran_student_image">Image</label>
                                    <input type="file" class="form-control" id="quran_student_image"
                                        name ="quran_student_image">

                                    <a target="_blank"
                                        href="{{ url('admin/images/photos/quran_student/' . $quran_student['image']) }}">View
                                        Image</a>
                                    <input type="hidden" name="current_quran_student_image"
                                        value="{{ $quran_student['image'] }} ">
                                </div>
                                <div class="form-group">
                                    <label for="birth_certificate">Birth certificate</label>
                                    <input type="file" class="form-control" id="birth_certificate"
                                        name ="birth_certificate">

                                    <a target="_blank"
                                        href="{{ url('admin/birth_certificate/' . $quran_student['birth_certificate']) }}">View
                                        birth_certificate</a>
                                    <input type="hidden" name="current_quran_student_birth_certificate"
                                        value="{{ $quran_student['birth_certificate'] }} ">

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
                                @foreach ($subscriptions as $subscription)
                                    @if ($subscription['beneficiaire'] == 'yes')
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="">


                                                    <input type="radio" name="beneficiaire" value="yes"
                                                        id="yesOptionDate" onchange="toggleInputPrice()" checked>
                                                    <label for="yesOptionDate">Yes</label>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="">


                                                    <input type="radio" name="beneficiaire" value="no"
                                                        id="noOptionDate" onchange="toggleInputPrice()">
                                                    <label for="noOptionDate">No</label>

                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($subscriptions as $subscription)
                                    @if ($subscription['beneficiaire'] == 'no')
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="">
                                                    <input type="radio" name="beneficiaire" value="yes"
                                                        id="yesOptionDate" onchange="toggleInputPrice()">
                                                    <label for="yesOptionDate">Yes</label>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check">
                                                <label class="">
                                                    <input type="radio" name="beneficiaire" value="no"
                                                        id="noOptionDate" onchange="toggleInputPrice()" checked>
                                                    <label for="noOptionDate">No</label>

                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @foreach ($subscriptions as $subscription)
                                @if ($subscription->beneficiaire == 'no')
                                    <div class="form-group">
                                        <label for="pric_of_subcription">Pric of subcription</label>
                                        <input type="number" class="form-control" id="pric_of_subcription"
                                            name ="pric_of_subcription" value="{{ $subscription->price }}">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="pric_of_subcription">Pric of subcription</label>
                                        <input type="number" class="form-control" id="pric_of_subcription"
                                            name ="pric_of_subcription" value="{{ $subscription->price }}">
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($subscriptions as $subscription)
                                <div class="form-group">
                                    <label for="date_subscription">Date of Subscription</label>
                                    <input type="date" class="form-control" id="date_subscription"
                                        name ="date_subscription" value="{{ $subscription['date_subscription'] }}"
                                        required="">
                                </div>
                            @endforeach
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
                            <h4 class="card-title">Family information</h4>
                            <div class="form-group">

                                <label for="father">Father name</label>
                                <select class="js-example-basic-single w-100" name="father" id="father"
                                    @if ($quran_student['father_id'] == $father['id']) selected @endif>
                                    @foreach ($fathers as $dad)
                                        <option value="{{ $dad['id'] }}">
                                            {{ $dad['first_name'] }} {{ $dad['last_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mother">Mother name</label>
                                <select class="js-example-basic-single w-100" name="mother"
                                    @if ($quran_student['mother_id'] == $mother['id']) selected @endif>
                                    @foreach ($mothers as $mom)
                                        <option name="mother" value="{{ $mom['id'] }}">
                                            {{ $mom['first_name'] }}
                                            {{ $mom['last_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="statut">Statut</label>
                                <input type="text" class="form-control" id="statut" name ="statut"
                                    value="{{ $quran_student['statut'] }}" required="">
                            </div>
                            <div class="form-group">
                                <label for="statut_familly">Statut familly</label>
                                <input type="text" class="form-control" id="statut_familly" name ="statut_familly"
                                    value="{{ $quran_student['statut_familly'] }}" required="">
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
                                            <input type="radio" name="disease" value="yes">
                                            <label>Yes</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="">
                                            <input type="radio" name="disease" value="no">
                                            <label>No</label>
                                        </label>
                                    </div>
                                </div>
                                <label for="typeDisease">Type of the disease</label>
                                @if ($quran_student['malad'] == 'yes')
                                    <input type="text" class="form-control" id="typeDisease" name="typeDisease"
                                        value="{{ $quran_student['type_malade'] }}">
                                @else
                                    <input class="form-control" id="typeDisease" name="typeDisease"
                                        value="{{ $quran_student['type_malade'] }}">
                                @endif
                            </div>


                        </div>
                    </div>
                    <br>
                    {{-- Quranic information --}}
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Quranic information</h4>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="js-example-basic-single w-100" name="category" {{-- @if ($quran_student['mother_id'] == $mother['id']) selected @endif --}}
                                    @if ($quran_student['quran_category_student_id'] == $category['id']) selected @endif>
                                    @foreach ($categories as $cat)
                                        <option name='category' value="{{ $cat['id'] }}">{{ $cat['name'] }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="school">School</label>
                                <select class="js-example-basic-single w-100" name="school"
                                    @if ($quran_student['quran_shcool_id'] == $school['id']) selected @endif>
                                    @foreach ($schools as $ecol)
                                        <option name="school" value="{{ $ecol['id'] }}">{{ $ecol['school_name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quran_student_N_parties_the_Koran">N parties the quranic</label>
                                <input type="text" class="form-control" id="quran_student_N_parties_the_Koran"
                                    name ="quran_student_N_parties_the_Koran"
                                    value="{{ $quran_student['N_parties_the_Koran'] }}">
                            </div>
                            <div class="form-group">
                                <label for="quran_student_current_party">Current party</label>
                                <input type="text" class="form-control" id="quran_student_current_party"
                                    name ="quran_student_current_party" value="{{ $quran_student['current_party'] }}">
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
