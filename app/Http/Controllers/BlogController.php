<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs/create')->with('pageTitle','Create a Blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Blog::$rules, Blog::$messages);
        if ($validator->fails()) {
            return redirect()->route('blogs.create')->withErrors($validator)->withInput();
        }
        $blog = new Blog([
            'title' => $request->title,
            'content' => $request->content
        ]);
        //$blog->user()->save(auth()->user());
        auth()->user()->blogs()->save($blog);
        $blog->save();
        return redirect()->route('blogs.create')->withMessage('Your blog post has been created.')->with('backTo', 'home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $user = auth()->user();
        $likes = DB::table('likes')->where('blog_id',$blog->blog_id)->get();
        //$comments = DB::table('comments')->where('blog_id',$blog->blog_id)->orderBy('updated_at')->get();
        $comments = Comment::where('blog_id',$blog->blog_id)->orderBy('updated_at')->get();
        return view('blogs.view')->with('pageTitle',$blog->title)->with('blog',$blog)->with('user',$user)->with('likes',$likes)->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
