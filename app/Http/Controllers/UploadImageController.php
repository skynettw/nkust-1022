<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedImage;

class UploadImageController extends Controller
{
    public function index() {

        $images = UploadedImage::all();
        return view("uploadindex", compact('images'));
    }

    public function upload(Request $request) {
        $path = $request->file('fileToUpload')->store('public');
        UploadedImage::insert(["filename"=>basename($path)]);
        return redirect("/");
    }
}
