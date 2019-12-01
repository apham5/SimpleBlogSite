@extends('layouts.app')

@section('content')
        <fieldset class="border p-2">
            <legend class="w-auto">Edit Blog</legend>
            <form method="POST" action="{{ route('blogs.update', $blog) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Give your blog a title" value={{ $blog->title }}>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" rows="10" placeholder="Write your blog post here...">{{ $blog->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="button" value="update"><i class="fas fa-save"></i> Update</button>
                &nbsp or &nbsp
                <button type="submit" class="btn btn-secondary" name="button" value="destroy"><i class="fas fa-trash"></i> Delete blog</button>
            </form>
        </fieldset>
@endsection
