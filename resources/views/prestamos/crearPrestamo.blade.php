<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
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

/* New styles for smaller textboxes */
.form-group {
    margin-bottom: 10px;
}

.form-group label {
    font-weight: bold;
}

.form-group input[type="date"],
.form-group select {
    width: calc(50% - 5px);
    display: inline-block;
    margin-right: 10px;
}

</style>

<body>

<div class="container">
        <h1 class="text-center my-4">Lista de Prestamos</h1>

        <div class="card shadow mb-4">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col text-right">
                        <a href="{{route('prestamo.create')}}" class="btn btn-sm btn-success">Agregar Prestamo</a>
                        <a href="{{route('principal')}}" class="btn btn-sm btn-warning">Regresar</a>
                      </div>
                </div>
            </div>
        </div>


    <!-- Formulario para crear un nuevo préstamo -->
    <form method="POST" action="{{ route('prestamos.store') }}">
        @csrf
        <div class="form-group">
            <label for="fechaSolicitud">Fecha de Solicitud</label>
            <input type="date" class="form-control" id="fechaSolicitud" name="fechaSolicitud" required>
        </div>
        <div class="form-group">
            <label for="fechaPrestamo">Fecha de Préstamo</label>
            <input type="date" class="form-control" id="fechaPrestamo" name="fechaPrestamo" required>
        </div>
        <div class="form-group">
            <label for="fechaDevolucion">Fecha de Devolución</label>
            <input type="date" class="form-control" id="fechaDevolucion" name="fechaDevolucion" required>
        </div>
        <div class="form-group">
            <label for="libroId">Libro</label>
            <select class="form-control" id="libroId" name="libroId" required>
                <!-- Iteramos sobre los libros y creamos una opción por cada uno -->
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="usuarioId">Usuario</label>
            <select class="form-control" id="usuarioId" name="usuarioId" required>
                <!-- Iteramos sobre los usuarios y creamos una opción por cada uno -->
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Préstamo</button>
    </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
