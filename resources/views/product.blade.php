<h1>Produtos</h1>
<ul>
    @foreach($products as $prod)
        <li>Produto: {{utf8_encode($prod->name) }} <br />
            Descricao: {{$prod->description }} <br />
            Preco: {{$prod->price }}</li><hr />
    @endforeach
</ul>