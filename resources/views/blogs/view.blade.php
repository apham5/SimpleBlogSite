@extends('layouts.app')

@section('content')
<p class="text-muted">Created on {{ $blog->created_at }}. Last edited on {{ $blog->updated_at }}</p>
<p>
@endsection
