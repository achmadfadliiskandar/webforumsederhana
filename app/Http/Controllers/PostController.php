<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $post = Post::all();

        $user = Auth::user();

        $post = $user->post;
        return view('post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
                'title' => 'required',
                'body' => 'required'
            ]);
            $tags_arr = explode(',',$request["tags"]);
            // dd($tags_arr);

            $tag_ids = [];
            foreach($tags_arr as $tag_name){
                $tag = Tag::firstorCreate(["tag_name" => $tag_name]);
                $tag_ids[] = $tag->id;
                if($tag){
                    $tag_ids[] = $tag->id;  
                }else{
                    $new_tag = Tag::create(["tag_name"=> $tag_name]);
                    $tag_ids[] = $new_tag->id;
                }
            }

            // dd($tag_ids);

            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'user_id'=> Auth::id()
            ]);

            $post->tags()->sync($tag_ids);

            $user = Auth::user();
            $user->post()->save($post);

            return redirect('/post')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        $request->validate([
            'title' => 'required|unique:post',
            'body' => 'required',
        ]);
        $post = post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->update();
        return redirect('/post')->with('change','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/post')->with('delete','Data berhasil dihapus');
    }
}
