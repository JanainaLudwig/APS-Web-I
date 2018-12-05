@extends('layouts.layout')

@section('bodyEnd')
    <script src="{{ asset('js/newRecipe.js') }}"></script>
@endsection

@section('content')
    <div class="container nav-margin">
        <div class="text-center title pt-3">
            <h2>Nova receita</h2>
        </div>
        <div class="row justify-content-center">

            <div class="col-12 col-lg-10">
                <form method="post" action="/create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="h5" for="title">Nome: </label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group form-row">
                        <div class="col-6">
                            <label class="h5" for="yield">Rendimento: </label>
                            <input type="text" class="form-control" id="title" name="yield">
                        </div>
                        <div class="col-6">
                            <label class="h5" for="time">Tempo de preparo: </label>
                            <input type="text" class="form-control" id="title" name="time">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h5" for="title">Foto: </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="h5" for="time">Categoria: </label>
                        <select id="inputState" class="form-control" name="category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="h5" for="body">Instruções: </label>
                        <textarea type="text" class="form-control" id="body" name="body"></textarea>
                    </div>
                    <div id="ingredients" class="form-group">
                        <label class="h5" for="body">Ingredientes: </label>
                        <div class="form-row ingredientForm py-2" data-number="0">
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label class="h6" for="body">Quantidade: </label>
                                <input type="number" step=".25" class="form-control" name="ingredient[0][quantity]">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label class="h6" for="body">Medido em: </label>
                                <input type="text" class="form-control" name="ingredient[0][measure]">
                            </div>
                            <div class="col">
                                <label class="h6" for="body">Nome: </label>
                                <input type="text" class="form-control" name="ingredient[0][name]">
                            </div>
                            <div class="col-1 pt-4 text-right">
                                <span class="align-text-bottom">
                                    <button type="button" class="close" aria-label="Close">
                                        <span class="remove-ingredient" aria-hidden="true">&times;</span>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="text-right py-3">
                        <button type="button" class="close" aria-label="Close" id="newIngredient">
                            <span aria-hidden="true">&plus;</span>
                        </button>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
