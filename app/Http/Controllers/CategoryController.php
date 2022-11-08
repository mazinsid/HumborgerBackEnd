<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index()
    {
        return view('category')->with('categories', Category::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg',
        ]);

        $image = $request->file('image')->store('images/items', 'public');
        Category::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return redirect(Route('category'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
