@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- Hero --}}
<div class="hero-box">
    <div class="hero-label">🎓 Daffodil International University</div>
    <h1>Lost something? Find it here.<br>Found something? Post it.</h1>
    <p>Your campus community platform to report lost items and return found belongings back to their owners.</p>
    <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <a href="{{ route('items.create', ['type' => 'lost']) }}" class="btn btn-primary">
            📢 Post Lost Item
        </a>
        <a href="{{ route('items.create', ['type' => 'found']) }}" class="btn btn-secondary">
            🎁 Post Found Item
        </a>
    </div>
</div>

{{-- Stats --}}
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon" style="background:#ebf4ff;">📋</div>
        <div>
            <div class="stat-num" style="color:#5a67d8;">{{ $totalAll }}</div>
            <div class="stat-label">Total Posts</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#fff5f5;">😟</div>
        <div>
            <div class="stat-num" style="color:#c53030;">{{ $totalLost }}</div>
            <div class="stat-label">Lost Items</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon" style="background:#f0fff4;">😊</div>
        <div>
            <div class="stat-num" style="color:#276749;">{{ $totalFound }}</div>
            <div class="stat-label">Found Items</div>
        </div>
    </div>
</div>

{{-- Filter Bar --}}
<div class="filter-bar">
    <a href="{{ route('home', array_merge(request()->except('type','page'), [])) }}"
       class="filter-tab {{ !request('type') ? 'active-all' : '' }}">All</a>
    <a href="{{ route('home', array_merge(request()->except('type','page'), ['type'=>'lost'])) }}"
       class="filter-tab {{ request('type')==='lost' ? 'active-lost' : '' }}">🔴 Lost</a>
    <a href="{{ route('home', array_merge(request()->except('type','page'), ['type'=>'found'])) }}"
       class="filter-tab {{ request('type')==='found' ? 'active-found' : '' }}">🟢 Found</a>

    <form method="GET" action="{{ route('home') }}"
          style="display:flex;gap:8px;flex:1;flex-wrap:wrap;">
        @if(request('type'))
            <input type="hidden" name="type" value="{{ request('type') }}">
        @endif
        <select name="category" class="filter-select" onchange="this.form.submit()">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ request('category') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->icon }} {{ $cat->name }}
                </option>
            @endforeach
        </select>
        <input type="text" name="q" value="{{ request('q') }}"
               placeholder="Search items, location…"
               class="filter-input">
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
        @if(request()->hasAny(['q','category','type']))
            <a href="{{ route('home') }}" class="btn btn-secondary btn-sm">✕ Clear</a>
        @endif
    </form>
</div>

{{-- Section header --}}
<div class="section-header">
    <span class="section-title">
        @if(request('type') === 'lost') Lost Items
        @elseif(request('type') === 'found') Found Items
        @else Recent Posts
        @endif
    </span>
    <span class="section-count">
        {{ $items->total() }} item{{ $items->total() !== 1 ? 's' : '' }} found
    </span>
</div>

{{-- Items Grid --}}
@if($items->count() > 0)
    <div class="items-grid">
        @foreach($items as $item)
            <a href="{{ route('items.show', $item) }}" class="item-card">
                <div class="item-img">
                    @if($item->firstPhoto)
                        <img src="{{ asset('storage/' . $item->firstPhoto->path) }}"
                             alt="{{ $item->title }}">
                    @else
                        {{ $item->category->icon ?? '📦' }}
                    @endif
                </div>
                <div class="item-body">
                    <div class="item-meta">
                        <span class="badge badge-{{ $item->status === 'open' ? $item->type : 'claimed' }}">
                            {{ $item->status === 'open' ? $item->type : $item->status }}
                        </span>
                        <span class="item-date">
                            {{ $item->date_occurred->format('M d, Y') }}
                        </span>
                    </div>
                    <div class="item-title">{{ $item->title }}</div>
                    <div class="item-desc">{{ $item->description }}</div>
                    <div class="item-footer">
                        <span class="item-location">📍 {{ $item->location }}</span>
                        <span class="item-category">
                            {{ $item->category->icon }} {{ $item->category->name }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    @if($items->hasPages())
        <div class="pagination">
            {{ $items->links() }}
        </div>
    @endif

@else
    <div class="empty-state">
        <div class="empty-icon">🔍</div>
        <h3>No items found</h3>
        <p>
            @if(request()->hasAny(['q','category','type']))
                No results match your filters. Try adjusting your search.
            @else
                No items have been posted yet. Be the first to post!
            @endif
        </p>
        <a href="{{ route('home') }}" class="btn btn-secondary">Clear Filters</a>
    </div>
@endif

@endsection