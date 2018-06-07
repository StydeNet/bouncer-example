@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts</div>

                    <div class="card-body">
                        @foreach ($posts as $post)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h3>
                                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                                    </h3>
                                    <hr>
                                    {{ $post->body }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
