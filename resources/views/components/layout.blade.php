<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title', 
            // Fallback switch based on route or path
            match (request()->route()->getName() ?? basename(request()->path())) {
                'home' => 'Harjota Technologies || Home Page',
                'about' => 'Harjota Technologies || About Page',
                'portfolio' => 'Harjota Technologies || Portfolio Page',
                'contact' => 'Harjota Technologies || Contact Page',
                                
                default => 'Harjota Technologies'
            }
        )
    </title>
    <meta name="author" content="Harjota Technologies">
    <meta name="description" content="">

    <!-- ============================================= -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('harjota_favicon.svg') }}" type="image/x-icon">

    <!-- ============================================= -->



    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700%7CMontserrat:400,700%7CRaleway:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="libs/magnific-popup/magnific-popup.css">

    <script src="sweetalert2/dist/sweetalert2.all.min.js"></script>

    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="css/main.css">

<style>
    .messenger-button {
  background-color: #0084ff;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
}
</style>
</head>

<body>

    <!-- Global Wrapper -->
    <!-- ============================================= -->
    <div id="wrapper" class="animsition">

    @include('partials._header')

    {{$slot}}

    <a href="https://m.me/YOUR_PAGE_ID" target="_blank">
        <img src="i/ss." alt="Chat on Messenger" />
    </a>
    </div>
    <!-- END Global Wrapper -->

    <!-- ============================================= -->
    <!-- Do not remove this -->
    <div class="check-media"></div>


    <!-- ============================================= -->
    <!-- Javascript files -->
    <script src="../../../ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../../../maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="libs/rs-plugin/js/revolution-slider.js"></script>
    <script src="libs/magnific-popup/jquery.magnific-popup.min.js"></script>

    <script src="js/main.js"></script>
</body>


<!-- Mirrored from shiftthemes.com/html/abt/index_06.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Mar 2025 15:02:22 GMT -->
</html>