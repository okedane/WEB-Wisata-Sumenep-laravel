<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index(Request $request, $id)
    {
        $travel = Travel::findOrFail($id);
        $image  = Image::where('travel_id', $id)->get();
        return view('backend.Image.index', compact('travel', 'image'));
    }

    public function create($id)
    {
        $travel = Travel::findOrFail($id);
        return view('backend.Image.create', compact('travel'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_path'         => 'required|mimes:png,jpg,jpeg,webp|max:2048',
            'travel_id'         => 'required',
        ],);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->hashName();
            $image->storeAs('public/uploads/travel', $imageName);
        }

        Image::create([
            'image_path'         => $imageName ?? null,
            'travel_id'          => $request->travel_id,
        ]);

        return redirect()->route('beImage.index', $request->travel_id)->with(['success' => 'Data Berhasil Disimpan !']);
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);
        return view('backend.Image.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image_path' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image = Image::findOrFail($id);
        $imageName = $image->image_path;

        if ($request->hasFile('image_path')) {
            if ($imageName && Storage::exists('public/uploads/travel/' . $imageName)) {
                Storage::delete('public/uploads/travel/' . $imageName);
            }

            $imageFile = $request->file('image_path');
            $imageName = $imageFile->hashName();
            $imageFile->storeAs('public/uploads/travel', $imageName);
        }

        $image->update([
            'image_path' => $imageName,
        ]);

        return redirect()->route('beImage.index', $image->travel_id)->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $travel_id = $image->travel_id;

        if ($image->image_path && Storage::exists('public/uploads/travel/' . $image->image_path)) {
            Storage::delete('public/uploads/travel/' . $image->image_path);
        }

        $image->delete();
        return redirect()->route('beImage.index', ['id' => $travel_id])->with('success', 'Data Berhasil Dihapus!');
    }
}
