<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
     <div class="navbar navbar-expand-lg navbar-success container">
                <a href="{{ route('usuarios.index') }}" class="navbar-brand">Usuarios</a>
                <a href="{{ route('inventario_material.index') }}" class="navbar-brand">Inventario  material</a>
                <a href="{{ route('inventario_herramienta.index') }}" class="navbar-brand">Inventario herramienta</a>
                <a href="{{ route('categorias.index') }}" class="navbar-brand">Categorias</a>
                <a href="{{ route('colores.index') }}" class="navbar-brand">Colores</a>
                <a href="{{ route('detalles-crea.index') }}" class="navbar-brand">crea</a>
                <a href="{{ route('detalles-utiliza.index') }}" class="navbar-brand">utiliza</a>
                <a href="{{ route('pedidos.index') }}" class="navbar-brand">Pedidos</a>
        </div>
        @yield('content')
</body>
</html>