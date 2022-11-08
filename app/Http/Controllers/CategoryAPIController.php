<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryAPIController extends Controller
{
    public function CategoryInfo()
    {
        $Categories = DB::table('categories')->get();
        $items = DB::table('items')->get();
        $data['categories'] = $Categories;
        $data['items'] = $items;
        return response()->json($data);
    }

    public function getItems(Request $request)
    {
        $items = DB::table('items')->where('category_id', $request->id)->get();
        $data['items'] = $items;
        return response()->json($data);
    }
}
