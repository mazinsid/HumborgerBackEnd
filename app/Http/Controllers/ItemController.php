<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index($id)
    {
        $items = DB::table('items')->where('category_id', $id)->get();
        $categories = DB::table('categories')->select('name')->where('id', $id)->get();
        foreach ($categories as $category) {
            $folderName = 'images/' . $category->name;
        }
        return view('items', compact('items'))->with('category_id', $id)->with('folderName', $folderName);
    }

    public function store(Request $request)
    {
        $categories = DB::table('categories')->select('name')->where('id', $request->category_id)->get();
        foreach ($categories as $category) {
            $folderName = 'images/' . $category->name;
        }
        $image = $request->file('image')->store($folderName, 'public');

        if ($request->isTopOfTheWeek == true) {
            $isTop = 1;
        } else {
            $isTop = 0;
        }
        // dd($folderName);
        Item::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'price' => $request->price,
            'isTopOfTheWeek' => $isTop,
            'size' => $request->size,
            'category_id' => $request->category_id,
            'image' => $image,
        ]);
        return redirect(Route('items', $request->category_id));
    }
}
