<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:5012'],
            'title' => ['required', 'unique:posts'],
            'content' => ['required'],
        ]);

        //upload image thumbnail
        $image = $request->file('image');

        $image->storeAs('public/blog/posts', $image->hashName());

        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'content' => $request->content
        ]);

        if ($post) {
            return redirect()->route('admin.post.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.post.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'image' => ['image', 'mimes:jpeg,jpg,png', 'max:5012'],
            'title' => 'required|unique:posts,title,' . $post->id,
            'content' => ['required'],
        ]);

        if ($request->hasFile('image')) {

            Storage::disk('local')->delete('public/blog/posts/' . basename($post->image));

            $image = $request->file('image');

            $image->storeAs('public/blog/posts', $image->hashName());

            $post->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'slug' => str($request->title)->slug(),
                'content' => $request->content,
            ]);
        } else {
            $post->update([
                'title' => $request->title,
                'slug' => str($request->title)->slug(),
                'content' => $request->content,
            ]);
        }

        if ($post) {
            return redirect()->route('admin.post.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            return redirect()->route('admin.post.index')->with(['success' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy(Post $post)
    {
        Storage::disk('local')->delete('public/blog/posts/' . basename($post->image));

        if ($post->delete()) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
