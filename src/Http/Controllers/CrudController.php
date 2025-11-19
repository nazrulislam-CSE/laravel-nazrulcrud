<?php

namespace NazrulCrud\Crud\Http\Controllers;

use App\Http\Controllers\Controller;
use NazrulCrud\Crud\Models\Item;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Status filter
        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'active') {
                $query->where('status', true);
            } elseif ($request->status == 'inactive') {
                $query->where('status', false);
            }
        }
        
        $paginationLimit = config('crud.pagination_limit', 10);
        $items = $query->latest()->paginate($paginationLimit);
        
        // Statistics for cards
        $totalItems = Item::count();
        $activeItems = Item::where('status', true)->count();
        $inactiveItems = Item::where('status', false)->count();
        $totalPrice = Item::sum('price');
        
        return view('crud::index', compact('items', 'totalItems', 'activeItems', 'inactiveItems', 'totalPrice'));
    }

    public function create()
    {
        return view('crud::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Item::create($data);

        return redirect()->route('crud.index')
            ->with('success', 'Item created successfully!');
    }

    public function show(Item $item)
    {
        return view('crud::show', compact('item'));
    }

    public function edit(Item $item)
    {
        return view('crud::edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'boolean'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($item->image && file_exists(public_path('images/'.$item->image))) {
                unlink(public_path('images/'.$item->image));
            }
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $item->update($data);

        return redirect()->route('crud.index')
            ->with('success', 'Item updated successfully!');
    }

    public function destroy(Item $item)
    {
        // Delete image
        if ($item->image && file_exists(public_path('images/'.$item->image))) {
            unlink(public_path('images/'.$item->image));
        }
        
        $item->delete();

        return redirect()->route('crud.index')
            ->with('success', 'Item deleted successfully!');
    }
}