@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->slug }}</p>
        <p>{{ $post->content }}</p>
        <div class="d-flex">
            <a class="btn btn-primary mr-4" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>
            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
