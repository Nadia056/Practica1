<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1 class="text-center">Motocicletas</h1>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Año</th>
                            <th scope="col">Descripcion</th>
                            <th>-</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bikes as $bike)
                        <tr>
                            <th scope="row">{{$bike->id}}</th>
                            <td>{{$bike->nombre}}</td>
                            <td>{{$bike->año}}</td>
                            <td>{{$bike->descripcion}}</td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $bike->id }}">
                                    Editar
                                </button></td>
                            <td class="text-center"><a href="{{ route('delete', $bike->id) }}" class="btn btn-danger">Eliminar</a></td>

                        </tr>
                        @endforeach
                </table>
            </div>
            <div class="col">

            </div>
        </div>
        @foreach($bikes as $bike)
        <div class="modal fade" id="exampleModal{{ $bike->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$bike->nombre}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <input type="hidden" name="id" value="{{$bike->id}}">

                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Motocicleta</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="{{$bike->nombre}}">
                                @error('nombre')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required placeholder="{{$bike->descripcion}}">
                                @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Año</label>
                                <input type="number" class="form-control" id="año" name="año" required placeholder="{{$bike->año}}">
                                @error('año')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <center>

        <a href="{{ route('registro') }}" class="btn btn-danger">Registrar</a>
    </center>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>