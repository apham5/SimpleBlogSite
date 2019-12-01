<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Comment::$rules, Comment::$messages);
        if ($validator->fails()) {
            return redirect()->route('blogs.show', $request->blog_id)->withErrors($validator)->withInput();
        }
        $comment = new Comment([
            'username' => $request->username,
            'blog_id' => $request->blog_id,
            'content' => $request->content,
            'timestamp' => date('Y-m-d H:i:s', time())
        ]);
        $comment->save();
        return redirect()->route('blogs.show',$request->blog_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with('pageTitle','Edit Comment')->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if ($request->button == 'destroy') {
            //echo 'got in here';
            $comment->delete();
            return redirect()->route('home')->withMessage('The comment has been deleted.')->with('backTo', 'home');
        }
        else {
            $validator = Validator::make($request->all(), Comment::$rules, Comment::$messages);
            if ($validator->fails()) {
                return redirect()->route('comment.edit', $comment)->withErrors($validator)->withInput();
            }
            $comment->content = $request->content;
            $comment->save();
            return redirect()->route('home')->withMessage('The comment has been updated.')->with('backTo', 'home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
