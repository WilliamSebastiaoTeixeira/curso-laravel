<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str; 

class PostController extends Controller
{
    public function posts(){
        //$posts  =  Post::orderBy('id', 'DESC')->paginate(2);
        $posts  =  Post::latest()->paginate(4);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        return view('admin.create.index');
    }

    public function store(StoreUpdatePost $request){

        $data = $request->all(); 

        if($request->image->isValid()){
            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension(); 
            $file = $request->image->storeAs('posts',$nameFile);
            $data['image'] = $file;
        }

        Post::create($data);
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

        if(Storage::exists($post->image)){
            Storage::delete($post->image);
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

        $data = $request->except('_token', '_method'); 

        if($request->image && $request->image->isValid()){

            if(Storage::exists($post->image)){
                Storage::delete($post->image);
            }

            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension(); 
            $file = $request->image->storeAs('posts',$nameFile);
            $data['image'] = $file;
        }

        $post->update($data);

        return redirect()->route('admin.edit', $id)->with('message', 'Changed'); 
    }

    public function filter(Request $request){
        $filters =  $request->except('_token'); 

        $posts = Post::where('title', 'LIKE', "%{$request->filter}%")->orWhere('content', 'LIKE', "%{$request->filter}%")->paginate(4); 
        return view('admin.posts.index', compact('posts', 'filters')); 
    }
}