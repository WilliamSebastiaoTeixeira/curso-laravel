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
        return redirect()->route('posts.index')->with('message','Created');
    }

    public function show($id){
        //$post = Post::where('id', $id)->first();
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }
        return view('admin.show.index', compact('post')); 
    }

    public function delete($id){
        if(!$post = Post::find($id)){
            return redirect()->route('posts.index');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Deleted');
    }
}