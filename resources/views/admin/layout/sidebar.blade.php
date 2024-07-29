<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (Auth::guard('admin')->user()->type == 'Quran Teacher')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Quran Teacher Details</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-quran-teacher-Daily-calendar') }}">Daily calendar</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-quran-teacher-details/personal') }}">Personal Details</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link"
                                href="{{ url('admin/update-quran-teacher-publication') }}">Publication Details</a>
                        </li>

                    </ul>
                </div>
            </li>
        @elseif(Auth::guard('admin')->user()->type == 'superadmin' || Auth::guard('admin')->user()->type == 'Secretary')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/update-admin-password') }}">Update
                                Password</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('admin/update-admin-details') }}">Update
                                Details</a>
                        </li>

                    </ul>
                </div>
            </li>


            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                    aria-controls="form-elements">
                    <i class="icon-columns menu-icon"></i>
                    <span class="menu-title">Insert</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="form-elements">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/insert-school') }}">School</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/insert-category') }}">Category</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">secretary</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">Quran Teacher</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="">Quran Student</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                    <i class="icon-bar-graph menu-icon"></i>
                    <span class="menu-title">Managing Quranic <br> School</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/school') }}">School</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/category') }}">Category</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/quran-teacher') }}">Quran
                                Teacher</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/parent') }}">
                                Parent</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/quran-student') }}">Quran
                                Student</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/quran-subscription') }}">Quran
                                Subscriptions</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
        @if (Auth::guard('admin')->user()->type == 'superadmin')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                    <i class="icon-grid-2 menu-icon"></i>
                    <span class="menu-title">Security management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tables">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ url('admin/secretary') }}">secretary</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endif
    </ul>
</nav>
