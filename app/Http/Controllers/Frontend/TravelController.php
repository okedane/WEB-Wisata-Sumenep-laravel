<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Kategori;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $travels = Travel::where('kategori_id', $id)->with('image')->get();
        return view('frontend.travel.index', compact('kategori', 'travels'));
    }

    public function show($id)
    {
        $travel = Travel::findOrFail($id);
        $image  = Image::where('travel_id', $id)->get();
        return view('frontend.travel.show', compact('travel', 'image'));
    }
}
