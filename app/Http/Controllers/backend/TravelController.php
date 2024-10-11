<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Travel;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class TravelController extends Controller
{
    public function index(Request $request, $id)
{
   
    $search = $request->input('search');

    $kategori = Kategori::findOrFail($id);

   
    if ($search) {
        $travel = Travel::where('kategori_id', $id)
                        ->where('title', 'LIKE', "%{$search}%")
                        ->get();
    } else {
        
        $travel = Travel::where('kategori_id', $id)->get();
    }

    return view('backend.Travel.index', compact('kategori', 'travel'));
}


    public function create($id)
    {
        $travel = Travel::all();
        $kategori = Kategori::findOrFail($id);
        return view('backend.Travel.create', compact('travel', 'kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required',
            'descriotion'   => 'required',
            'kategori_id'   => 'required',
        ]);

        Travel::create(
            [
                'title'         => $request->title,
                'descriotion'   => $request->descriotion,
                'kategori_id'   => $request->kategori_id
            ]
        );

        return redirect()->route('beTravel.index', $request->kategori_id)->with(['Success' => 'Data Berhasil Disimpan']);
    }

    public function edit($id)
    {
        $travel = Travel::findOrFail($id);

        return view('backend.Travel.edit', compact('travel'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required',
            'descriotion'   => 'required',

        ]);

        $travel = Travel::findOrFail($id);

        $travel->update([
            'title'         => $request->title,
            'descriotion'   => $request->descriotion,
        ]);

        return redirect()->route('beTravel.index', $travel->kategori_id)->with('success', 'Data Berhasil Diubah');
    }


    public function destroy($id)
    {
        $travel = Travel::findOrFail($id);
        $kategori_id = $travel->kategori_id;
        $travel->delete();

        return redirect()->route('beTravel.index', ['id' => $kategori_id])->with('success', 'Data Berhail Dihapus!');
    }
}
