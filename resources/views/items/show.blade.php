<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindIt – {{ $item->title }}</title>
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

        .page-wrapper { padding: 32px 0 48px; }

        .card {
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 1px solid #e3e6f0;
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px 20px;
            color: #3d4852;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-body { padding: 24px; }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #6c757d;
            text-decoration: none;
            margin-bottom: 16px;
            font-weight: 600;
        }

        .back-link:hover { color: #3d4852; text-decoration: none; }

        /* Photos */
        .photos-grid {
            display: grid;
            gap: 3px;
            margin-bottom: 0;
            border-radius: 6px 6px 0 0;
            overflow: hidden;
        }

        .photos-grid img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .no-photo {
            height: 200px;
            background: #f8f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            border-radius: 6px 6px 0 0;
            border-bottom: 1px solid #e3e6f0;
        }

        /* Badges */
        .badge {
            font-size: 11px;
            font-weight: 600;
            padding: 4px 12px;
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

        .badge-claimed {
            background: #f8f9fc;
            color: #6c757d;
            border: 1px solid #ced4da;
        }

        .badge-category {
            background: #f8f9fc;
            color: #6c757d;
            border: 1px solid #e3e6f0;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
        }

        /* Item title */
        .item-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #3d4852;
            margin-bottom: 10px;
        }

        .item-desc {
            font-size: 14px;
            color: #6c757d;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        /* Details grid */
        .details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            background: #f8f9fc;
            border: 1px solid #e3e6f0;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 24px;
        }

.detail-item label {
    font-size: 11px;
    font-weight: 700;
    color: #6c757d;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: block;
    margin-bottom: 4px;
}

.detail-item span {
    font-size: 14px;
    color: #3d4852;
    font-weight: 600;
    display: block; /* ← add this */
    line-height: 1.4; /* ← add this */
}
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 20px;
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

        .btn-danger {
            background-color: #fff5f5;
            color: #c53030 !important;
            border: 1px solid #feb2b2;
        }

        .btn-danger:hover {
            background-color: #fff0f0;
            text-decoration: none;
        }

        .posted-time {
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">🔍 FindIt</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
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
</nav>

<!-- Content -->
<div class="page-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <a href="{{ route('home') }}" class="back-link">← Back to Home</a>

                <div class="card">

                    {{-- Photos --}}
                    @if($item->photos->count() > 0)
                        <div class="photos-grid"
                             style="grid-template-columns: repeat({{ min($item->photos->count(), 3) }}, 1fr);">
                            @foreach($item->photos as $photo)
<img src="{{ url('storage/' . $photo->path) }}"
     alt="{{ $item->title }}">
                            @endforeach
                        </div>
                    @else
                        <div class="no-photo">
                            {{ $item->category->icon ?? '📦' }}
                        </div>
                    @endif

                    {{-- Card Header --}}
                    <div class="card-header">
                        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                            <span class="badge badge-{{ $item->status === 'open' ? $item->type : 'claimed' }}">
                                {{ $item->status === 'open' ? $item->type : $item->status }}
                            </span>
                            <span class="badge-category">
                                {{ $item->category->icon }} {{ $item->category->name }}
                            </span>
                        </div>
                        <span class="posted-time">
                            Posted {{ $item->created_at->diffForHumans() }}
                        </span>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body">

                        <h1 class="item-title">{{ $item->title }}</h1>
                        <p class="item-desc">{{ $item->description }}</p>

                        {{-- Details --}}
<div class="details-grid">
    <div class="detail-item">
        <label>📍 Location</label>
        <span>{{ $item->location }}</span>
    </div>
    <div class="detail-item">
        <label>📅 Date</label>
        <span>{{ $item->date_occurred->format('M d, Y') }}</span>
    </div>
    <div class="detail-item">
        <label>👤 Posted By</label>
        <span>{{ $item->user->name }}</span>
    </div>
    <div class="detail-item">
        <label>📞 Contact Number</label>
        <span>{{ $item->contact_number ?? 'Not provided' }}</span>
    </div>
</div>
                        {{-- Actions --}}
                        <div style="display:flex;gap:10px;flex-wrap:wrap;">

@if(auth()->id() !== $item->user_id && $item->contact_number)
    <a href="tel:{{ $item->contact_number }}" class="btn btn-primary">
        📞 Call {{ $item->contact_number }}
    </a>
@endif

                            @if(auth()->id() === $item->user_id || auth()->user()->isAdmin())
                                <form method="POST"
                                      action="{{ route('items.destroy', $item) }}"
                                      onsubmit="return confirm('Are you sure you want to delete this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        🗑 Delete Post
                                    </button>
                                </form>
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>