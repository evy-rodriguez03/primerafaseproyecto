<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<style>
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
  }

  .pagination a {
    display: inline-block;
    margin: 0 5px;
    padding: 10px 15px;
    background-color: #fff;
    border: 1px solid #ddd;
    color: #333;
  }

  .pagination a:hover,
  .pagination a:focus {
    background-color: #f5f5f5;
  }

  .pagination .active a {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
  }

  .pagination .disabled a {
    opacity: .5;
    pointer-events: none;
  }

  .table th, .table td {
    vertical-align: middle;
  }

  .table thead th {
    background-color: #000;
    color: #fff;
  }

  .table tbody tr:nth-child(even) {
    background-color: #1a1a1a;
    color: #fff;
  }
</style>

<body>

<div class="container">
    <h1 class="text-center my-4">Lista de Usuarios</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="{{route('usuario.create')}}" class="btn btn-sm btn-success">Agregar Usuario</a>
            <a href="{{route('principal')}}" class="btn btn-sm btn-warning">Regresar</a>
        </div>
        <form action="{{ route('usuarios.buscar') }}" method="GET" class="w-50">
            <div class="input-group">
                <input type="text" name="busqueda" class="form-control" placeholder="Buscar usuarios...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Buscar
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo Electrónico</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $Usuario)
                <tr>
                    <td>{{ $Usuario->id }}</td>
                    <td>{{ $Usuario->nombre }}</td>
                    <td>{{ $Usuario->correoElectronico }}</td>
                    <td>{{ $Usuario->telefono }}</td>
                    <td>{{ $Usuario->direccion }}</td>
                    <td class="d-flex">
                        <a class="btn btn-sm btn-primary mr-2" href="{{ route('usuario.edit', $Usuario->id) }}">Editar</a>
                        <form action="{{ route('usuario.update', $Usuario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $usuarios->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
