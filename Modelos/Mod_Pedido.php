<?php 
    // Modelo para el pedido
    /*
    Debe estar:
    El ide del pedido
    las especificaciones del pedido
    el abono del pedido
    la fecha de solicitud
    la fecha de entrega
    el estado
    y la persona
    */
    class pedido {
    private $ID_Pedido;
    private $Especificaciones;
    private $Abono;
    private $Fecha_Solicitud;
    private $Fecha_Entrega;
    private $estado;
    private $persona;
    private $id_producto;
    private $id_venta;
    private $cantidad;
    private $espe1;
    private $espe2;
    private $espe3;
    private $espe4;
    private $espe5;
    private $espe6;
    private $espe7;
    private $espe8;
    private $espe9;
    private $espe10;
    private $nom_pro;
    private $num_doc;

    public function __construct(
        $ID_Pedido_f = NULL, 
        $Especificaciones_f = NULL, 
        $Abono_f = NULL, 
        $Fecha_Solicitud_f = NULL,
        $Fecha_Entrega_f = NULL, 
        $persona_f = NULL,
        $id_producto_f = NULL,
        $id_venta_f = NULL,
        $cantidad_f =NULL,
        $espe1_f = NULL,
        $espe2_f = NULL,
        $espe3_f = NULL,
        $espe4_f = NULL,
        $espe5_f = NULL,
        $espe6_f = NULL,
        $espe7_f = NULL,
        $espe8_f = NULL,
        $espe9_f = NULL,
        $espe10_f = NULL,
        $nom_pro_f = NULL,
        $num_doc_f = NULL
        ) {
        $this->ID_Pedido = $ID_Pedido_f;
        $this->Especificaciones = $Especificaciones_f;
        $this->Abono = $Abono_f;
        $this->Fecha_Solicitud = $Fecha_Solicitud_f;
        $this->Fecha_Entrega = $Fecha_Entrega_f;
        $this->persona = $persona_f;
        $this->id_producto = $id_producto_f;
        $this->id_venta = $id_venta_f;
        $this->cantidad = $cantidad_f;
        $this->espe1 =  $espe1_f;
        $this->espe2 =  $espe2_f;
        $this->espe3 =  $espe3_f;
        $this->espe4 =  $espe4_f;
        $this->espe5 =  $espe5_f;
        $this->espe6 =  $espe6_f;
        $this->espe7=  $espe7_f;
        $this->espe8 =  $espe8_f;
        $this->espe9 =  $espe9_f;
        $this->espe10 =  $espe10_f;
        $this->nom_pro = $nom_pro_f;
        $this->num_doc = $num_doc_f;
    }

    // Método para registrar un pedido
    public function registrar_pedido() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL RegistrarPedido(?,?,?,?)");
        $sentencia->bindParam(1, $this->Especificaciones);
        $sentencia->bindParam(2, $this->Abono);
        $sentencia->bindParam(3, $this->Fecha_Entrega);
        $sentencia->bindParam(4, $this->persona);
        $r = $sentencia->execute();
        return $r;
    }
    public function registrar_detalles_genera(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL RegistrarDetallesGenera(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sentencia->bindParam(1, $this->ID_Pedido);
        $sentencia->bindParam(2, $this->id_producto);
        $sentencia->bindParam(3, $this->cantidad);
        $rrd = $sentencia->execute();
        return $rrd;
    }
    // Metodo para la consulta general de un pedido
    public function consultar_id() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoPedidoID(?)");
        $sentencia->bindParam(1, $this->ID_Pedido);
        $sentencia->execute();
        $rid = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $rid;
    }

    public function consultar_pedido() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultaGeneralPedido()");
        $sentencia->execute();
        $rcgp = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $rcgp;
    }

    public function consultar_detalles_genera(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultaDetallesGenera(?)");
        $sentencia->bindParam(1, $this->nom_pro);
        $rcdg = $sentencia->fetchALL(PDO::FETCH_ASSOC);
        return $rcdg; 
    }
    // Método para consultar un pedido específico por su nombre
    public function consultar_ped_especifico() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoPedido(?)");
        $sentencia->bindParam(1, $this->num_doc);
        $sentencia->execute();
        $rcep  = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        return $rcep;
    }
    // Método para consultar un pedido específico por su nombre
    public function consultar_ped_especificoA() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoPedidoA(?)");
        $sentencia->bindParam(1, $this->ID_Pedido);
        $sentencia->execute();
        $rcep  = $sentencia->fetch(PDO::FETCH_ASSOC);
        return $rcep;
    }
    // Método para actualizar un pedido
    public function actualizar() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ActualizarPedido(?,?,?,?)");
        $sentencia->bindParam(1, $this->ID_Pedido);
        $sentencia->bindParam(2, $this->Especificaciones);
        $sentencia->bindParam(3, $this->Abono);
        $sentencia->bindParam(4, $this->Fecha_Entrega);
        $res = $sentencia->execute();
        return $res;
    }
    
    public function actualizar_detalles_genera(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepaare("CALL  ActualizarDetallesGenera(?,?,?,?,?,?,?,?,?,?,?)");
        $sentencia->bindParam(1, $this->cantidad);
        $sentencia->bindParam(2, $this->espe1);
        $sentencia->bindParam(3, $this->espe2);
        $sentencia->bindParam(4, $this->espe3);
        $sentencia->bindParam(5, $this->espe4);
        $sentencia->bindParam(6, $this->espe5);
        $sentencia->bindParam(7, $this->espe6);
        $sentencia->bindParam(8, $this->espe7);
        $sentencia->bindParam(9, $this->espe8);
        $sentencia->bindParam(10, $this->espe9);
        $sentencia->bindParam(11, $this->espe10);
        $res = $sentencia->execute();
        return $res;
    }
    // Método para eliminar un pedido
    public function eliminar() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EliminarPedido(?)");
        $sentencia->bindParam(1, $this->ID_Pedido);
        $res = $sentencia->execute();
        return $res;
    }
    
    public function eliminar_detalles_genera(){
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prapare("CALL  EliminarDetallesGenera(?,?)");
        $sentencia->bindParam(1, $this->nom_pro);
        $sentencia->bindParam(2, $this->persona);
        $res = $sentencia->execute();
        return $res;
    }
}
?>