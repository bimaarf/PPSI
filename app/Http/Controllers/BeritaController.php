<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
class BeritaController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required|max:255',
            'kategori_id'          =>  'required',
            'body'          =>  'required',
            'image'      =>      'required',
            'image.*'      =>      'mimes:jpeg,jpg,png',
        ]);

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename        =   time().'.'.$file->getClientOriginalName();
            $request->image->storeAs('public/berita', $filename);
         
            $data['title']          = $request->title;
            $data['slug']           = Str::slug($request->title, '-');
            $data['body']           = $request->body;
            $data['image']          = $filename;
            $data['kategori_id']    = $request->kategori_id;
            $data['user_id']         = Auth::id();
            Berita::insert($data);
            return redirect()->route('admin.berita.detail', ['slug'=>$data['slug']])->with('success', 'Berita berhasil ditambahkan!');
        }else {
            return back()->with('error', 'Pastikan form terisi dengan benar!');
        }


  
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'         =>  'required|max:255',
            'kategori_id'          =>  'required',
            'body'          =>  'required',
        ]);
    
        $berita                     = Berita::where('slug', $slug)->first();
        $berita->title              = $request->title;
        $berita->slug               = Str::slug($request->title, '-');
        $berita->body               = $request->body;
        $berita->kategori_id        = $request->kategori_id;
        $berita->user_id             = Auth::id();

        $berita->update();


        return redirect()->route('admin.berita.detail', ['slug'=>$berita['slug']])->with('success', 'Berita berhasil diubah!');
  
    }

    public function show()
    {
        $berita = Berita::orderBy('id', 'DESC')->simplePaginate(10);
        $users   = User::all();
        $kategori   = Kategori::all();
        return view('admin.berita.index', compact('berita', 'users', 'kategori'));
    }
    public function showUpdate($slug)
    {
        $berita = Berita::where('slug',$slug)->first();
        $kategori   =   Kategori::all();
        return view('admin.berita.update', compact('berita', 'kategori'));
    }
    public function detail($slug)
    {
        $berita = Berita::where('slug',$slug)->first();
        return view('admin.berita.detail', compact('berita'));
    }
}
