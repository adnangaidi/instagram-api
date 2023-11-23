<?php

namespace App\Http\Controllers;

use App\Models\UploadReels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class UploadReelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try {
            $title = $request->input('title');
            $description = $request->input('description');
            $mudiasUrl = $request->input('mudias_url');

            // Decode base64-encoded video content
            $videoContent = base64_decode($mudiasUrl);
 // Generate a unique filename
 $filename = uniqid() . '_' . time() . '.mp4';

 // Store the video in the storage/app/public directory
 Storage::disk('public')->put($filename, $mudiasUrl);
            $newVideo = new UploadReels();
            $newVideo->title = $title;
            $newVideo->description = $description;
            $newVideo->mudia_url = $filename;
            $newVideo->save();
            return response()->json(['message' => 'Video uploaded successfully'], 200);
        // } catch (\Exception $e) {
        //     // Log the error or handle it in another way
        //     return response()->json(['error' => 'jamal']);
        // }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(UploadReels $uploadReels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UploadReels $uploadReels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UploadReels $uploadReels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UploadReels $uploadReels)
    {
        //
    }
}
