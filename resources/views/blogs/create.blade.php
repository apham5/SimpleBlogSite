@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 align="center">New Blog</h1> --}}

            <fieldset class="border p-2">
                <legend class="w-auto">Create a Blog</legend>
                <form method="POST" action="{{ route('blogs.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Give your blog a title">
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" name="content" rows="10" placeholder="Write your blog post here..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </fieldset>
        {{-- </div>
    </div>
</div> --}}
@endsection
