<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin') - Harjota Questionnaire System</title>

    <!-- Bootstrap 3.3.1 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="{{ asset('@sweetalert2/dist/sweetalert2.min.css') }}">
    <!-- jQuery UI CSS (for sortable) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <style>
        body {
            padding-top: 70px;
            background-color: #f5f5f5;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .content-wrapper {
            background: #fff;
            padding: 25px;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .page-header {
            margin-top: 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
        }

        .breadcrumb {
            background: transparent;
            padding-left: 0;
            margin-bottom: 20px;
        }

        /* Status badges */
        .status-active {
            background-color: #5cb85c;
        }

        .status-inactive {
            background-color: #d9534f;
        }

        /* Sortable styles */
        .sortable-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sortable-item {
            background: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            cursor: move;
        }

        .sortable-item:hover {
            border-color: #337ab7;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .sortable-item.ui-sortable-helper {
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .sortable-item.ui-sortable-placeholder {
            visibility: visible !important;
            background: #f0f0f0;
            border: 2px dashed #337ab7;
        }

        .drag-handle {
            cursor: move;
            color: #999;
            margin-right: 10px;
        }

        /* Section card */
        .section-card {
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .section-header {
            background: #f8f8f8;
            padding: 15px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .section-header .drag-handle {
            font-size: 18px;
        }

        .section-header h4 {
            margin: 0;
            flex-grow: 1;
        }

        .section-body {
            padding: 15px;
        }

        /* Question item */
        .question-item {
            background: #fafafa;
            border: 1px solid #eee;
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 3px;
            display: flex;
            align-items: center;
        }

        .question-item:hover {
            background: #f5f5f5;
            border-color: #ddd;
        }

        .question-info {
            flex-grow: 1;
        }

        .question-type {
            font-size: 11px;
            color: #777;
            text-transform: uppercase;
        }

        .question-required {
            color: #d9534f;
            font-weight: bold;
        }

        /* Toggle switch */
        .toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .3s;
            border-radius: 26px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: #5cb85c;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(24px);
        }

        /* Action buttons */
        .action-buttons .btn {
            margin-left: 5px;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #777;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ddd;
        }

        /* Form styles */
        .form-section {
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid #eee;
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .form-section-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .help-text {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.questionnaires.index') }}">
                    <i class="fa fa-clipboard"></i> Harjota Admin
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->routeIs('admin.questionnaires.index') ? 'active' : '' }}">
                        <a href="{{ route('admin.questionnaires.index') }}">
                            <i class="fa fa-list"></i> Questionnaires
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/') }}" target="_blank">
                            <i class="fa fa-external-link"></i> View Site
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> {{ auth()->user()->name ?? 'Admin' }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Main Content -->
    <div class="container">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="fa fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong><i class="fa fa-exclamation-triangle"></i> Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- jQuery 2.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.1 JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- jQuery UI (for sortable) -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('@sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <script>
        // Setup CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
