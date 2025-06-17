<?php
class venta {

    /*
    in p_Precio int unsigned,
    in p_Descuento tinyint unsigned,
    in p_Fecha_Facturacion date,
    in p_Impuesto int,
    in p_Codigo_Usuario smallint unsigned,
    in p_Codigo_Pedido smallint unsigned
    */
    private $ID_Venta;
    private $Precio;
    private $Descuento;
    private $Fecha_Facturacion;
    private $Impuesto;
    private $cancelacion;
    private $cod_usu;
    private $cod_ped;
    private $num_doc;

    public function __construct(
        $ID_Venta_f = NULL, 
        $Precio_f = NULL, 
        $Descuento_f = NULL, 
        $Fecha_Facturacion_f = NULL, 
        $Impuestos_f = NULL,
        $cancelacion_f = NULL,
        $cod_ped_f = NULL,
        $cod_reg_por_f = NULL,
        $num_doc_f = NULL
    ) {
        $this->ID_Venta = $ID_Venta_f;
        $this->Precio = $Precio_f;
        $this->Descuento = $Descuento_f;
        $this->Fecha_Facturacion = $Fecha_Facturacion_f;
        $this->Impuestos = $Impuestos_f;
        $this->cancelacion = $cancelacion_f;
        $this->cod_ped = $cod_ped_f;
        $this->cod_reg_por = $cod_reg_por_f;
        $this->num_doc = $num_doc_f;
    }

    // Método para registrar una venta
    public function registrar_venta() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL RegistrarVenta(?,?,?,?,?)");
        $sentencia->bindParam(1, $this->Precio);
        $sentencia->bindParam(2, $this->Descuento);
        $sentencia->bindParam(3, $this->Impuestos);
        $sentencia->bindParam(4, $this->cod_reg_por);
        $sentencia->bindParam(5, $this->cod_ped);
        $r = $sentencia->execute();
        return $r;
    }

    // Método para consultar una venta específica por su ID
    public function consultar_general() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ConsultaGeneralVenta()");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    // Método para consultar una venta específica por su ID
    public function consultar_ven_especifico() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoVenta(?)");
        $sentencia->bindParam(1, $this->num_doc);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    public function consultar_ven_especificoA() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL EspecificoVentaA(?)");
        $sentencia->bindParam(1, $this->ID_Venta);
        $sentencia->execute();
        return $sentencia->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar una venta
    public function actualizar_venta() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL ActualizarVenta(?,?,?,?)");
        $sentencia->bindParam(1, $this->ID_Venta);
        $sentencia->bindParam(2, $this->Precio);
        $sentencia->bindParam(3, $this->Descuento);
        $sentencia->bindParam(4, $this->Impuestos);
        $res = $sentencia->execute();
        return $res;
    }

    // Método para eliminar una venta
    public function eliminar() {
        $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
        $sentencia = $conexion->prepare("CALL CancelarVenta(?)");
        $sentencia->bindParam(1, $this->ID_Venta);
        $res = $sentencia->execute();
        return $res;
    }
}
?>