<div class="recipe-card p-0 rounded">
    <a href="/recipes/{{ $id }}">
        <div class="row no-gutters shadow-sm">
            <div class="col-12 col-md-4">
                <img class="recipe-img img-fluid" src="{{ asset('/storage/recipes/' . $image) }}">
            </div>
            <div class="col-12 col-md-8 p-3 font-main-dark font-small">
                <div class="h5 recipe-title font-parisienne">{{ $title }}</div>
                <span>Por {{ $name }}</span> <br>
                <span>Tempo: {{ $time }}</span> <br>
                <span>Rendimento: {{ $yield }}</span>
            </div>
        </div>
    </a>
</div>
