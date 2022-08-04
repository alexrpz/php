<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (file_exists("archivo.txt")) {
    //Si el archivo existe, cargo las tareas en la variable aTareas
    $strJson = file_get_contents("archivo.txt");
    $aTareas = json_decode($strJson, true);
} else {
    //Si el archivo no existe es porque no hay tareas
    $aTareas = array();
}

if (isset($_GET["id"]) && $_GET["id"] >= 0)  {
    $id = $_GET["id"];
} else {
    $id = "";
}
//$id = isset($_GET["id"]) && $_GET["id"] >= 0 ? $_GET["id"] : "";

if($_POST){
    $prioridad= $_POST["lstPrioridad"];
    $usuario= $_POST["lstUsuario"];
    $estado= $_POST["lstEstado"];
    $titulo= $_POST["txtTitulo"];
    $descripcion= $_POST["txtDescripcion"];
    
    if($id>=0){
        $aTareas[$id]= array(
                    "prioridad"=>$prioridad,
                    "usuario"=>$usuario,
                    "estado"=>$estado,
                    "titulo"=>$titulo,
                    "descripcion"=> $descripcion,
                    "fecha" => $aTareas[$id]["fecha"],
        );
    }else{
        $aTareas[]= array(
                    "prioridad"=>$prioridad,
                    "usuario"=>$usuario,
                    "estado"=>$estado,
                    "titulo"=>$titulo,
                    "descripcion"=> $descripcion,
                    "fecha" => date("d/m/Y"),
    );
    }
    $strJson = json_encode($aTareas);
        
    file_put_contents("archivo.txt", $strJson);
}
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    //eliminar del array aclientes la posicion borrar unset()
    unset($aTareas[$id]);
    //convertir el array en json
    $strJson = json_encode($aTareas);
    //almacenar el json en el archivo
    file_put_contents("archivo.txt", $strJson);
    
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-5">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-4">
                            <label for="lstPrioridad">Prioridad</label>
                            <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                                <option value="" selected disabled >Seleccionar</option>
                                <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas [$id]["prioridad"]== "Alta"? "selected" : "";?>>Alta</option>
                                <option value="Media" <?php echo isset($aTareas[$id]) && $aTareas [$id]["prioridad"]== "Media"? "selected" : "";?>>Media</option>
                                <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas [$id]["prioridad"]== "Baja"? "selected" : "";?>>Baja</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="lstUsuario">Usuario</label>
                            <select name="lstUsuario" id="lstUsuario" class="form-control">
                                <option value="" selected disabled >Seleccionar</option>
                                <option value="Ana" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Ana"? "selected": "";?>>Ana</option>
                                <option value="Bernabe" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Bernabe"? "selected" : "";?>>Bernabé</option>
                                <option value="Daniela" <?php echo isset($aTareas[$id]) && $aTareas [$id]["usuario"]== "Daniela"? "selected" : "";?>>Daniela</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="lstEstado">Estado</label>
                            <select name="lstEstado" id="lstEstado" class="form-control">
                                <option value="" selected disabled >Seleccionar</option>
                                <option value="Sin Asignar" <?php echo isset($aTareas[$id]) && $aTareas [$id]["estado"]== "Sin asignar"? "selected" : "";?>>Sin asignar</option>
                                <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas [$id]["estado"]== "Asignado"? "selected" : "";?>>Asignado</option>
                                <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas [$id]["estado"]== "En proceso"? "selected" : "";?>>En proceso</option>
                                <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas [$id]["estado"]== "Terminado"? "selected" : "";?>>Terminado</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="txtTitulo">Titulo</label>
                            <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" required value="<?php echo isset($aTareas[$id])? $aTareas[$id]["titulo"] :""; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="txtDescripcion">Descripción</label>
                            <textarea name="txtDescripcion" id="txtDescripcion" required class="form-control"><?php echo isset($aTareas[$id])? $aTareas[$id]["descripcion"] :""; ?></textarea>
                        </div>
                    </div>
                    <div class="text-center pt-2 pb-5">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                        <button type="reset" class="btn btn-secondary">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if(count($aTareas)): ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Fecha de inserción</th>
                        <th>Título</th>
                        <th>Prioridad</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php foreach($aTareas as $pos => $tarea):?>
                        <td><?php echo $pos?></td>
                        <td><?php echo $tarea ["fecha"]; ?></td>
                        <td><?php echo $tarea ["titulo"];?></td>
                        <td><?php echo $tarea ["prioridad"];?></td>
                        <td><?php echo $tarea ["usuario"];?></td>
                        <td><?php echo $tarea ["estado"];?></td>
                        <td>
                            <a href="?id=<?php echo $pos; ?>&do=eliminar" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            <a href="?id=<?php echo $pos; ?>&do=editar" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info" role="alert">
                        Aún no se han cargado tareas.
                    </div>
                </div>
            </div>
        <?php endif ; ?>
    </main>
</body>
</html>