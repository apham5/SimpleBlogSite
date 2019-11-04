<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('home')->with('pageTitle','Home')->with('blogs',$blogs);
    }

    public function relations()
    {
        $users = DB::table('users')->take(3)->get();
        $blogs = DB::table('blogs')->take(3)->get();
        $comments = DB::table('comments')->take(3)->get();
        $likes = DB::table('likes')->take(3)->get();
        return view('relations')->with('pageTitle','Milestone 2 Task C: Relations')->with('users',$users)->with('blogs',$blogs)->with('comments',$comments)->with('likes',$likes);
    }
}
