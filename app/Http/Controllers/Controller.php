<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

abstract class Controller
{
    //

    public static function filesaver($file, $path)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }
    
        // Ensure the file has an extension
        $extension = $file->getClientOriginalExtension();
        if (!$extension) {
            $extension = $file->guessExtension(); // Try to guess the extension
        }
    
        // Generate a unique filename
        $filename = time() . '_' . uniqid() . '.' . $extension;
    
        // Move the file
        $file->move($path, $filename);
    
        return $filename;
    }

    public static function generateUniqueSlug($slug)
    {
        $count = \App\Models\BasicInformation::where('portfolioname', 'LIKE', "$slug%")->count();
        return $count ? "{$slug}-" . ($count + 1) : $slug;
    }

    public static function getScreenshot($url) {
        $response = Http::get('http://localhost:3000/screenshot', [
            'url' => $url
        ]);
    
        $data = $response->json();

        if (isset($data['screenshot'])) {
            // Decode base64 string
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data['screenshot']));

            // Define file name
            $filename = 'screenshot_' . time() . '.png';

            // Save image to storage
            Storage::disk('public')->put('projects/' . $filename, $imageData);

            return $filename;
        }

        return null;
    }
}
