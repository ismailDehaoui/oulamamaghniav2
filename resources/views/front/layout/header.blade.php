 <!-- Spinner Start -->
 <div id="spinner"
     class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
     <div class="spinner-grow text-primary" role="status"></div>
 </div>
 <!-- Spinner End -->

 <!-- Topbar Start -->
 <div class="container-fluid bg-dark py-2 d-none d-md-flex">
     <div class="container">
         <div class="d-flex justify-content-between topbar">
             <div class="top-info">
                 <small class="me-3 text-white-50"><img src="{{ url('front/img/Flag_of_Palestine.svg') }}" width="30px;"
                         height="30px;">
                 </small>
                 <small class="me-3 text-white-50"><a href="#"><i class="fas  me-2 text-secondary"></i></a>فلسطين
                     قضيتنا و عزنا و شرفنا</small>
                 <small class="me-3 text-white-50"><img src="{{ url('front/img/Flag_of_Palestine.svg') }}"
                         width="30px;" height="30px;">
                 </small>
             </div>
             <div id="note" class="text-danger d-none d-xl-flex"><small style="text-size-adjust: 20px">أنقذوا
                     غزة من الابادة</small></div>

         </div>
     </div>
 </div>
 <!-- Topbar End -->

 <!-- Navbar Start -->
 <div class="container-fluid bg-primary">
     <div class="container">
         <nav class="navbar navbar-dark navbar-expand-lg py-0">
             <a href="index.html" class="navbar-brand">
                 <h3 class="text-white fw-bold d-block">OULAMA <span class="text-secondary">MAGHNIA</span> </h3>
             </a>
             <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                 data-bs-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                 <div class="navbar-nav ms-auto mx-xl-auto p-0">
                     <a href="{{ url('/') }}" class="nav-item nav-link active text-secondary">Home</a>
                     <a href="#about" class="nav-item nav-link">About</a>
                     <a href="{{ url('/deaths') }}" class="nav-item nav-link">Deaths(الوفايات)</a>
                     <a href="#service" class="nav-item nav-link">Services</a>
                     <a href="#project" class="nav-item nav-link">Projects</a>
                     <a href="#contact" class="nav-item nav-link">Contact</a>
                 </div>
             </div>
             <div class="d-none d-xl-flex flex-shirink-0">
                 <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                     <a href="" class="position-relative animated tada infinite">
                         <i class="fa fa-phone-alt text-white fa-2x"></i>
                         <div class="position-absolute" style="top: -7px; left: 20px;">
                             <span><i class="fa fa-comment-dots text-secondary"></i></span>
                         </div>
                     </a>
                 </div>
                 <div class="d-flex flex-column pe-4 border-end">
                     <span class="text-white-50">Have any questions?</span>
                     <span class="text-secondary">Call: 07-70-40-15-01</span>
                 </div>
                 <div class="d-flex align-items-center justify-content-center ms-4 ">
                     <a href="#"><i class="bi bi-search text-white fa-2x"></i> </a>
                 </div>
             </div>
         </nav>
     </div>
 </div>
 <!-- Navbar End -->
