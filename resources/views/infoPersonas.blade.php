<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <h2 class="text-center">Informacion</h1>
    <div class="container">
      <div class="row">
        <div class="col">

        </div>
        <div class="col">
          <table class="table table-striped">
            <thead>
              <tr class="text-center">

                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Motocicleta</th>
                <th>-</th>
                <th>-</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($personas as $personas)

              <tr>

                <td>{{$personas->nombre}}</td>
                <td>{{$personas->apellido}}</td>
                <td>{{$personas->email}}</td>
                @foreach($bikes as $item)

                @if($personas->bike_id==$item->id)
                <td>{{$item->nombre}}</td>
                @endif
                @endforeach
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$personas->id}}">
                    Editar
                  </button></td>
                <td class="text-center"><a href="{{ route('deletePer', $personas->id) }}" class="btn btn-danger">Eliminar</a></td>

              </tr>
              <div class="modal fade" id="exampleModal{{$personas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">{{$personas->nombre}}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST">
                        <input type="hidden" name="id" value="{{$personas->id}}">

                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="{{$personas->nombre}}">
                          @error('nombre')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Apellido</label>
                          <input type="text" class="form-control" id="apellido" name="apellido" required placeholder="{{$personas->apellido}}">
                          @error('apellido')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Email</label>
                          <input type="email" class="form-control" id="año" name="email" required placeholder="{{$personas->email}}">
                          @error('email')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                        <label for="exampleInputPassword1" class="form-label">Seleccione Bike</label>

                        <select class="form-control" name="bike_id" required>
                          @foreach($bikes as $item)
                          
                          <option value="{{ $item->id }}" {{ ( $item->id == 'id') ? 'selected' : '' }}> {{ $item->nombre }} </option>
                          @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </form>
                    </div>

                  </div>
                </div>
              </div>

              @endforeach
          </table>
        </div>
        <div class="col">

        </div>
      </div>
    </div>
    <center>

      <a href="{{ route('personas') }}" class="btn btn-danger">Registrar</a>
    </center>


    <!-- Button trigger modal -->


    <!-- Modal -->








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>