@extends('front.layout.layout')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>

            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ url('front/img/aya1.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-info h4 animated fadeInUp"> الشيخ المجاهد يخلف بوعناني في ذمة الله</h6>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
    <div class="container-fluid py-5 my-5" id="about">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ url('front/img/chikh.png') }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        {{-- <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ url('front/img/qurann.jpg') }}" class="img-fluid w-100 rounded" alt="">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">الوفايات</h5>
                    {{-- <h1 class="mb-4">الشيخ المجاهد يخلف بوعناني</h1> --}}
                    <h6>إِنَّا لِلَّهِ وَإِنَّا إِلَيْهِ رَاجِعُون</h6>
                    <p>بقلوب راضية و عيون باكية ننقل لكم خبر وفاة <small class="me-3 text-success">
                            الشيخ المجاهد يخلف بوعناني
                        </small>
                        الرئيس الشرفي لجمعية العلماء مكتب
                    </p>
                    <h1 class="mb-4">الشيخ المجاهد يخلف بوعناني</h1>
                    <p>
                        أيقونة العلم في مدينة مغنية، وعضو جمعية العلماء المسلمين، الأستاذ المربي سي يخلف بوعناني في ذمة
                        الله....اللهم اغفر له وارحمه.

                    </p>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
