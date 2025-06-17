<?php
    class usuario{
        private $id_usuario;
        private $num_doc;
        private $clave;
        private $nombre;
        private $apellido;
        private $correo;
        private $fecha_nac;
        private $direccion;
        private $genero;
        private $telefono;
        private $Estado_cuenta;
        private $rol;
        private $eps;
        private $rh;
        private $tipo_sangre;
        private $Nombre_Empresa;
        private $datos_certi;
        private $datos_expe;
        private $registrado_por;
        public function __construct(
            $id_usuario_f=NULL, 
            $num_doc_f=NULL, 
            $clave_f=NULL, 
            $nombre_f=NULL, 
            $apellido_f=NULL, 
            $correo_f=NULL, 
            $fecha_nac_f=NULL, 
            $direccion_f=NULL, 
            $genero_f=NULL, 
            $telefono_f=NULL, 
            $Estado_cuenta_f=NULL, 
            $rol_f=NULL,  
            $eps_f = NULL, 
            $rh_f = NULL,
            $tipo_sangre_f = NULL, 
            $nombre_Empresa_f = NULL,
            $datos_certi_f = NULL,
            $datos_expe_f = NULL,
            $registrado_por_f = NULL
            ) {
                $this->id_usuario = $id_usuario_f;
                $this->num_doc = $num_doc_f;
                $this->clave = $clave_f;
                $this->nombre = $nombre_f;
                $this->apellido = $apellido_f;
                $this->correo = $correo_f;
                $this->fecha_nac = $fecha_nac_f;
                $this->direccion = $direccion_f;
                $this->genero = $genero_f;
                $this->telefono = $telefono_f;
                $this->Estado_cuenta = $Estado_cuenta_f;
                $this->rol = $rol_f;
                $this->eps = $eps_f;
                $this->rh = $rh_f;
                $this->tipo_sangre = $tipo_sangre_f;
                $this->Nombre_Empresa = $nombre_Empresa_f;
                $this->datos_certi = $datos_certi_f;
                $this->datos_expe = $datos_expe_f;
                $this->registrado_por = $registrado_por_f;             
        }#Esta funcion permite logearse
        public function login() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion -> prepare("CALL LoginUsuario(?,?)");
            $sentencia->bindParam(1, $this->num_doc);
            $sentencia->bindParam(2, $this->clave);
            $sentencia-> execute();
            $rlu = $sentencia->fetchall(PDO:: FETCH_ASSOC);
            return $rlu;
        }#Esta funcion registra un usuario cliente
        public function registrar_usuario_cli() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion -> prepare("CALL RegistrarUsuarioCli(?,?,?,?,?,?,?,?,?)");
            $sentencia -> bindParam(1, $this->num_doc);
            $sentencia -> bindParam(2, $this->clave);
            $sentencia -> bindParam(3, $this->nombre);
            $sentencia -> bindParam(4, $this->apellido);
            $sentencia -> bindParam(5, $this->correo);
            $sentencia -> bindParam(6, $this->fecha_nac);
            $sentencia -> bindParam(7, $this->direccion);
            $sentencia -> bindParam(8, $this->genero);
            $sentencia -> bindParam(9, $this->telefono);
            $rru = $sentencia -> execute();
            return $rru;
        }#Esta funcion registra un usuario Administrador o Opererador
        public function registrar_usuario_admop() {
            // Iniciar una única conexión a la base de datos
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            // Registrar usuario y obtener ID
            $sentencia = $conexion->prepare("CALL RegistrarUsuarioAdmOpe(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sentencia->bindParam(1, $this->num_doc);
            $sentencia->bindParam(2, $this->clave);
            $sentencia->bindParam(3, $this->nombre);
            $sentencia->bindParam(4, $this->apellido);
            $sentencia->bindParam(5, $this->correo);
            $sentencia->bindParam(6, $this->fecha_nac);
            $sentencia->bindParam(7, $this->direccion);
            $sentencia->bindParam(8, $this->genero);
            $sentencia->bindParam(9, $this->telefono);
            $sentencia->bindParam(10, $this->rol);
            $sentencia->bindParam(11, $this->eps);
            $sentencia->bindParam(12, $this->rh);
            $sentencia->bindParam(13, $this->tipo_sangre);
            $sentencia->bindParam(14, $this->registrado_por);
            $rru = $sentencia->execute();
            return $rru;
        }#Este es el registro de las expericias
        public function Registrar_expe(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("call RegistrarExperiencia(?,?,?,?,?,?,?,?)");
            $veces = count($this->datos_expe)/7;
            //var_dump($veces);
            //var_dump($this->datos_expe);
            $pos=1;
            for ($i = 1; $i <= $veces; $i++) {
                // Codigo de quien es la experiencia
                $sentencia->bindParam(1, $this->id_usuario);
                // Nombre empresa
                $sentencia->bindParam(2, $this->datos_expe[$pos]); 
                $pos++;
                //Cargo
                $sentencia->bindParam(3, $this->datos_expe[$pos]);
                $pos++;
                // Fecha de inicio
                $sentencia->bindParam(4, $this->datos_expe[$pos]);
                $pos++;
                // Fecha de fin
                $sentencia->bindParam(5, $this->datos_expe[$pos]);
                $pos++;
                // Observacion 
                $sentencia->bindParam(6, $this->datos_expe[$pos]);
                $pos++;
                // Telefono empresa
                $sentencia->bindParam(7, $this->datos_expe[$pos]);
                $pos++;
                // Nombre contacto
                $sentencia->bindParam(8, $this->datos_expe[$pos]);
                $pos++;
                $rre = $sentencia->execute();
            }
            return $rre;
        }
        public function Registrar_cert(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("call RegistrarCertificado(?,?,?,?,?)");
            $veces = count($this->datos_certi)/4;
            //var_dump($veces);
            //var_dump($this->datos_certi);
            $rre=null;
            $pos=1;
            for ($i = 1; $i <= $veces; $i++) {
                // El id de quien es el certificado
                $sentencia->bindParam(1, $this->id_usuario);
                // Certificado archivo
                $sentencia->bindParam(2, $this->datos_certi[$pos]);
                $pos++;
                // Nombre del certificado
                $sentencia->bindParam(3, $this->datos_certi[$pos]);
                $pos++;
                // Organizacion de origen 
                $sentencia->bindParam(4, $this->datos_certi[$pos]);
                $pos++;
                // Fecha de expedicion
                $sentencia->bindParam(5, $this->datos_certi[$pos]);
                $pos++;
                $rre = $sentencia->execute();
            }
            return $rre;
        }public function todos_operadores() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("CALL todos_operadores()");
            $sentencia -> execute();
            $rcu = $sentencia -> fetchall();
            return $rcu;
        }#Esta es una consulta especifica del usuario
        public function consultar_usuario_general() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("CALL ConsultaGeneralUsuario()");
            $sentencia -> execute();
            $rcu = $sentencia -> fetchall();
            return $rcu;
        }#Esta es una consulta General 
        public function consultar_usuario_especifi(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("CALL EspecificoUsuario(?)");
            $sentencia -> bindParam(1,$this->num_doc);
            $sentencia -> execute();
            $rceu = $sentencia -> fetchAll(PDO::FETCH_ASSOC);
            return $rceu;
        }#Esta es la consulta de una experiencia del usuario
        public function consultar_certificado(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("CALL EspecificoCertificado(?)");
            $sentencia -> bindParam(1,$this->id_usuario);
            $sentencia  -> execute();
            $rcc = $sentencia -> fetchAll(PDO :: FETCH_ASSOC);
            return $rcc;
        }#Esta es la consulta de un certificado del usuario
        public function consultar_experiencia(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("CALL ConsultaGeneralExperiencia(?)");
            $sentencia -> bindParam(1,$this->id_usuario);
            $sentencia  -> execute();
            $rce = $sentencia -> fetchAll(PDO :: FETCH_ASSOC);
            return $rce;
        }#Esta sera una actualizacion de usurio cliente
        public function actualizar_usuario_cliente() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call ActualizarUsuarioCli(?,?,?,?,?,?,?,?,?)");
            $sentencia -> bindParam(1, $this->num_doc);
            $sentencia -> bindParam(2, $this->nombre);
            $sentencia -> bindParam(3, $this->apellido);
            $sentencia -> bindParam(4, $this->correo);
            $sentencia -> bindParam(5, $this->fecha_nac);
            $sentencia -> bindParam(6, $this->direccion);
            $sentencia -> bindParam(7, $this->genero);
            $sentencia -> bindParam(8, $this->telefono);
            $res=$sentencia -> execute();
            return $res;
        }#Esta actualiza a un usuario desde el administrador (adm,ope)
        public function act_usu() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call act_usu(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sentencia -> bindParam(1, $this->id_usuario);
            $sentencia -> bindParam(2, $this->num_doc);
            $sentencia -> bindParam(3, $this->nombre);
            $sentencia -> bindParam(4, $this->apellido);
            $sentencia -> bindParam(5, $this->correo);
            $sentencia -> bindParam(6, $this->fecha_nac);
            $sentencia -> bindParam(7, $this->direccion);
            $sentencia -> bindParam(8, $this->genero);
            $sentencia -> bindParam(9, $this->telefono);
            $sentencia -> bindParam(10, $this->rol); 
            $sentencia -> bindParam(11, $this->eps);
            $sentencia -> bindParam(12, $this->rh);
            $sentencia -> bindParam(13, $this->tipo_sangre);
            $res=$sentencia -> execute();
            return $res;
        }#Esta es la actualizacion de un administrador o un operador
        public function actualizar_usuario_admin_ope() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call ActualizarUsuarioAdmOpe(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sentencia -> bindParam(1, $this->id_usuario);
            $sentencia -> bindParam(2, $this->num_doc);
            $sentencia -> bindParam(3, $this->clave);
            $sentencia -> bindParam(4, $this->nombre);
            $sentencia -> bindParam(5, $this->apellido);
            $sentencia -> bindParam(6, $this->correo);
            $sentencia -> bindParam(7, $this->fecha_nac);
            $sentencia -> bindParam(8, $this->direccion);
            $sentencia -> bindParam(9, $this->genero);
            $sentencia -> bindParam(10, $this->telefono);
            $sentencia -> bindParam(11, $this->rol); 
            $sentencia -> bindParam(12, $this->eps);
            $sentencia -> bindParam(13, $this->rh);
            $sentencia -> bindParam(14, $this->tipo_sangre);
            $res=$sentencia -> execute();
            return $res;
        }#Esta es la actualizacion del certificado
        public function actualizar_expe(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call ActualizarExperiencia(?,?,?,?,?,?,?,?)");
            $veces = count($this->datos_expe)/8;
            for($i=1; $i<=$veces; $i++){
                $sentencia->bindParam(1, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(2, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(3, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(4, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(5, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(6, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(7, $this->datos_expe[$pos]);
                $pos++;
                $sentencia->bindParam(8, $this->id_usuario);
                $pos++;
            }
            $rac = $sentencia -> execute();
            return $rac;
        }#Esta es la actualizacionde la experiencia
        public function actualizar_cert(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call ActualizarCertificado(?,?,?,?,?)");
            $veces = count($this->datos_certi)/5;
            for($pos=1; $pos<=$veces; $pos++){
                $sentencia->bindParam(1, $this->id_usuario);
                $pos++;
                $sentencia->bindParam(2, $this->datos_certi[$pos]);
                $pos++;
                $sentencia->bindParam(3, $this->datos_certi[$pos]);
                $pos++;
                $sentencia->bindParam(4, $this->datos_certi[$pos]);
                $pos++;
                $sentencia->bindParam(5, $this->datos_certi[$pos]);
                $pos++;
            }
            $rac = $sentencia -> execute();
            return $rac;
        }
#Esta es la eliminacion de un usuario
        public function eliminar_usuario() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call EliminarUsuario(?)");
            $sentencia->bindParam(1,$this->num_doc);
            $res=$sentencia -> execute();
            return $res;
        }
        public function eliminar_cert(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call EliminarCertificado(?)");
            $sentencia->bindParam(1,$this->num_doc);
            $rec = $sentencia-> execute();
            return $rec;
        }
        public function eliminar_expe(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call EliminarExperiencia(?)");
            $sentencia->bindParam(1,$this->num_doc);
            $ree = $sentencia-> execute();
            return $ree;
        }
        public function clave(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call ConseguirClave(?)");
            $sentencia->bindParam(1,$this->num_doc);
            $sentencia-> execute();
            $ree = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $ree;
        }
        public function cambiar(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario","root");
            $sentencia = $conexion->prepare("call RecuperarClave(?,?)");
            $sentencia->bindParam(1,$this->clave);
            $sentencia->bindParam(2,$this->num_doc);
            $ree = $sentencia-> execute();
            return $ree;
        }
    }      
?>