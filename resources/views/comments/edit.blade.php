@extends('layouts.app')

@section('content')
        <fieldset class="border p-2">
            <legend class="w-auto">Edit Comment</legend>
            <form method="POST" action="{{ route('comment.update', $comment) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" rows="5" placeholder="Write your comment here...">{{ $comment->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="button" value="update"><i class="fas fa-save"></i> Update</button>
                &nbsp or &nbsp
                <button type="submit" class="btn btn-secondary" name="button" value="destroy"><i class="fas fa-trash"></i> Delete comment</button>
            </form>
        </fieldset>
@endsection
