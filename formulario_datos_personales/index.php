<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Formulario de datos personales</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="resultado.php" method="POST">
                    <div class="pb-3">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtTel">Teléfono:*</label>
                        <input type="text" name="txtTel" id="txtTel" class="form-control">
                    </div>
                    <div class="pb-3">
                        <label for="txtEdad">Edad:*</label>
                        <input type="number" name="txtEdad" id="txtEdad" class="form-control">
                    </div>
                    <div>
                        <button class="btn btn-primary float-end" type="submit">ENVIAR</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>