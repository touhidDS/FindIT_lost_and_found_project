<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindIt Admin – @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            background-color: #f5f8fa;
            font-family: Raleway, sans-serif;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
            background-color: #fff;
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #3d4852 !important;
        }

        .nav-link {
            color: #6c757d !important;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-link:hover { color: #3d4852 !important; }

        .nav-link.active-link {
            color: #5a67d8 !important;
            border-bottom: 2px solid #5a67d8;
        }

        .page-wrapper { padding: 28px 0 48px; }

        /* Cards */
        .card {
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e3e6f0;
            margin-bottom: 24px;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 700;
            font-size: 15px;
            padding: 14px 20px;
            color: #3d4852;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-body { padding: 0; }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        }

        .stat-label {
            font-size: 12px;
            font-weight: 700;
            color: #6c757d;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .stat-num {
            font-size: 28px;
            font-weight: 700;
            color: #3d4852;
            line-height: 1;
        }

        .stat-desc {
            font-size: 12px;
            color: #6c757d;
            margin-top: 4px;
        }

        /* Table */
        .table {
            margin-bottom: 0;
            font-size: 14px;
        }

        .table th {
            font-size: 11px;
            font-weight: 700;
            color: #6c757d;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            border-top: none;
            border-bottom: 2px solid #e3e6f0;
            padding: 12px 16px;
            background: #f8f9fc;
        }

        .table td {
            padding: 12px 16px;
            vertical-align: middle;
            border-color: #e3e6f0;
            color: #3d4852;
        }

        .table tr:hover td { background: #fafbfc; }

        /* Badges */
        .badge {
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-lost {
            background: #fff5f5;
            color: #c53030;
            border: 1px solid #feb2b2;
        }

        .badge-found {
            background: #f0fff4;
            color: #276749;
            border: 1px solid #9ae6b4;
        }

        .badge-open {
            background: #ebf4ff;
            color: #5a67d8;
            border: 1px solid #c3dafe;
        }

        .badge-claimed {
            background: #f8f9fc;
            color: #6c757d;
            border: 1px solid #ced4da;
        }

        .badge-admin {
            background: #fffff0;
            color: #b7791f;
            border: 1px solid #faf089;
        }

        .badge-student {
            background: #f0fff4;
            color: #276749;
            border: 1px solid #9ae6b4;
        }

        /* Buttons */
        .btn {
            font-size: 13px;
            font-weight: 600;
            border-radius: 4px;
            font-family: Raleway, sans-serif;
            transition: all 0.2s;
        }

        .btn-sm { padding: 4px 12px; font-size: 12px; }

        .btn-primary {
            background-color: #5a67d8;
            border-color: #5a67d8;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #4c51bf;
            border-color: #4c51bf;
            color: #fff;
        }

        .btn-danger {
            background-color: #fff5f5;
            border-color: #feb2b2;
            color: #c53030;
        }

        .btn-danger:hover {
            background-color: #ffe0e0;
            color: #c53030;
        }

        .btn-success {
            background-color: #f0fff4;
            border-color: #9ae6b4;
            color: #276749;
        }

        .btn-success:hover {
            background-color: #dcffe8;
            color: #276749;
        }

        .btn-outline-secondary {
            font-size: 13px;
            color: #6c757d;
        }

        /* Filter bar */
        .filter-bar {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-input {
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 7px 12px;
            font-size: 13px;
            color: #495057;
            font-family: Raleway, sans-serif;
            outline: none;
        }

        .filter-input:focus { border-color: #5a67d8; }

        /* Flash */
        .flash {
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .flash-success {
            background: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #276749;
        }

        .flash-error {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #c53030;
        }

        /* Pagination */
        .pagination .page-link {
            font-size: 13px;
            color: #6c757d;
            border-color: #e3e6f0;
        }

        .pagination .page-item.active .page-link {
            background-color: #5a67d8;
            border-color: #5a67d8;
        }

        /* Two col */
        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .two-col { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container-fluid px-4">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            🔍 FindIt <span style="font-size:11px;background:#ebf4ff;color:#5a67d8;
                padding:2px 8px;border-radius:4px;font-weight:700;margin-left:4px;">ADMIN</span>
        </a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto" style="gap:4px;">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active-link' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        View Site
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <span class="nav-link" style="color:#3d4852 !important;">
                        👤 {{ auth()->user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit"
                                style="background:none;border:none;cursor:pointer;
                                       color:#6c757d;font-family:Raleway,sans-serif;
                                       font-size:14px;padding:8px 0;font-weight:600;">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="page-wrapper">
    <div class="container-fluid px-4">

        @if(session('success'))
            <div class="flash flash-success">✅ {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="flash flash-error">⚠ {{ session('error') }}</div>
        @endif

        @yield('content')

    </div>
</div>

@stack('scripts')
</body>
</html>