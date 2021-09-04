<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts  =  Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.create.index'); 
    }

    public function store(StoreUpdatePost $request){ 
        /*
        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        */
        Post::create($request->all());
        return redirect()->route('posts.index');
    }
}
