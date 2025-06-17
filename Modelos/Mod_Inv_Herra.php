<?php
class inventario_herramienta{

    /*
    Deben existir: 
    id de la herramienta
    nombre de la herramienta
    tipo de la herramienta
    cantidad de herramientas
    Imagen de la herramienta
    estado de la herramienta
    y quien registro esa herramienta
    */
    private $id_inventario_herramienta;
    private $nombre;
    private $tipo_herramienta;
    private $cantidad;
    private $imagen_herramienta;
    private $estado;
    private $registrado_por;
    private $salida;
    private $fecha_salida;
    private $fecha_entrega;
    private $cant;
    private $pedido_por;

    public function __construct (
        $id_inventario_herramienta_f = NULL,
        $nombre_f = NULL,
        $tipo_herramienta_f = NULL,
        $cantidad_f = NULL,
        $imagen_herramienta_f = NULL,
        $estado_f = NULL,
        $registrado_por_f = NULL,
        $salida_f = NULL,
        $fecha_salida_f = NULL,
        $fecha_entrega_f = NULL,
        $cant_f = NULL,
        $pedido_por_f = NULL
    ){
        $this->id_inventario_herramienta = $id_inventario_herramienta_f;
        $this->nombre = $nombre_f;
        $this->tipo_herramienta = $tipo_herramienta_f;
        $this->cantidad = $cantidad_f;
        $this->imagen_herramienta = $imagen_herramienta_f;
        $this->estado = $estado_f;
        $this->registrado_por = $registrado_por_f;
        $this->salida = $salida_f;
        $this->fecha_salida = $fecha_salida_f;
        $this->fecha_entrega = $fecha_entrega_f;
        $this->cant = $cant_f;
        $this->pedido_por = $pedido_por_f;
    }

    // Método para registrar una nueva herramienta
    public function registrar_inv_h() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL RegistrarInventarioHerramienta(?,?,?,?)");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->bindParam(2, $this->tipo_herramienta);
        $sentencia->bindParam(3, $this->cantidad);
        $sentencia->bindParam(4, $this->imagen_herramienta);
        $r = $sentencia->execute();
        return $r;
    }
    //Metodo para la colsuta General de las herramientas
    public function consultar_general_inv_h() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultaGeneralInventarioH()");
        $sentencia->execute();
        $rcgh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rcgh;
    }
    // Método para consultar una herramienta específica por nombre
    public function consultar_especifica_inv_h() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoInventarioH(?)");
        $sentencia->bindParam(1, $this->nombre);
        $sentencia->execute();
        $rceh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rceh;
    }
    public function consultar_especifica_inv_her() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultarHerramienta(?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->execute();
        $rceh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rceh;
    }
    public function conseguir_imagen() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL CONSEGUIR_IMAGEN(?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->execute();
        $rceh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rceh;
    }
    public function registrar_peticion_herramienta(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL RegistrarDetallesUtiliza(?,?,?,?,?)");
        $sentencia->bindParam(1, $this->registrado_por);
        $sentencia->bindParam(2, $this->id_inventario_herramienta);
        $sentencia->bindParam(3, $this->salida);
        $sentencia->bindParam(4, $this->cantidad);
        $sentencia->bindParam(5, $this->fecha_entrega);
        $rrp = $sentencia->execute();
        return $rrp;
    }
    public function prestadas(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultaFGeneralInventarioH()");
        $sentencia->execute();
        $rrp = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rrp;
    }
    public function prestada(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL FEspecificoInventarioH(?,?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->bindParam(2, $this->pedido_por);
        $sentencia->execute();
        $rrp = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rrp;
    }
    public function consultar_peticion_herramienta(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultarDetallesUtilizaEspecifico(?)");
        $sentencia->bindParam(1, $this->registrado_por);
        $sentencia->bindParam(2, $this->id_inventario_herramienta);
        $sentencia->execute();
        $rceh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rceh;
    }
    public function consultar_peticion_herramientas_general(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultarDetallesUtilizaGeneral(?)");
        $sentencia->bindParam(1, $this->registrado_por);
        $sentencia->execute();
        $rceh = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rceh;
    }
    public  function actualizar_peticion_herramienta(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ActualizarPeticionHerramienta(?,?)");
        $sentencia->bindParam(1, $this->salida);
        $sentencia->bindParam(2, $this->fecha_entrega);
        $sentencia->execute();
        return $sentencia;
    }
    public function guardar(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL GuardarHerramienta(?,?,?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->bindParam(2, $this->pedido_por);
        $sentencia->bindParam(3, $this->fecha_entrega);
        $rap = $sentencia->execute();
        return $rap;
    }
    public function devolver(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL devolver(?,?,?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->bindParam(2, $this->salida);
        $sentencia->bindParam(3, $this->cant);
        $sentencia->execute();
        return $sentencia;
    }
    // Método para actualizar los datos de una herramienta
    public function actualizar_inv_h() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL  ActualizarInventarioHerramienta(?,?,?,?,?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $sentencia->bindParam(2, $this->nombre);
        $sentencia->bindParam(3, $this->tipo_herramienta);
        $sentencia->bindParam(4, $this->cantidad);
        $sentencia->bindParam(5, $this->imagen_herramienta);
        $rah = $sentencia->execute();
        return $rah;
    }
    
    // Método para eliminar una herramienta
    public function eliminar_inv_h() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EliminarInventarioHerramienta(?)");
        $sentencia->bindParam(1, $this->id_inventario_herramienta);
        $reh = $sentencia->execute();
        return $reh;
    }
}
?>
