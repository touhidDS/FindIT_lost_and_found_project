<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_users'   => User::count(),
            'total_items'   => Item::count(),
            'lost_items'    => Item::where('type', 'lost')->count(),
            'found_items'   => Item::where('type', 'found')->count(),
            'open_items'    => Item::where('status', 'open')->count(),
            'claimed_items' => Item::where('status', 'claimed')->count(),
        ];

        $recentItems = Item::with(['user', 'category'])
            ->latest()->take(8)->get();

        $recentUsers = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentItems', 'recentUsers'));
    }

    public function items(Request $request)
    {
        $query = Item::with(['user', 'category']);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('q')) {
            $query->where('title', 'like', '%'.$request->q.'%');
        }

        $items = $query->latest()->paginate(15)->withQueryString();
        return view('admin.items', compact('items'));
    }

    public function users(Request $request)
    {
        $query = User::withCount('items');

        if ($request->filled('q')) {
            $query->where('name', 'like', '%'.$request->q.'%')
                  ->orWhere('email', 'like', '%'.$request->q.'%');
        }
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query->latest()->paginate(15)->withQueryString();
        return view('admin.users', compact('users'));
    }

    public function deleteItem(Item $item)
    {
        $item->delete();
        return back()->with('success', 'Item deleted successfully.');
    }

    public function toggleItemStatus(Item $item)
    {
        $item->status = $item->status === 'open' ? 'claimed' : 'open';
        $item->save();
        return back()->with('success', 'Item status updated.');
    }

    public function deleteUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself.');
        }
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    public function toggleUserRole(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot change your own role.');
        }
        $user->role = $user->role === 'admin' ? 'student' : 'admin';
        $user->save();
        return back()->with('success', 'User role updated.');
    }
}