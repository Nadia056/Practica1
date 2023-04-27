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
    <h2 class="text-center">Registro Motocicletas</h2>
    <br>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Motocicleta</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        @error('nombre')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        @error('descripcion')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Año</label>
                        <input type="number" class="form-control" id="año" name="año" required>
                        @error('año')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                     <a href="{{ route('info') }}" class="btn btn-danger">Motocicletas</a>
                    <a href="{{ route('personas') }}" class="btn btn-warning">Registrar Personas</a> 

                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>