<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts  =  Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.create.index'); 
    }

    public function store(Request $request){ 
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
