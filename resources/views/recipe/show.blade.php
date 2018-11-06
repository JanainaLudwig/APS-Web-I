@extends('layouts.layout')

@section('header')
<link rel="stylesheet" href="{{ asset('css/showRecipe.css') }}">
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">

        <div class="col-12 col-md-8 font-serif" id="recipeContent">
            <div class="jumbotron">
                <h2 class="display-4">{{ $recipe->title }}</h2>
                <p class="text-muted">Por {{ $recipe->user->name }}</p>

                <p class="py-3">{{ $recipe->body }}</p>

                <ul>
                @foreach($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->quantity }} {{ $ingredient->measure }} de {{ $ingredient->name }}</li>
                @endforeach
                </ul>
            </div>
        </div>


        <div class="col-12 col-md-4 scroll" id="commentsSection">
            <h3>Comentários</h3>
            <form method="post" action="{{ $recipe->id }}/comment" class="pt-3">
                @csrf
                <div class="form-group">
                    <textarea type="text" class="form-control" id="body" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
                <hr>
            </form>
            @foreach($comments as $comment)
            <div class="py-1">
                <div class="row">
                    <div class="col text-muted">
                        @if(Auth::check() && auth()->user()->id == $comment->user->id)
                            Você
                        @else
                            {{ $comment->user->name }}
                        @endif
                    </div>
                    @if(Auth::check() && $comment->user->id == auth()->user()->id)
                        <div class="col text-right">
                            <a href="/comments/delete/{{ $comment->id }}">X</a>
                        </div>
                    @endif
                </div>
                {{ $comment->body }}
            </div>
                <hr>
            @endforeach
        </div>

    </div>
</div>
@endsection

@section('bodyEnd')
    <script src="{{ asset('js/showRecipe.js') }}"></script>
@endsection