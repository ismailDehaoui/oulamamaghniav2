<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>جمعية العلماءالمسلمين الجزائريين</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ url('admin/images/oulama.jpg') }}" />
    <!-- Libraries Stylesheet -->
    <link href="{{ url('front/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ url('front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('front/css/style.css') }}" rel="stylesheet">
    <script src="{{ url('front/js/scriptt.js') }}"></script>
</head>

<body>


    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')

    {{-- <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up text-white"></i></a> --}}





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('front/lib/wow/wow.min.js') }}"></script>
    <script src="{{ url('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ url('front/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ url('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ url('front/js/main.js') }}"></script>

    <script>
        window.onload = function() {
            var audio = document.getElementById("myAudio");
            audio.play();
        };
    </script>

</body>

</html>
