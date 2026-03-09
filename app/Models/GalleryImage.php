<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\GalleryImage;


class GalleryImageController extends Controller
{
    public function index(){
        $gallery_images = GalleryImage::all();
        return view('gallery_image.index',compact('gallery_images'));
    }
}
