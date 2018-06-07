@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        {{ $post->body }}
                    </div>
                </div>

                <h2 class="mt-4 mb-4">Comentarios</h2>

                @foreach ($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        {{ $comment->body }}

                        <hr>

                        @can('delete', $comment)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm float-right">Eliminar comentario</button>
                            </form>
                        @endcan

                        Publicado por <strong>{{ $comment->user->name }}</strong>
                    </div>
                </div>
                @endforeach

                @auth
                <h2 class="mt-4 mb-4">Agregar nuevo comentario</h2>
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="body" rows="5" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </div>
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection
