<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\ItemPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function create(Request $request)
    {
        $categories = Category::all();
        $type = $request->get('type', 'lost');
        return view('items.create', compact('categories', 'type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type'          => 'required|in:lost,found',
            'title'         => 'required|string|max:255',
            'category_id'   => 'required|exists:categories,id',
            'description'   => 'required|string|min:10|max:1000',
            'location'      => 'required|string|max:255',
            'date_occurred' => 'required|date|before_or_equal:today',
            'photos'        => 'nullable|array|max:4',
            'photos.*'      => 'image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $item = Item::create([
            'user_id'        => Auth::id(),
            'category_id'    => $request->category_id,
            'type'           => $request->type,
            'title'          => $request->title,
            'description'    => $request->description,
            'location'       => $request->location,
            'contact_number' => $request->contact_number,
            'date_occurred'  => $request->date_occurred,
            'status'         => 'open',
            'is_approved'    => true,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('items', 'public'); // ✅ fixed

                ItemPhoto::create([
                    'item_id' => $item->id,
                    'path'    => $path,
                ]);
            }
        }

        return redirect()->route('home')
            ->with('success', 'Your item has been posted successfully!');
    }

    public function show(Item $item)
    {
        $item->load(['user', 'category', 'photos']);
        return view('items.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        if (Auth::id() !== $item->user_id && !Auth::user()->isAdmin()) {
            abort(403);
        }
        $item->delete();
        return redirect()->route('home')->with('success', 'Item deleted successfully.');
    }
}