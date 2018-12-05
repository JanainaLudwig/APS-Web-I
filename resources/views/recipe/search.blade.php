@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    <div class="container-fluid nav-margin py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="text-center title">
                    Busca por: {{ $search }}
                </div>
                <div class="row justify-content-around">
                    @foreach($recipes as $recipe)
                        <div class="col-12 col-md-5 m-4 ">
                            @component('recipe.card')
                                @slot('id'){{ $recipe->id }}@endslot
                                @slot('image'){{ $recipe->image }}@endslot
                                @slot('title'){{ $recipe->title }}@endslot
                                @slot('name'){{ $recipe->user->name }}@endslot
                                @slot('time'){{ $recipe->time  }}@endslot
                                @slot('yield'){{ $recipe->yield }}@endslot
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="py-2 row justify-content-end">
                    <div class="col-12 pb-3 text-center">
                        <span class="title">Encontre uma receita:</span>
                        <form method="get" action="/pesquisa/" class="form-flex" id="search">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span><i class="fas fa-search"></i></span>
                                </button>
                            </span>
                        </form>
                        <hr>
                    </div>
                </div>

                @include('components.categories', ['categories'])
            </div>
        </div>
    </div>
@endsection
