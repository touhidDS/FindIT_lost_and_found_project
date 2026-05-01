@extends('admin.layout')
@section('title', 'Manage Items')

@section('content')

<div class="row mb-3">
    <div class="col">
        <h5 style="font-weight:700;color:#3d4852;margin:0;">All Items</h5>
    </div>
</div>

<div class="filter-bar">
    <form method="GET" action="{{ route('admin.items') }}"
          style="display:flex;gap:10px;flex-wrap:wrap;width:100%;">
        <input type="text" name="q" class="filter-input"
               placeholder="Search items…" value="{{ request('q') }}">
        <select name="type" class="filter-input" onchange="this.form.submit()">
            <option value="">All Types</option>
            <option value="lost"  {{ request('type')==='lost'  ? 'selected':'' }}>Lost</option>
            <option value="found" {{ request('type')==='found' ? 'selected':'' }}>Found</option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
        @if(request()->hasAny(['q','type','status']))
            <a href="{{ route('admin.items') }}"
               class="btn btn-sm btn-outline-secondary">Clear</a>
        @endif
    </form>
</div>

<div class="card">
    <div class="card-header">
        Items
        <span style="font-size:13px;font-weight:400;color:#6c757d;">
            {{ $items->total() }} total
        </span>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td style="color:#6c757d;font-size:12px;">{{ $item->id }}</td>
                        <td>
                            <a href="{{ route('items.show', $item) }}"
                               style="color:#3d4852;text-decoration:none;font-weight:600;">
                                {{ Str::limit($item->title, 28) }}
                            </a>
                            <div style="font-size:12px;color:#6c757d;">
                                {{ $item->category->icon }} {{ $item->category->name }}
                            </div>
                        </td>
                        <td>
                            <div style="font-size:13px;font-weight:600;">
                                {{ $item->user->name }}
                            </div>
                            <div style="font-size:11px;color:#6c757d;">
                                {{ $item->user->email }}
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-{{ $item->type }}">
                                {{ $item->type }}
                            </span>
                        </td>
                        <td style="font-size:13px;color:#6c757d;">
                            {{ Str::limit($item->location, 20) }}
                        </td>
                        <td style="font-size:12px;color:#6c757d;">
                            {{ $item->created_at->format('M d, Y') }}
                        </td>
                        <td>
                            <form method="POST"
                                  action="{{ route('admin.items.delete', $item) }}"
                                  onsubmit="return confirm('Delete this item?')"
                                  style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7"
                            style="text-align:center;color:#6c757d;padding:48px;">
                            No items found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($items->hasPages())
        <div style="padding:16px 20px;">
            {{ $items->links() }}
        </div>
    @endif
</div>

@endsection