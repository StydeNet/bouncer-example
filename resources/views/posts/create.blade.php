@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nuevo post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titulo</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="body">Contenido</label>
                                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
