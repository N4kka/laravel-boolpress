@extends('layouts.dashboard')

@section('content')
    <h1>Edit post:</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" id="content" name="content" aria-describedby="emailHelp"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
