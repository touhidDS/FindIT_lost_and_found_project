<?php
namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with(['user', 'category', 'firstPhoto'])
            ->where('is_approved', true);

        // Filter by type
        if ($request->filled('type') && in_array($request->type, ['lost', 'found'])) {
            $query->where('type', $request->type);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('description', 'like', "%$q%")
                    ->orWhere('location', 'like', "%$q%");
            });
        }

        $items      = $query->latest()->paginate(12)->withQueryString();
        $categories = Category::all();
        $totalLost  = Item::where('type', 'lost')->where('is_approved', true)->count();
        $totalFound = Item::where('type', 'found')->where('is_approved', true)->count();
        $totalAll   = $totalLost + $totalFound;

        return view('home', compact(
            'items', 'categories',
            'totalLost', 'totalFound', 'totalAll'
        ));
    }
}