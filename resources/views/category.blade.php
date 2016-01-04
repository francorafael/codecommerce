<h1>Categorias</h1>
<ul>
    @foreach($categories as $cat)
        <li>Categoria: {{utf8_encode($cat->name) }} <br />
            Descricao: {{$cat->description }}</li><hr />
    @endforeach
</ul>