@extends('layouts.layout')

@section('bodyEnd')
    <script src="{{ asset('js/newRecipe.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="text-center pt-3">
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
                        <label class="h5" for="body">Instruções: </label>
                        <textarea type="text" class="form-control" id="body" name="body"></textarea>
                    </div>
                    <div id="ingredients" class="form-group">
                        <label class="h5" for="body">Ingredientes: </label>
                        <div class="form-row ingredientForm py-2" data-number="0">
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label class="h6" for="body">Quantidade: </label>
                                <input value="1" type="number" class="form-control" name="ingredient[0][quantity]">
                            </div>
                            <div class="col-12 col-sm-6 col-lg-2">
                                <label class="h6" for="body">Medido em: </label>
                                <select class="custom-select mr-sm-2" id="" name="ingredient[0][measure]">
                                    <option selected disabled>Escolha...</option>
                                    <option value="Unidade(s)">Unidade(s)</option>
                                    <option value="Grama(s)">Grama(s)</option>
                                    <option value="Miligrama(s)">Miligrama(s)</option>
                                    <option value="Colher(es) de sopa">Colher(es) de sopa</option>
                                    <option value="Colher(es) de chá">Colher(es) de chá</option>
                                    <option value="Xícara(s)">Xícara(s)</option>
                                    <option value="Copo(s)">Copo(s)</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="h6" for="body">Nome: </label>
                                <input type="text" class="form-control" name="ingredient[0][name]">
                            </div>
                            <div class="col-1 pt-4 text-right">
                                <span class="align-text-bottom">
                                    <button type="button" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
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