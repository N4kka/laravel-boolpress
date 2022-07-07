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
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title') ? old('title') : $post->title }}">
        </div>
        <div class="mb-3">
            <label for="category_id" name="category_id">Categories:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">No Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $post->category && old('category_id', $post->category->id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" id="content" name="content" aria-describedby="emailHelp"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
