@extends('layouts.app')

@section('content')
    <p class="text-muted">Created on {{ $blog->created_at }}. Last edited on {{ $blog->updated_at }}</p>
    <p> {{ $blog->content }} </p>

    @if ($likes->isEmpty())
        <p class="text-muted">No one has liked this post yet.</p>
    @elseif ($likes->where('username',$user->username)->isEmpty())
        <p class="text-muted"> {{ $likes->count() }} people liked this post. </p>
    @else
        <p class="text-muted">You and {{ $likes->count() - 1 }} people liked this post. </p>
    @endif

    {{-- likes --}}
    @if ($likes->where('username',$user->username)->isEmpty())
        <form method="POST" action="{{ route('like.store') }}">
            {{ csrf_field() }}
            <input type="hidden" name="blog_id" value={{ $blog->blog_id }}>
            <input type="hidden" name="username" value={{ $user->username }}>
            <button type="submit" class="btn btn-secondary btn-sm">Like</button>
        </form>
    @else
        <button class="btn btn-secondary" disabled>Liked</button>
    @endif
    <hr>

    {{-- comments --}}
    {{-- <h4>Comments</h4> --}}
    @if ($comments->isEmpty())
        <p class="text-center text-muted">No one has commented on this post yet.</p>
    @else
        @foreach($comments as $comment)
            <div class="container">
                <h6><b>{{$comment->username}}</b></h6>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">{{ $comment->content }}</p>
                    <p class="card-subtitle mb-2 text-muted">Last edited {{ $comment->updated_at }}</p>
                </div>
            </div>
            @if(!$loop->last)
                <br>
            @endif
        @endforeach
    @endif

    <hr>

    <form method="POST" action="{{ route('comment.store') }}">
        {{ csrf_field() }}
        <input type="hidden" name="blog_id" value={{ $blog->blog_id }}>
        <input type="hidden" name="username" value={{ $user->username }}>
        <label for="content">Leave a comment</label>
        <textarea class="form-control" name="content" rows="3" placeholder="Write your comment here..."></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>

@endsection
