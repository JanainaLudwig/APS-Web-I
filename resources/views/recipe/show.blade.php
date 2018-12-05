@extends('layouts.layout')

@section('header')
<link rel="stylesheet" href="{{ asset('css/showRecipe.css') }}">
@endsection

@section('content')
<div class="container-fluid nav-margin" id="first-div">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="pt-lg-3 text-center">
                <span class="title-big">{{ $recipe->title }}</span>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-3 offset-lg-2">
                    <div class="font-main-dark">
                        <p>Por {{ $recipe->user->name }}</p>
                        <p>Tempo de preparo: {{ $recipe->time }}</p>
                        <p>Rendimento: {{ $recipe->yield }}</p>
                        <p>Categorias: <br>
                            @foreach($recipe->categories as $category)
                                <a href="/categoria/{{ $category->id }}">{{ $category->name }}</a>
                                @if(!$loop->last)
                                    ,
                                    @else
                                    .
                                @endif

                            @endforeach
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6 text-center" id="div-recipe-img">
                    <img class="img-recipe-show img-fluid" src="{{ asset('/storage/recipes/' . $recipe->image) }}">
                </div>
            </div>

            <div class="row py-5 bg-gray-light justify-content-center">
                <div class="col-12 text-center">
                    <span class="title-dark pb-1">Ingredientes</span>
                </div>
                <div class="col-12 col-md-6">
                    <div class="pt-5 pb-3 h5">Quantidade: <input min=".5" data-recipe-id="{{ $recipe->id }}" class="form-control my-1" step=".5" style="width: 60px" type="number" id="ingredients_quantity" value="1"></div>
                    <ul class="list-unstyled px-3" id="ingredients-list">
                        @foreach($recipe->ingredients as $ingredient)
                            <li><input type="checkbox" class="form-check-input check-ingredient"> {{ $ingredient->quantity }} {{ $ingredient->measure }} de {{ $ingredient->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 row justify-content-center">
                    <div class="col-12 col-md-6 py-2"><button id="uncheck" type="button" class="btn btn-secondary">Desmarcar todos.</button></div>
                </div>
            </div>

            <div class="row py-5 justify-content-center">
                <div class="col-12 text-center">
                    <span class="title-dark pb-2">Modo de preparo</span>
                </div>
                <div class="col-12 col-md-6 text-justify">
                    {{ $recipe->body }}
                </div>
            </div>

            <div class="row py-5 bg-gray-light justify-content-center">
                <div class="col-12 text-center">
                    <span class="title-dark pb-2">Comentários</span>
                </div>
                <div class="col-12 col-md-6">
                    <form method="post" action="{{ $recipe->id }}/comment">
                        @csrf
                        <label for="comment">Deixe seu comentário:</label>
                        <textarea class="form-control" id="comment" rows="3" name="body"></textarea>
                        <button type="submit" class="btn mt-2">Enviar</button>
                    </form>

                    @foreach($comments as $comment)
                        <div class="py-3">
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
        <div class="col-12 col-lg-3" id="related">
            <div class="row justify-content-center">
                <div class="col-12 pt-lg-3 text-center">
                    <span class="title-light">Outras receitas</span>
                </div>
                @foreach($other_recipes as $other_recipe)
                <div class="col-12 text-center py-3 img-related">
                    <div class="recipe-related">
                        <a href="/recipes/{{ $other_recipe->id }}"><img src="{{ asset('/storage/recipes/' . $other_recipe->image) }}" class="img-fluid"></a>
                        <div class="title-light">
                            {{ $other_recipe->title }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('bodyEnd')
    <script src="{{ asset('js/showRecipe.js') }}"></script>
@endsection
