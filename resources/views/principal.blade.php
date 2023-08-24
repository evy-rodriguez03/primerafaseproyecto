<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Virtual</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <h1 class="text-center">Biblioteca Virtual</h1>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
      <a href="{{ route('libro.index') }}" class="btn btn-info w-100">Libros</a>
    </li>
    <li class="list-group-item">
      <a href="{{ route('usuario.index') }}" class="btn btn-warning w-100">Usuarios</a>
    </li>
    <li class="list-group-item">
      <a href="{{ route('prestamo.index') }}" class="btn btn-danger w-100">Prestamos</a>
    </li>
  </ul>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>
</html>

