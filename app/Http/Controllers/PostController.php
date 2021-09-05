<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;

class PostController extends Controller
{
    public function posts(){
        //$posts  =  Post::orderBy('id', 'DESC')->paginate(2);
        $posts  =  Post::latest()->paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.create.index');
    }

    public function store(StoreUpdatePost $request){
        Post::create($request->all());
        return redirect()->route('admin.posts')->with('message','Created');
    }

    public function show($id){
        if(!$post = Post::find($id)){
            return redirect()->route('admin.posts');
        }
        return view('admin.show.index', compact('post')); 
    }

    public function delete($id){
        if(!$post = Post::find($id)){
            return redirect()->route('admin.posts');
        }

        $post->delete();
        return redirect()->route('admin.posts')->with('message', 'Deleted');
    }

    public function edit($id){
        if(!$post = Post::find($id)){
            return redirect()->route('admin.posts');
        }
        return view('admin.edit.index', compact('post'));
    }

    public function change(StoreUpdatePost $request, $id){
       
        $post = Post::find($id); 

        if(!$post){
            return redirect()->route('admin.posts');
        }

        $post->update(['title' => $request->title, 'content' => $request->content]);

        return redirect()->route('admin.edit', $id)->with('message', 'Changed'); 
    }
}