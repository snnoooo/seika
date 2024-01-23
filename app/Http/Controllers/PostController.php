<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Cloudinary;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); 
        //
    }
    
    public function search(Request $request){
        $search = $request -> input('search');
        
        $query = Post::query();
        
        if(!empty($search)){
            $query->where('posts_name', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%");
        }
        
        $posts = $query -> orderByDesc('created_at')->paginate(5);
        
        return view('posts.index')->with([
            'posts' => $posts,
            'search' => $search]);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        //
        //dd($image_url);
        
        $input = $request['post'];
        if ($request->file('image') != NULL){
            $image_filename = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_filename' => $image_filename];
            
        }
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('/posts/show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
