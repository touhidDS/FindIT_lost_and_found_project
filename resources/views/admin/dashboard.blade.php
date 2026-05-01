@extends('admin.layout')
@section('title', 'Dashboard')

@section('content')

<div class="row mb-3">
    <div class="col">
        <h5 style="font-weight:700;color:#3d4852;margin:0;">Dashboard</h5>
        <p style="font-size:13px;color:#6c757d;margin:0;">
            Welcome back, {{ auth()->user()->name }}
        </p>
    </div>
</div>

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Users</div>
        <div class="stat-num" style="color:#5a67d8;">{{ $stats['total_users'] }}</div>
        <div class="stat-desc">Registered students & admins</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Posts</div>
        <div class="stat-num" style="color:#3d4852;">{{ $stats['total_items'] }}</div>
        <div class="stat-desc">All lost & found posts</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Lost Items</div>
        <div class="stat-num" style="color:#c53030;">{{ $stats['lost_items'] }}</div>
        <div class="stat-desc">Items reported lost</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Found Items</div>
        <div class="stat-num" style="color:#276749;">{{ $stats['found_items'] }}</div>
        <div class="stat-desc">Items reported found</div>
    </div>
</div>

{{-- Two col --}}
<div class="two-col">

    {{-- Recent Items --}}
    <div class="card">
        <div class="card-header">
            Recent Items
            <a href="{{ route('admin.items') }}"
               class="btn btn-sm btn-outline-secondary">View All</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Posted By</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentItems as $item)
                        <tr>
                            <td>
                                <a href="{{ route('items.show', $item) }}"
                                   style="color:#3d4852;text-decoration:none;font-weight:600;">
                                    {{ Str::limit($item->title, 24) }}
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-{{ $item->type }}">
                                    {{ $item->type }}
                                </span>
                            </td>
                            <td style="font-size:13px;color:#6c757d;">
                                {{ $item->user->name }}
                            </td>
                            <td style="font-size:12px;color:#6c757d;">
                                {{ $item->created_at->format('M d') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                style="text-align:center;color:#6c757d;padding:32px;">
                                No items yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Recent Users --}}
    <div class="card">
        <div class="card-header">
            Recent Users
            <a href="{{ route('admin.users') }}"
               class="btn btn-sm btn-outline-secondary">View All</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentUsers as $user)
                        <tr>
                            <td style="font-weight:600;">{{ $user->name }}</td>
                            <td style="font-size:12px;color:#6c757d;">
                                {{ Str::limit($user->email, 24) }}
                            </td>
                            <td>
                                <span class="badge badge-{{ $user->role }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td style="font-size:12px;color:#6c757d;">
                                {{ $user->created_at->format('M d, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                style="text-align:center;color:#6c757d;padding:32px;">
                                No users yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection