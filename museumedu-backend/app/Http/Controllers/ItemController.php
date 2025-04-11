<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        return Item::with('category')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'theme' => 'required',
            'year' => 'required|integer',
            'story' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('items', 'public');
            $validated['image_path'] = '/storage/' . $path;
        }

        return Item::create($validated);
    }
}
