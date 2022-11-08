<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IngredientController extends Controller
{
    public function index(Request $request)
    {
        $ingredients = DB::table('ingredients')->where('item_id', $request->item_id)->get();

        return view('ingredients', compact('ingredients'))->with('item_id', $request->item_id)->with('folderName', $request->folderName);
    }

    public function store(Request $request)
    {
        $folderName = $request->folderName . 'ingredients';
        $image = $request->file('image')->store($folderName, 'public');

        Ingredient::create([
            'name' => $request->name,
            'image' => $image,
            'item_id' => $request->item_id,
        ]);
        $ingredients = DB::table('ingredients')->where('item_id', $request->item_id)->get();

        return view('ingredients', compact('ingredients'))->with('item_id', $request->item_id)->with('folderName', $request->folderName);
    }
}
