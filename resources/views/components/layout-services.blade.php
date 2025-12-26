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
            'services.business-intelligence' => 'Skyllax Technologies || Business Intelligence Applications',
            'services.industrial' => 'Skyllax Technologies || Industrial-Strength Software Solutions',
            'services.cybersecurity' => 'Skyllax Technologies || Cybersecurity Services',
            'services.business-development' => 'Skyllax Technologies || Business Development Services',
            'services.smart-home' => 'Skyllax Technologies || Smart Home Technology',
            'consultation.it-strategy' => 'Skyllax Technologies || IT Strategy and Planning',
            'consultation.digital-branding' => 'Skyllax Technologies || Digital Branding & Transformation',
            'consultation.business-optimization' => 'Skyllax Technologies || Business Development & Optimization',
            'consultation.cybersecurity' => 'Skyllax Technologies || Cybersecurity Consultation',
            default => 'Skyllax Technologies'
            }
        )
    </title>
    <meta name="author" content="skyllax technologies">
    <meta name="description" content="">

    <!-- ============================================= -->

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('../i/favicon1.png') }}" type="image/png">

    <!-- ============================================= -->

    <!-- CSS files -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700%7CMontserrat:400,700%7CRaleway:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../libs/rs-plugin/css/settings.css" media="screen">
    <link rel="stylesheet" href="../libs/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    

    <!-- Global Wrapper -->
    <!-- ============================================= -->
    <div id="wrapper" class="animsition">

        @include('partials._header')

        {{$slot}}

    </div>
    <!-- END Global Wrapper -->

    <!-- ============================================= -->
    <!-- Do not remove this -->
    <div class="check-media"></div>

    <!-- ============================================= -->
    <!-- Javascript files -->
    <script src="../ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="../libs/rs-plugin/js/revolution-slider.js"></script>
    <script src="../libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../js/main.js"></script>

    <!-- Elfsight Facebook Chat | Untitled Facebook Chat -->
<script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-e40b1e03-070d-477f-936a-c7e4d5d26eaa" data-elfsight-app-lazy></div>
</body>
</html>
