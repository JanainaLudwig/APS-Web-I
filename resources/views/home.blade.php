@extends('layouts.layout')

@section('content')
    <div class="container-fluid nav-margin pt-5">
        <div class="row justify-content-center">
            <div class="col-10 col-md-8">
                <div class="card">
                    <div class="card-header bg-main-medium">
                        <div class="text-center title">
                            Minhas receitas
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-around">
                            @if(count($recipes) == 0)
                                <div class="col-12 text-center text-muted">
                                    <a href="/create">Envie sua primeira receita.</a>
                                </div>
                            @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection
