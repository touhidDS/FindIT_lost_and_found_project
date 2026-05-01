<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindIt – @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
            font-family: Raleway, sans-serif;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            background-color: #fff;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.2rem;
            color: #3d4852 !important;
        }

        .login-form {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .card {
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 1px solid #e3e6f0;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px 20px;
            color: #3d4852;
        }

        .card-body {
            padding: 24px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            font-weight: 600;
            color: #3d4852;
            margin-bottom: 5px;
            display: block;
        }

        .form-control,
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
            color: #495057;
            background-color: #fff;
            font-family: Raleway, sans-serif;
            outline: none;
            transition: border-color 0.15s;
            box-sizing: border-box;
        }

        input:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 3px rgba(90,103,216,0.15);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            font-family: Raleway, sans-serif;
            transition: background 0.2s;
        }

        .btn-primary {
            background-color: #5a67d8;
            color: #fff;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #4c51bf;
            color: #fff;
        }

        .text-danger {
            color: #e3342f;
            font-size: 13px;
            margin-top: 4px;
            display: block;
        }

        .alert-error {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .alert-success {
            background: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #276749;
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #6c757d;
            font-weight: 400;
            cursor: pointer;
        }

        .checkbox-label input[type="checkbox"] {
            width: 15px;
            height: 15px;
        }

        .switch-link {
            text-align: center;
            margin-top: 16px;
            font-size: 13px;
            color: #6c757d;
        }

        .switch-link a {
            color: #5a67d8;
            text-decoration: none;
            font-weight: 600;
        }

        .switch-link a:hover {
            text-decoration: underline;
        }

        h1 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #3d4852;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">🔍 FindIt — DIU Lost & Found</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit"
                                    style="background:none;border:none;
                                           cursor:pointer;color:#6c757d;
                                           font-family:Raleway,sans-serif;
                                           font-size:14px;padding:8px 0;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Flash messages -->
@if(session('success'))
    <div class="container mt-3">
        <div class="alert-success">{{ session('success') }}</div>
    </div>
@endif

<!-- Page content -->
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">@yield('title')</div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>