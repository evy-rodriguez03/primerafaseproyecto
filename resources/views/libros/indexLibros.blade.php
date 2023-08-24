<!DOCTYPE html>
<html lang="en">
<head>
  <title>Libros.biblioteca</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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
    background-color: #007bff;
    border: 1px solid #007bff;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .pagination a:hover,
  .pagination a:focus {
    background-color: #0056b3;
  }

  .pagination .active a {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  .pagination .disabled a {
    opacity: 0.5;
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
        <h1 class="text-center my-4">Lista de Libros</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
          <div>
            <a href="{{route('libros.create')}}" class="btn btn-sm btn-success">Agregar Libro</a>
            <a href="{{route('principal')}}" class="btn btn-sm btn-warning">Regresar</a>
          </div>
          <form method="GET" action="{{ route('libros.buscar') }}" class="w-50">
            <div class="input-group">
              <input type="text" name="titulo" class="form-control" placeholder="Buscar por título">
              <button class="btn btn-primary" type="submit">Buscar</button>
            </div>
          </form>
        </div>

        <div class="container mt-3">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th></th>
                <th scope="col">Titulo</th>
                <th scope="col">Autor</th>
                <th scope="col">Editorial</th>
                <th scope="col">Año Publicación</th>
                <th scope="col">Cantidad Disponible</th>
                <th scope="col">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($libros as $libro)
              <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial }}</td>
                <td>{{ $libro->anioPublicacion }}</td>
                <td>{{ $libro->cantidadDisponible }}</td>
                <td class="d-flex">
                  <a class="btn btn-sm btn-primary mr-2" href="{{ route('libros.edit', $libro->id) }}">Editar</a>
                  <form action="{{ route('libros.update', $libro->id) }}" method="POST">
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
              {{ $libros->links('pagination::bootstrap-4') }}
            </div>
          </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
