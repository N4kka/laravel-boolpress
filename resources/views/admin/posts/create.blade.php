@extends('layouts.dashboard')

@section('content')
    <h1 class="mb-5">CREATE NEW POST</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                value="{{ old('content') }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" name="form-control" id="category_id">
                <option value="">No category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('$category->id' === $category->id ? 'selected' : '') }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <div class="mt-4">
                <h4>Tags:</h4>
                @foreach ($tags as $tag)
                    <div class="form-check mt-2">
                        <input class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}"
                            id="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea type="text" class="form-control" id="content" name="content" aria-describedby="emailHelp">{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
