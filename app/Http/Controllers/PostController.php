<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $post = Post::where('user_id','=',$id)->paginate(10);
        return view('post.index', compact('post'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request) //simpan data post
    {
        $this->validate($request, [ //untuk validate form
            'judul'     => 'required',
            'isi'     => 'required',
            'slug'     => 'nullable',
            'gambar'     => 'required|image|mimes:png,jpg,jpeg',

        ]);


        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/post', $image->hashName()); //store untuk menyimpan image

        $post = Post::create([ //nyimpen data tampil post
            'judul'     => $request->judul,
            'isi'     => $request->isi,
            'slug'     => Str::slug($request->judul),
            'gambar'     => $image->hashName(),

        ]);

        if ($post) {
            //redirect dengan pesan sukses
            return redirect()->route('post.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('post.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function edit(Post $post) //untuk update data
    {
        return view('post.edit', compact('post')); //untuk menampilkna form saja
    }
    public function update(Request $request, post $post) //aksi untuk menyimpan perubahan data
    {
        $this->validate($request, [
            'judul'     => 'required',
            'isi'     => 'required',
            'slug'     => 'nullable',
        ]);

        //get data post by ID
        // $post = post::findOrFail($post->id);

        if ($request->file('image') == "") {

            $post->update([
                'judul'     => $request->judul,
                'isi'     => $request->isi,
                'slug'     => Str::slug($request->judul),
            ]);
        } else {

            //hapus old image
            Storage::disk('local')->delete('public/post/' . $post->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/post', $image->hashName());

            $post->update([
                'judul'     => $request->judul,
                'isi'     => $request->isi,
                'slug'     => Str::slug($request->judul),
                'gambar'     => $image->hashName(),

            ]);
        }

        if ($post) {
            //redirect dengan pesan sukses
            return redirect()->route('post.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('post.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id) //menghapus data post
    {
        $post = Post::findOrFail($id);
        Storage::disk('local')->delete('public/post/' . $post->image);
        $post->delete();

        if ($post) {
            //redirect dengan pesan sukses
            return redirect()->route('post.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('post.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
