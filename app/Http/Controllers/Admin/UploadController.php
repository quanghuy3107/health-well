<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /**
     * Upload image (for product, category, blog, settings).
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            'folder' => 'nullable|string',
        ]);

        $folder = $request->input('folder', 'uploads');
        $file = $request->file('file');
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '-' . time()
            . '.' . $file->getClientOriginalExtension();

        // Store in public/images/{folder}/
        $path = $file->move(public_path("images/{$folder}"), $filename);

        $url = "/images/{$folder}/{$filename}";

        return response()->json([
            'success' => true,
            'url' => $url,
            'filename' => $filename,
        ]);
    }

    /**
     * Upload image from CKEditor.
     */
    public function uploadEditorImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        $file = $request->file('upload');
        $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '-' . time()
            . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images/blog'), $filename);

        $url = asset("/images/blog/{$filename}");

        // CKEditor 5 SimpleUploadAdapter format
        return response()->json([
            'url' => $url,
        ]);
    }
}
