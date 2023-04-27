<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Bike's</title>
</head>

<body>
  <br>
  <h2 class="text-center">Registro de Personas</h2>
  <br>
  <div class="container">

    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <form method="POST">
          @csrf
          <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
            @error('nombre')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="nombre" name="apellido" required>
            @error('apellido')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" class="form-control" id="descripcion" name="email" required>
            @error('email')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
          </div>
          <label for="exampleInputPassword1" class="form-label">Seleccione Bike</label>

          <select class="form-control" name="bike_id" required>

            <option>...</option>

            @foreach ($bikes as $item)

            <option value="{{ $item->id }}" {{ ( $item->id == 'id') ? 'selected' : '' }}> {{ $item->nombre }} </option>
            @endforeach
          </select>
          <br>
          <button type="submit" class="btn btn-primary">Enviar</button>
          <a href="{{ route('info2'), }}" class="btn btn-danger">Personas Info</a>
          <a href="{{ route('registro') }}" class="btn btn-warning">Registrar Bike's</a>
          @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
          @endif

        </form>
      </div>
      <div class="col">

      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>