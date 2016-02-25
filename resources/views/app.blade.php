<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>CRUD - Laravel</title>

    <link href="{{ elixir('css/all-admin.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">CRUD - Laravel</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CRUD - Laravel</a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Categorias <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('categories.create') }}">Adicionar</a></li>
                <li><a href="{{ route('categories') }}">Listar</a></li>
                <li class="active"><a href="#">Products <span class="sr-only">(current)</span></a></li>
                <li><a href="{{ route('products.create') }}">Adicionar</a></li>
                <li><a href="{{ route('products') }}">Listar</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ elixir('js/all-admin.js') }}"></script>
</body>
</html>
