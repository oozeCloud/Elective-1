<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index()
    {
        $images = Image::latest()->paginate(8);
        return view('images.index', compact('images'));
    }
    
    public function uploadSingle(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image = $request->file('image');
        $name = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $name);
    
        Image::create([
            'path' => 'images/' . $name,
        ]);
    
        return redirect()->back()->with('success', 'Single image uploaded.');
    }
    
    public function uploadMultiple(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        foreach ($request->file('images') as $file) {
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
    
            Image::create([
                'path' => 'images/' . $name,
            ]);
        }
    
        return redirect()->back()->with('success', 'Multiple images uploaded.');
    }
    
    public function destroy(Image $image)
    {
        $path = public_path($image->path);
        if (file_exists($path)) {
            unlink($path);
        }
    
        $image->delete();
    
        return redirect()->back()->with('success', 'Image deleted.');
    }
    

}
