@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 align="center">Home Page</h1> --}}

            <div style="text-align: center;">
                <a class="btn btn-primary btn-lg" href="/blogs/create"><i class="fas fa-plus"></i> Write a Blog</a>&nbsp
                <a class="btn btn-secondary btn-lg" href="/relations">Preview tables</a>
            </div>
            <br>
            @if($blogs->isEmpty())
                <div class="card">
                    <div class="card-header">No blogs</div>
                    <div class="card-body">
                        No blogs to display. Click on the button above to start writing a blog.
                    </div>
                </div>
            @else
                @foreach ($blogs as $blog)
                    <div class="card">
                        <div class="card-header"><i class="fas fa-user"></i><b> {{ $blog->user->username }}</b></div>

                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->title }}</h4>
                            @if(strlen($blog->content) < 100)
                                <p class="card-text">{{ $blog->content }}</p>
                            @else
                                <p class="card-text">{{ substr($blog->content,0,100) }}...</p>
                            @endif
                            <a class="btn btn-primary" href="/blogs/{{ $blog->blog_id }}"><i class="far fa-eye"></i> View blog</a>
                            @if( (auth()->user()->username == $blog->user->username) || (auth()->user()->username == 'admin'))
                            <a class="btn btn-secondary" href="/blogs/{{ $blog->blog_id }}/edit"><i class="fas fa-pen"></i> Edit blog</a>
                            @endif
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> --}}
        {{-- </div>
    </div>
</div> --}}
@endsection
