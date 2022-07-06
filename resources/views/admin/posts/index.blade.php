@extends('layouts.dashboard')

@section('content')
    <h1>Hey, these are your posts:</h1>

    <div class="row row-cols-4">
        @foreach ($post as $post_item)
            {{-- single post looped for each element in the db posts table --}}
            <div class="card m-4" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $post_item->title }}</h5>
                    <a href="{{ route('admin.posts.show', ['post' => $post_item->id]) }}" class="btn btn-primary">Read the
                        full post</a>
                </div>
            </div>
            {{-- /single post looped for each element in the db posts table --}}
        @endforeach
    </div>
    </div>
@endsection
