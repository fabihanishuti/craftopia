<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File; // For file handling

class MainController extends Controller
{
    public function index()
    {
        // // Fetch all images from the 'public/images/carousel' directory
        // $images = File::files(public_path('images/carousel'));

        // // Only get the names of the images (you may need to adjust based on your actual file structure)
        // $images = array_map(function ($file) {
        //     return basename($file);
        // }, $images);

        // // Pass the images array to the view
        // return view('welcome', compact('images'));
    }
}
