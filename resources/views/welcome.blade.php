@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    <header class="shadow-sm">
    </header>

    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-10">
                <div class="row justify-content-around">
                    @foreach($recipes as $recipe)
                        <div class="col-12 col-md-5 m-4 recipe-card p-0 rounded font-serif">
                            <a href="/recipes/{{ $recipe->id }}">
                            <div class="row no-gutters">
                                <div class="col-12 col-md-4">
                                    <img class="recipe-img img-fluid" src="{{ asset('/storage/recipes/' . $recipe->image) }}">
                                </div>
                                <div class="col-12 col-md-8 p-3">
                                    <div class="h5 recipe-title">{{ $recipe->title }}</div>
                                    <span class="text-muted">Por {{ $recipe->user->name }}</span> <br>
                                    <span class="text-muted">Tempo: 30min</span>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-12 col-md-2">

            categorias
            </div>
        </div>
    </div>

        <div class="row justify-content-center py-3">
            <div class="col-8">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>




@endsection
