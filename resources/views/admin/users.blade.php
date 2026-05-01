@extends('admin.layout')
@section('title', 'Manage Users')

@section('content')

<div class="row mb-3">
    <div class="col">
        <h5 style="font-weight:700;color:#3d4852;margin:0;">All Users</h5>
    </div>
</div>

<div class="filter-bar">
    <form method="GET" action="{{ route('admin.users') }}"
          style="display:flex;gap:10px;flex-wrap:wrap;width:100%;">
        <input type="text" name="q" class="filter-input"
               placeholder="Search by name or email…" value="{{ request('q') }}">
        <select name="role" class="filter-input" onchange="this.form.submit()">
            <option value="">All Roles</option>
            <option value="student" {{ request('role')==='student' ? 'selected':'' }}>
                Students
            </option>
            <option value="admin" {{ request('role')==='admin' ? 'selected':'' }}>
                Admins
            </option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
        @if(request()->hasAny(['q','role']))
            <a href="{{ route('admin.users') }}"
               class="btn btn-sm btn-outline-secondary">Clear</a>
        @endif
    </form>
</div>

<div class="card">
    <div class="card-header">
        Users
        <span style="font-size:13px;font-weight:400;color:#6c757d;">
            {{ $users->total() }} total
        </span>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Posts</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td style="color:#6c757d;font-size:12px;">{{ $user->id }}</td>
                        <td style="font-weight:600;">{{ $user->name }}</td>
                        <td style="font-size:13px;color:#6c757d;">{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-{{ $user->role }}">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td style="font-size:13px;">{{ $user->items_count }}</td>
                        <td style="font-size:12px;color:#6c757d;">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>
<td>
    @if($user->id !== auth()->id())
        <form method="POST"
              action="{{ route('admin.users.delete', $user) }}"
              style="display:inline;"
              onsubmit="return confirm('Delete {{ $user->name }}?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                Delete
            </button>
        </form>
    @else
        <span style="font-size:12px;color:#6c757d;">You</span>
    @endif
</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7"
                            style="text-align:center;color:#6c757d;padding:48px;">
                            No users found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
        <div style="padding:16px 20px;">
            {{ $users->links() }}
        </div>
    @endif
</div>

@endsection