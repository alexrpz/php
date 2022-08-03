<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Preguntar si existe el archivo
if(file_exists("archivo.txt")){
    //Vamos a leerlo y almacenamos el contenido en jsonClientes
    $jsonClientes = file_get_contents("archivo.txt");

    //Convertir jsonClientes en un array llamado aClientes
    $aClientes = json_decode($jsonClientes, true);

} else {
//Si no existe el archivo
    //Creamos un aClientes inicializado como un array vació
    $aClientes = array();
}

$pos = isset($_GET["pos"]) && $_GET["pos"] >= 0 ? $_GET["pos"] : "";
if($_POST){
    $dni= trim($_POST["txtDni"]);
    $nombre= trim($_POST["txtNombre"]);
    $telefono= trim($_POST["txtTelefono"]);
    $correo= trim($_POST["txtCorreo"]);
    $nombreImagen="";

    if($pos>=0){
        if($_FILES["archivo1"]["error"] === UPLOAD_ERR_OK){
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo1"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo1"]["name"], PATHINFO_EXTENSION));
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
        //eliminar la imagen anterior
        if($aClientes[$pos]["imagen"] != "" && file_exists("imagenes/".$aClientes[$pos]["imagen"])){
            unlink("imagenes/".$aClientes[$pos]["imagen"]);
        }
    }else{
        //mantener el nombreImagen que teniamos antes
        $nombreImagen = $aClientes[$pos]["imagen"];
    }
    //Actualizar
    $aClientes[$pos] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo,
                        "imagen"=> $nombreImagen);

    }else{
    if($_FILES["archivo1"]["error"] === UPLOAD_ERR_OK){
        $nombreAleatorio = date("Ymdhmsi");
        $archivo_tmp = $_FILES["archivo1"]["tmp_name"];
        $extension = strtolower(pathinfo($_FILES["archivo1"]["name"], PATHINFO_EXTENSION));
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "png") {
            $nombreImagen = "$nombreAleatorio.$extension";
            move_uploaded_file($archivo_tmp, "imagenes/$nombreImagen");
        }
    }
    //Insertar
    $aClientes[] = array("dni" => $dni,
                        "nombre" => $nombre,
                        "telefono" => $telefono,
                        "correo" => $correo,
                        "imagen"=> $nombreImagen);
                                                
    }
    $jsonClientes = json_encode($aClientes);
        
    file_put_contents("archivo.txt", $jsonClientes);

    }

    if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
        //eliminar del array aclientes la posicion borrar unset()
        unset($aClientes[$pos]);
        //convertir el array en json
        $jsonClientes = json_encode($aClientes);
        //almacenar el json en el archivo
        file_put_contents("archivo.txt", $jsonClientes);
        
        header("Location: index.php");
    }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abmclientes</title>
<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Registro de clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="pb-2">
                        <label for="txtDni">DNI:*</label>
                        <input type="text" name="txtDni" id="txtDni" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["dni"]:""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="txtNombre">Nombre:*</label>
                        <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["nombre"]:""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="txtTelefono">Teléfono:</label>
                        <input type="tel" name="txtTelefono" id="txtTelefono" class="form-control" value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["telefono"]:""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="txtCorreo">Correo:*</label>
                        <input type="email" name="txtCorreo" id="txtCorreo" class="form-control" required value="<?php echo isset($aClientes[$pos])? $aClientes[$pos]["correo"]:""; ?>">
                    </div>
                    <div class="pb-2">
                        <label for="txtArchivoAdjunto">Archivo adjunto:</label>
                        <input type="file" name="archivo1" id="archivo1" accept=".jpg, .png, .jpeg">
                        <small class="d-block">Archivos admitidos: .jpg, .png, .jpeg</small>
                    </div>
                    <div> 
                            <button class="btn btn-primary" type="submit">Guardar</button>              
                           <a href="index.php" class="btn btn-danger" type="submit">Nuevo</a>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <table class="table table-hover shadow border">
                        <tr>
                            <th>Imagen</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                        <?php foreach($aClientes as $pos => $cliente): ?>
                        <tr>
                            <td>
                                <?php if($cliente["imagen"] !=""): ?>
                                <img src="imagenes/<?php echo $cliente["imagen"]; ?>" class="img-thumbnail">
                                <?php endif; ?>
                            </td>
                            <td><?php echo $cliente["dni"]; ?></td>
                            <td><?php echo $cliente["nombre"]; ?></td>
                            <td><?php echo $cliente["telefono"]; ?></td>
                            <td><?php echo $cliente["correo"]; ?></td>
                            <td>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=eliminar"><i class="bi bi-trash"></i></a>
                                <a href="index.php?pos=<?php echo $pos; ?>&do=editar"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </table>    
            </div>
        </div>
    </main>
</body>
</html>