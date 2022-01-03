<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
    $post = Post::latest()->paginate(10);
        return view('post.index', compact('post'));
}
public function create()
{
    return view('post.create');
}
public function store(Request $request)
{
    $this->validate($request, [
        'judul'     => 'required',
        'isi'     => 'required',
        'slug'     => 'required',
        'gambar'     => 'required|image|mimes:png,jpg,jpeg',
      
    ]);

    //upload image
    $image = $request->file('image');
    $image->storeAs('public/post', $image->hashName());

    $post = Post::create([
        'judul'     => $request->judul,
        'isi'     => $request->isi,
        'slug'     => $request->slug,
        'gambar'     => $image->hashName(),
       
    ]);

    if($post){
        //redirect dengan pesan sukses
        return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('post.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}
}
