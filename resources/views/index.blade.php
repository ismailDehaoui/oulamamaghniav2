@extends('front.layout.layout')
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
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
                <div class="carousel-item ">
                    <img src="{{ url('front/img/mushaf.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-info h4 animated fadeInUp"> إِنَّا نَحْنُ نَزَّلْنَا الذِّكْرَ وَإِنَّا
                                لَهُ لَحَافِظُونَ</h6>
                        </div>
                        {{-- <audio id="myAudio">
                            <source src="{{ url('front/audio/audio1.mp3') }}" type="audio/mpeg">
                            Your browser does not support the audio element.

                        </audio> --}}


                        {{-- <button id="play"> Play</button> --}}
                        <script>
                            let play = document.getElementById('play');

                            function playAudio() {
                                let audio = new Audio("{{ url('front/audio/audio1.mp3') }}");
                                audio.play();
                            }
                            play.addEventListener('click', playAudio);
                        </script>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="{{ url('front/img/ps.png') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp"> فلسطين حرة و القدس عاصمتها و غزة عزتها
                            </h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight"></h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">ستظل فلسطين محفورة في قلبي حتى النصر
                            </p>

                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <img src="{{ url('front/img/quran.jpg') }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp"> التعليم في الصغر كالنقش على الحجر</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInRight"></h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">علموا ابنائكم القران في صغرهم يلبسوكم
                                تاج الوقار عند ملك الملوك</p>

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


    <!-- Fact Start -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".1s">
                    <div class="d-flex counter">
                        <h3 class="text-white mt-1"> أستاذة</h3>
                        <h1 class="me-3 text-primary counter-value">15</h1>
                        <h3 class="text-white mt-1">أكثر من </h3>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".3s">
                    <div class="d-flex counter">
                        <h3 class="text-white mt-1">أستاذ</h3>
                        <h1 class="me-3 text-primary counter-value">25</h1>
                        <h3 class="text-white mt-1">أكثر من</h3>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="d-flex counter">
                        <h3 class="text-white mt-2"> طالب </h3>
                        <h1 class="me-3 text-primary counter-value"> 480 </h1>
                        <h3 class="text-white mt-1">أزيد من </h3>

                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex counter">
                        <h3 class="text-white mt-1"> مدارس </h3>
                        <h1 class="me-3 text-primary counter-value"> 3 </h1>
                        <h3 class="text-white mt-1">لدينا أكثر من</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->



    <!-- About Start -->
    <div class="container-fluid py-5 my-5" id="about">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ url('front/img/salat.jpg') }}" class="img-fluid w-75 rounded" alt=""
                            style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ url('front/img/qurann.jpg') }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h5 class="text-primary">معلومات عنا</h5>
                    <h1 class="mb-4">جمعية العلماءالمسلمين الجزائريين</h1>
                    <p>.جمعية العلماء المسلمين الجزائريين، هي جمعية إسلامية جزائرية أسسها مجموعة من العلماء الجزائريين
                        خلال النصف الأول من القرن العشرين في 1931
                        سطرت الجمعية أهدافا لها وهي إحياء الشعب الجزائري والنهوض به وإصلاح مجتمعه وزرع القيم والأخلاق
                        الإسلامية الرفيعة والمحافظة على هويته من أجل
                        أن يتبوأ مكانة رائدة بين الأمم وفق هويته الإسلامية والعربية. واتخذت الجمعية<small
                            class="me-3 text-success">
                            «الإسلام ديننا والعربية لغتنا والجزائر وطننا»</small>
                        شعارا لها
                    </p>
                    <p class="mb-4">للجمعية فرع في بلدية مغنية ولاية تلمسان، تهتم الجميعة بتعليم و تحفيظ القران
                        الكريم و أحكام التجويد
                        و كذلك علوم الفقه و الأصول تحت اشراق نخبة من الاساتذة و كذلك تقوم بدروس الدعم خاصة لطلاب
                        البكالوريا بجميع شعبه
                        كما انها تهتم بتدريس اللغات الاجنبية خاصة الانجليزية بجميع مستوياتها</p>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5" id="service">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">نشاطاتنا</h5>
                <h1>نشاطات الجميعة</h1>
            </div>
            <div class="row g-5 services-inner">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ url('front/img/mushaf.png') }}" style="width: 100px; height: 100px   ;">
                                <h4 class="mb-3">تحفيظ القران</h4>
                                <p class="mb-4">هدف الجمعية الاساسي هو تخريج اكبر عدد ممكن من الطلبة حافظين لكتاب
                                    الله عز وجل و متكنين فيه
                                    ليكونوا هم قادة الغد قال الله عز و جل:
                                    طه (1) مَا أَنزَلْنَا عَلَيْكَ الْقُرْآنَ
                                    لِتَشْقَىٰ (2) إِلَّا تَذْكِرَةً لِّمَن يَخْشَىٰ (3)

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ url('front/img/da3am.png') }}" style="width: 100px; height: 100px   ;">
                                <h4 class="mb-3">الدروس الخصوصية</h4>
                                <p class="mb-4">إيمانا منا ان جيل اليوم هو صناع القرار غدا ، و إيمانا منا ايضا ان
                                    النجاح الكبير يلزمه تعب وشقاء عظيم، تفتح الجميعة أبوابها و أقسامها لمساعدة تلامذتنا
                                    النجباء من خلال دروس دعم تحت لواء العلم نور.</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <img src="{{ url('front/img/english.jpg') }}" style="width: 100px; height: 100px   ;">
                                <h4 class="mb-3">دروس في اللغة الانجليزية</h4>
                                <p class="mb-4">نعلم ان لغة العلم الحالية هي اللغة الانجليزية، و الغير المتكن بها من
                                    طلبة العلم الحديث يجد نفسه
                                    متأخر كثيرا عن أقرانه في مجاله العلمي، الجمعية توفر للمحبي هذه اللغة فرصة لتطوير
                                    مستواك و السير معك نحو الاتقان
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5" id="project">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">مشاريع الجميعة</h5>
                <h1>أهم ما حققته الجمعية في هذه السنة2023</h1>
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ url('front/img/achraf.jpg') }}" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">الطالب أشرف موقاز يختم حفظ القران الكريم</h4>
                                    <p class="m-0 text-white">أول طالب في الجميعة يختم</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ url('front/img/anes.jpg') }}" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">مشاركة طلاب نادي انس بن مالك في مسابقة قارء الجامعية
                                    </h4>
                                    <p class="m-0 text-white"></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ url('front/img/mosaba9a.jpg') }}" class="img-fluid w-100 rounded"
                                alt="">
                            <div class="project-content">
                                <a href="#" class="text-center">
                                    <h4 class="text-secondary">تنظيم مسابقة حفظ القران كل سنة في شهر رمضان المبارك</h4>
                                    <p class="m-0 text-white"> </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="{{ url('front/img/project-4.jpg') }}" class="img-fluid w-100 rounded"
                            alt="">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">Web Development</h4>
                                <p class="m-0 text-white">Web Analysis</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".5s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="{{ url('front/img/project-5.jpg') }}" class="img-fluid w-100 rounded"
                            alt="">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">Digital Marketing</h4>
                                <p class="m-0 text-white">Marketing Analysis</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".7s">
                <div class="project-item">
                    <div class="project-img">
                        <img src="{{ url('front/img/project-6.jpg') }}" class="img-fluid w-100 rounded"
                            alt="">
                        <div class="project-content">
                            <a href="#" class="text-center">
                                <h4 class="text-secondary">keyword Research</h4>
                                <p class="m-0 text-white">keyword Analysis</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    <!-- Project End -->


    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5" id="contact">
        <div class="container">
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Address</h4>
                                <a href="" target="_blank" class="h5">حي العزوني</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Call Us</h4>
                                <a class="h5" href="tel:+213770401501" target="_blank">07-70-40-15-01</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Email Us</h4>
                                <a class="h5" href="mailto:ayoub2013b27@gmail.com"
                                    target="_blank">ayoub2013b27@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
