<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function blog()
    {
        $berita = Berita::orderBy('id', 'DESC')->get();

        return view('landing_page.blog', compact('berita'));
    }
    public function preview($slug)
    {
        $berita = Berita::where('slug',$slug)->first();
        return view('landing_page.preview', compact('berita'));
    }
}
