<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    protected $parameter=["title","author","description","published"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();
        return view("Post.AllPost",compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Post.postform");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request["published"] = isset($request->published) ;
        Post::create($request->only($this->parameter));
        // session()->flash("done","Add  Post Sucessfuly");
        Alert::success('Success ', 'Successful add Post');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $post_id)
    {
        $post=Post::find($post_id);
        return view("Post.Updatapost",compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request,  $post_id)
    {
        $post=Post::where("id",$post_id);
        $request["published"]=isset($request->published);
        $post->update($request->only($this->parameter));

        Alert::success('Success ', 'Successful Updata Post');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $post_id)
    {
        $post=Post::Where("id",$post_id);
        $post->delete();
        Alert::success('Delete ', 'Successful Delete Post');
        return redirect()->back();
        
    }
}
