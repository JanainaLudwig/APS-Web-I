<div id="category">
    <div class="text-center title-light">
        Principais categorias
        <hr>
    </div>
    <div class="text-center">
        <ul class="list-group list-group-flush">
            @foreach($categories as $category)
                <a href="/categoria/{{ $category->id }}" ><li class="list-group-item">{{ $category->name }}</li></a>
            @endforeach
        </ul>
    </div>
</div>
