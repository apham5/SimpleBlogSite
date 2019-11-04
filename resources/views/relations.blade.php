@extends('layouts.app')

@section('content')
<p>Here are the first 3 rows of each relation:</p>
<h4>Users</h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">username</th>
        <th scope="col">password</th>
        <th scope="col">created_at</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
        <tr>
            <td> {{ $user->username }} </td>
            @if(strlen($user->password) < 20)
                <td> {{ $user->password }} </td>
            @else
                <td> {{ substr($user->password,0,20) }}... </td>
            @endif
            <td> {{ $user->created_at }} </td>
        </tr>
      @endforeach
    </tbody>
</table>
<h4>Blogs</h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">blog_id</th>
        <th scope="col">username</th>
        <th scope="col">title</th>
        <th scope="col">content</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
      </tr>
    </thead>
    <tbody>
      @foreach($blogs as $blog)
        <tr>
            <td> {{ $blog->blog_id }} </td>
            <td> {{ $blog->username }} </td>
            <td> {{ $blog->title }} </td>
            @if(strlen($blog->content) < 20)
                <td> {{ $blog->content }} </td>
            @else
                <td> {{ substr($blog->content,0,20) }}... </td>
            @endif
            <td> {{ $blog->created_at }} </td>
            <td> {{ $blog->updated_at }} </td>
        </tr>
      @endforeach
    </tbody>
</table>
<h4>Comments</h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">comment_id</th>
        <th scope="col">username</th>
        <th scope="col">blog_id</th>
        <th scope="col">content</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
      </tr>
    </thead>
    <tbody>
      @foreach($comments as $comment)
        <tr>
            <td> {{ $comment->comment_id }} </td>
            <td> {{ $comment->username }} </td>
            <td> {{ $comment->blog_id }} </td>
            @if(strlen($comment->content) < 20)
                <td> {{ $comment->content }} </td>
            @else
                <td> {{ substr($comment->content,0,20) }}... </td>
            @endif
            <td> {{ $comment->created_at }} </td>
            <td> {{ $comment->updated_at }} </td>
        </tr>
      @endforeach
    </tbody>
</table>
<h4>Likes</h4>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">username</th>
        <th scope="col">blog_id</th>
        <th scope="col">timestamp</th>
      </tr>
    </thead>
    <tbody>
      @foreach($likes as $like)
        <tr>
            <td> {{ $like->username }} </td>
            <td> {{ $like->blog_id }} </td>
            <td> {{ $like->timestamp }} </td>
        </tr>
      @endforeach
    </tbody>
</table>

@endsection
