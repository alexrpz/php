<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Ventas{
    private $idventa;
    private $cantidad;
    private $fecha;
    private $preciounitario;
    private $total;
    private $fk_idproducto;
    private $fk_idcliente;

    public function __construct()
    {

    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
        return $this;
    }

    public function insertar()
    {
        //Instancia la clase mysqli con el constructor parametrizado
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        //Arma la query
        $sql = "INSERT INTO ventas (
                    total,
                    cantidad,
                    fecha,
                    precio_unitario,
                    fk_idcliente,
                    fk_idtipoproducto
                ) VALUES (
                    '$this->fecha',
                     $this->total,
                     $this->cantidad,
                     $this->precio_unitario,
                    $this->fk_idproducto,
                    $this->fk_idcliente
                );";
        // print_r($sql);exit;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Obtiene el id generado por la inserción
        $this->idcliente = $mysqli->insert_id;
        //Cierra la conexión
        $mysqli->close();
    }
    public function actualizar()
    {

        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "UPDATE ventas SET
                total = $this->total,
                cantidad = $this->cantidad,
                precio_unitario = $this->precio_unitario,
                fecha = '$this->fecha',      
                fk_idproducto =  '$this->fk_idproducto',
                fk_idproducto =  '$this->fk_idcliente' 
                WHERE idventa = $this->idventa";

        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }
    public function eliminar()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "DELETE FROM ventas WHERE idventa = " . $this->idventa;
        //Ejecuta la query
        if (!$mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        $mysqli->close();
    }
    public function obtenerPorId()
    {
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT idventa,
                        precio_unitario,
                        cantidad,
                        total,
                        fecha,
                        fk_idcliente,
                        fk_idtipoproducto
                FROM ventas
                WHERE idventa = $this->idventa";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }
        //Convierte el resultado en un array asociativo
        if ($fila = $resultado->fetch_assoc()) {
            if(isset($fila["fecha"])){
                $this->fecha = $fila["fecha"];
            }else{
                $this->fecha="";
            }
            $this->idventa = $fila["idventa"];
            $this->total = $fila["total"];
            $this->cantidad = $fila["cantidad"];
            $this->precio_unitario = $fila["precio_unitario"];
            $this->fk_idcliente = $fila["fk_idcliente"];
            $this->fk_idproducto = $fila["fk_idproducto"];
        }
        $mysqli->close();
    }
    public function obtenerTodos(){
        $mysqli = new mysqli(Config::BBDD_HOST, Config::BBDD_USUARIO, Config::BBDD_CLAVE, Config::BBDD_NOMBRE, Config::BBDD_PORT);
        $sql = "SELECT 
                    idventa,
                    total,
                    cantidad,
                    precio_unitario,
                    fk_idcliente,
                    fk_idproducto
                FROM ventas";
        if (!$resultado = $mysqli->query($sql)) {
            printf("Error en query: %s\n", $mysqli->error . " " . $sql);
        }

        $aResultado = array();
        if($resultado){
            //Convierte el resultado en un array asociativo

            while($fila = $resultado->fetch_assoc()){
                $entidadAux = new Ventas();
                $entidadAux->idventa = $fila["idventa"];
                if(isset($fila["fecha"])){
                    $entidadAux->fecha=$fila["fecha"];
                }else{
                    $entidadAux->fecha="";
                }
                $entidadAux->total = $fila["total"];
                $entidadAux->cantidad = $fila["cantidad"];
                $entidadAux->precio_unitario = $fila["precio_unitario"];
                $entidadAux->fk_idcliente = $fila["fk_idcliente"];
                $entidadAux->fk_idtipoproducto = $fila["fk_idtipoproducto"];
                $aResultado[] = $entidadAux;
            }
        }
        return $aResultado;
    }
}
?>