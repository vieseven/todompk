<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    function index()
    {
        // $post = post::all(); //SELECT + FROM POSTS
        $posts = Post::latest()->paginate(15);
        //$posts = Post::paginate(15);
        return view('posts.index', compact('posts'));
    }

    function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }

    function create()
    {
        return view('posts.create');
    }
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:10',
            'content' => 'required'
        ], [
            'title.required' => 'Sila Isi Ruangan Tajuk',
            'title.min' => 'Tajuk mestilah 10 aksara',


            'content.required' => 'Sila Isi Ruangan Kandungan'
        ]);


        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::user()->id;
        $post->save();

        flash('Post Anda Telah DiSIMPAN')->success()->important();

        return redirect()->route('post.index');
    }
    function delete(Post $post)
    {
        $post->delete();
        flash('Post Anda Telah Dipadam')->success()->important();
        //success -hijau
        //error - merah

        return redirect()->route('post.index');
    }

    function edit(Post $post){
        return view('posts.create', compact('post'));
    }
    function update(Request $request, Post $post)   [
        $request->validate([
            'title'->'required'|min':10',
            'content'=> 'required'
        ]),[
            'title.required'=>'Sila isi ruangan tajuk',
            'title.min'=>'Tajuk mestilah sekurang-2nya 10 aksara','content.required'=>'Sila isi ruangan Kandungan'
        ]);
    ]
}

