@extends('layouts.layout')

@section('header')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@endsection

@section('content')

    <div class="container-fluid nav-margin py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="text-center title">
                    Todas as categorias
                </div>
                <div class="row justify-content-around">
                    @foreach($categories as $category)
                        <div class="col-12 col-md-6 col-lg-3 p-2 p-lg-5 text-center">
                            <a style="color: #CB3803;" href="{{ $category->id }}">{{ $category->name }}</a>
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
