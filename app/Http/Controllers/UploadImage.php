<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Controller
{
    public function uploadImage(Request $request)
    {
        $file = $request->file('imagen');
        $extension= $request->file('imagen')->extension();
        $path = Storage::disk('public')->putFileAs('',$file, 'foto.'.$extension);
        return $path;
    }
}
