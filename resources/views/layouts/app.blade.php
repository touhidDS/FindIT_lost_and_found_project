<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindIt – @yield('title', 'Campus Lost & Found')</title>
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
            box-shadow: 0 2px 4px rgba(0,0,0,.06);
            background-color: #fff;
            padding: 10px 0;
            position: relative;
            z-index: 100;
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

        .btn-nav-post {
            background-color: #5a67d8;
            color: #fff !important;
            padding: 6px 16px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-nav-post:hover {
            background-color: #4c51bf;
            color: #fff !important;
            text-decoration: none;
        }

        .page-wrapper { padding: 28px 0; }

        .hero-box {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .hero-box h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #3d4852;
            margin-bottom: 8px;
        }

        .hero-box p {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .hero-label {
            display: inline-block;
            background: #ebf4ff;
            color: #5a67d8;
            font-size: 12px;
            font-weight: 600;
            padding: 3px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
            border: 1px solid #c3dafe;
        }

        .btn {
            display: inline-block;
            padding: 9px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            font-family: Raleway, sans-serif;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-primary {
            background-color: #5a67d8;
            color: #fff !important;
        }

        .btn-primary:hover {
            background-color: #4c51bf;
            color: #fff !important;
            text-decoration: none;
        }

        .btn-secondary {
            background-color: #fff;
            color: #6c757d !important;
            border: 1px solid #ced4da;
        }

        .btn-secondary:hover {
            background-color: #f8f9fc;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #e3342f;
            color: #fff !important;
        }

        .btn-danger:hover {
            background-color: #cc1f1a;
            color: #fff !important;
            text-decoration: none;
        }

        .btn-success {
            background-color: #38a169;
            color: #fff !important;
        }

        .btn-sm { padding: 5px 12px; font-size: 12px; }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 6px;
            display: flex; align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-num {
            font-size: 24px;
            font-weight: 700;
            line-height: 1;
            color: #3d4852;
        }

        .stat-label {
            font-size: 12px;
            color: #6c757d;
            margin-top: 3px;
        }

        .filter-bar {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 14px 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            box-shadow: 0 2px 4px rgba(0,0,0,0.03);
        }

        .filter-tab {
            padding: 6px 14px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #ced4da;
            background: #fff;
            color: #6c757d;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.15s;
        }

        .filter-tab:hover {
            background: #f8f9fc;
            text-decoration: none;
            color: #3d4852;
        }

        .filter-tab.active-all {
            background: #ebf4ff;
            border-color: #c3dafe;
            color: #5a67d8;
        }

        .filter-tab.active-lost {
            background: #fff5f5;
            border-color: #feb2b2;
            color: #c53030;
        }

        .filter-tab.active-found {
            background: #f0fff4;
            border-color: #9ae6b4;
            color: #276749;
        }

        .filter-select {
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 7px 12px;
            font-size: 13px;
            color: #495057;
            font-family: Raleway, sans-serif;
            outline: none;
            cursor: pointer;
        }

        .filter-select:focus { border-color: #5a67d8; }

        .filter-input {
            background: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 7px 12px;
            font-size: 13px;
            color: #495057;
            font-family: Raleway, sans-serif;
            outline: none;
            flex: 1;
            min-width: 180px;
        }

        .filter-input:focus { border-color: #5a67d8; }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #3d4852;
        }

        .section-count { font-size: 13px; color: #6c757d; }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 18px;
        }

        .item-card {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 4px rgba(0,0,0,0.04);
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .item-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
            text-decoration: none;
            color: inherit;
        }

        .item-img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            background: #f8f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 44px;
            color: #ced4da;
            flex-shrink: 0;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-body {
            padding: 14px 16px 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .item-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .badge {
            font-size: 11px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 20px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
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

        .badge-claimed {
            background: #f8f9fc;
            color: #6c757d;
            border: 1px solid #ced4da;
        }

        .item-date { font-size: 12px; color: #6c757d; }

        .item-title {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #3d4852;
            line-height: 1.3;
        }

        .item-desc {
            font-size: 13px;
            color: #6c757d;
            line-height: 1.5;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 12px;
            padding-top: 10px;
            border-top: 1px solid #e3e6f0;
        }

        .item-location { font-size: 12px; color: #6c757d; }

        .item-category {
            font-size: 11px;
            color: #6c757d;
            background: #f8f9fc;
            padding: 2px 8px;
            border-radius: 4px;
            border: 1px solid #e3e6f0;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
        }

        .empty-icon { font-size: 48px; margin-bottom: 14px; }

        .empty-state h3 {
            font-size: 17px;
            font-weight: 700;
            color: #3d4852;
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: #6c757d;
            max-width: 300px;
            margin: 0 auto 18px;
        }

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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 4px;
            margin-top: 28px;
            flex-wrap: wrap;
        }

        .pagination .page-item .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 36px;
            height: 36px;
            padding: 0 10px;
            border-radius: 4px;
            font-size: 13px;
            border: 1px solid #e3e6f0;
            background: #fff;
            color: #6c757d;
            text-decoration: none;
        }

        .pagination .page-item.active .page-link {
            background: #5a67d8;
            border-color: #5a67d8;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        /* ── Avatar & Dropdown ── */
        .nav-avatar {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, #5a67d8, #38a169);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            position: relative;
            user-select: none;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            min-width: 200px;
            padding: 8px;
            display: none;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            z-index: 9999;
        }

        .dropdown-menu-custom.show {
            display: block;
        }

        .dropdown-name {
            padding: 8px 12px 10px;
            font-size: 13px;
            font-weight: 600;
            color: #3d4852;
            border-bottom: 1px solid #e3e6f0;
            margin-bottom: 6px;
        }

        .dropdown-email {
            font-size: 11px;
            font-weight: 400;
            color: #6c757d;
            margin-top: 2px;
        }

        .dropdown-item-custom {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 13px;
            color: #6c757d;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.15s;
            background: none;
            border: none;
            width: 100%;
            font-family: Raleway, sans-serif;
            text-align: left;
        }

        .dropdown-item-custom:hover {
            background: #f8f9fc;
            color: #3d4852;
            text-decoration: none;
        }

        .dropdown-item-custom.danger:hover { color: #c53030; }

        @media (max-width: 768px) {
            .stats-row { grid-template-columns: 1fr 1fr; }
            .items-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .stats-row { grid-template-columns: 1fr; }
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<div style="background:#fff;border-bottom:1px solid #e3e6f0;
            padding:12px 0;position:relative;z-index:100;
            box-shadow:0 2px 4px rgba(0,0,0,0.05);">
    <div class="container" style="display:flex;align-items:center;
                                   justify-content:space-between;">

        {{-- Brand --}}
        <a href="{{ route('home') }}"
           style="font-weight:700;font-size:1.2rem;color:#3d4852;
                  text-decoration:none;">
            🔍 FindIt
        </a>

        {{-- Nav links --}}
        <div style="display:flex;align-items:center;gap:16px;">

            <a href="{{ route('home') }}"
               style="font-size:14px;font-weight:600;
                      color:#6c757d;text-decoration:none;">
                Home
            </a>

            @auth
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}"
                       style="font-size:14px;font-weight:600;
                              color:#6c757d;text-decoration:none;">
                        Admin
                    </a>
                @endif

                <a href="{{ route('items.create') }}"
                   style="background:#5a67d8;color:#fff;padding:7px 16px;
                          border-radius:4px;font-size:13px;font-weight:600;
                          text-decoration:none;">
                    + Post Item
                </a>

{{-- Avatar --}}
<div style="position:relative;width:34px;height:34px;">
                    <div id="avatarBtn"
                         style="width:34px;height:34px;
                                background:linear-gradient(135deg,#5a67d8,#38a169);
                                border-radius:50%;display:flex;
                                align-items:center;justify-content:center;
                                font-size:13px;font-weight:700;
                                color:#fff;cursor:pointer;
                                user-select:none;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

<div id="avatarDropdown"
     style="display:none;pointer-events:none;position:absolute;
                                top:calc(100% + 8px);right:0;
                                background:#fff;border:1px solid #e3e6f0;
                                border-radius:6px;min-width:200px;
                                padding:8px;z-index:9999;
                                box-shadow:0 8px 24px rgba(0,0,0,0.12);">

                        <div style="padding:8px 12px 10px;font-size:13px;
                                    font-weight:600;color:#3d4852;
                                    border-bottom:1px solid #e3e6f0;
                                    margin-bottom:6px;">
                            {{ auth()->user()->name }}
                            <div style="font-size:11px;font-weight:400;
                                        color:#6c757d;margin-top:2px;">
                                {{ auth()->user()->email }}
                            </div>
                        </div>

                        <a href="#"
                           style="display:flex;align-items:center;gap:8px;
                                  padding:8px 12px;border-radius:4px;
                                  font-size:13px;color:#6c757d;
                                  text-decoration:none;">
                            👤 My Profile
                        </a>

                        <a href="#"
                           style="display:flex;align-items:center;gap:8px;
                                  padding:8px 12px;border-radius:4px;
                                  font-size:13px;color:#6c757d;
                                  text-decoration:none;">
                            📦 My Posts
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    style="display:flex;align-items:center;
                                           gap:8px;padding:8px 12px;
                                           border-radius:4px;font-size:13px;
                                           color:#c53030;background:none;
                                           border:none;cursor:pointer;
                                           width:100%;font-family:Raleway,sans-serif;">
                                🚪 Logout
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
<!-- Page content -->
<div class="page-wrapper">
    <div class="container">
        @if(session('success'))
            <div class="flash flash-success">✅ {{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</div>

@stack('scripts')

<script>
    var btn      = document.getElementById('avatarBtn');
    var dropdown = document.getElementById('avatarDropdown');

    if (btn && dropdown) {
        btn.onclick = function(e) {
            e.stopPropagation();
            if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                dropdown.style.display = 'block';
                dropdown.style.pointerEvents = 'auto';
            } else {
                dropdown.style.display = 'none';
                dropdown.style.pointerEvents = 'none';
            }
        };

        dropdown.onclick = function(e) {
            e.stopPropagation();
        };

        document.onclick = function() {
            dropdown.style.display = 'none';
            dropdown.style.pointerEvents = 'none';
        };
    }
</script>
</body>
</html>