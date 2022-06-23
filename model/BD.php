<?php
    class BD{
        private $sql;

        public function __construct(){
            $this->sql = new mysqli("localhost","root","","inv");
           /*  $this->sql = new mysqli("by3tkwb22zo3nffnstse-mysql.services.clever-cloud.com","uuxbcszkci1q50hq","HSWqLkRqGOKKTrC47Gj5","by3tkwb22zo3nffnstse"); */
        }

        public function insertarUsuario($usuario,$con,$rol){
            $consulta="INSERT INTO usuarios (usuario,contrasena, rol) VALUES  ('$usuario', '$con', '$rol')";
            $this->sql->query($consulta);
        }   
        

        public function verifyPASS($Usuario, $password){
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$Usuario' AND contrasena = '$password'";
            $resultado = $this->sql->query($consulta);

            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $UsuarioBD = new Usuario();
                    $UsuarioBD->setId($row['id']);
                    $UsuarioBD->setUsername($row['usuario']);
                    $UsuarioBD->setPass($row['contrasena']);
                    $UsuarioBD->setRol($row['rol']);
                    return $UsuarioBD;
                }
            } else {
                    return false;
            }
        }

        public function consultarROl($Usuario){
            $consulta = "SELECT * FROM usuarios WHERE usuario = '$Usuario'";
            $resultado = $this->sql->query($consulta);

            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $UsuarioBD = new Usuario($row['usuario'], $row['contrasena'], $row['rol']);
                    $UsuarioBD->setId($row['id']);
                    return $UsuarioBD;
                }
            } else {
                    return false;
            }
        }

        public function horaSalida($horaSalida, $entrada){
            $consulta = "UPDATE actividad SET fin='$horaSalida' WHERE hora = '$entrada'";
            $this->sql->query($consulta);
        }

        public function consultarActividad(){
            $acts = array();
            $consulta = "SELECT * FROM actividad";
            $resultado = $this->sql->query($consulta);
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $actividad = new Bitacora();
                    $actividad->setId($row['id']);
                    $actividad->setUsuario($row['usuario']);
                    $actividad->setActividad($row['actividad']);
                    $actividad->setHora($row['hora']);
                    $actividad->setFin($row['fin']);
                    array_push($acts, $actividad);
                }
                return $acts;
            } else {
                    return false;
            }
        }

        public function consultarActividadId($id){
            $acts = array();
            $consulta = "SELECT * FROM actividad WHERE user_id=$id";
            $resultado = $this->sql->query($consulta);
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $actividad = new Bitacora();
                    $actividad->setId($row['id']);
                    $actividad->setUsuario($row['usuario']);
                    $actividad->setActividad($row['actividad']);
                    $actividad->setHora($row['hora']);
                    $actividad->setFin($row['fin']);
                    $actividad->setUser_id($row['user_id']);
                    array_push($acts, $actividad);
                }
                return $acts;
            } else {
                    return false;
            }
        }

        public function registrarAct($usuario, $actividad, $hora, $user_id){
            $consulta = "INSERT INTO actividad (usuario, actividad, hora, user_id) values ('$usuario', '$actividad', '$hora', $user_id)";
            $this->sql->query($consulta);
        }

        public function insertarProducto($nombre, $marcar, $precio, $cantidad, $caract){
            $consulta = "INSERT INTO producto (nombre, marcar, precio, cantidad, caract) values ('$nombre', '$marcar', $precio, $cantidad, '$caract')";
            $this->sql->query($consulta);
            return true;
        }

        public function consultarProducto(){
            $consulta = "SELECT * FROM producto";
            $resultado = $this->sql->query($consulta);
            $productos = array();
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $producto = new Producto();
                    $producto->setId($row['id']);
                    $producto->setNombre($row['nombre']);
                    $producto->setMarca($row['marcar']);
                    $producto->setPrecio($row['precio']);
                    $producto->setCantidad($row['cantidad']);
                    $producto->setCaract($row['caract']);
                    array_push($productos, $producto);
                } 
                return $productos;
            } else {
                return false;
            }
        }

        public function deleteProduct($id){
            $consulta = "DELETE FROM producto WHERE id=$id";
            $this->sql->query($consulta);
        }

        public function getProductById($id){
            $consulta = "SELECT * FROM producto WHERE id = $id";
            $resultado = $this->sql->query($consulta);
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $ProductoBD = new Producto();
                    $ProductoBD->setId($row['id']);
                    $ProductoBD->setNombre($row['nombre']);
                    $ProductoBD->setMarca($row['marcar']);
                    $ProductoBD->setPrecio($row['precio']);
                    $ProductoBD->setCantidad($row['cantidad']);
                    $ProductoBD->setCaract($row['caract']);
                }
                return $ProductoBD;
            } else {
                    return false;
            }
        }

        public function actualizarProducto($id, $nombre, $marca, $precio, $cantidad, $carac){
            $consulta = "UPDATE producto SET nombre='$nombre', marcar='$marca', precio=$precio, cantidad=$cantidad, caract='$carac' WHERE id=$id";
            $this->sql->query($consulta);
        }

        public function insertarCita($nombre, $fecha, $motivo, $user_id){
            $consulta = "INSERT INTO agenda (nombre, fecha, motivo, user_id) VALUES('$nombre','$fecha', '$motivo', $user_id)";
            $this->sql->query($consulta);
            return $consulta;
        }

        public function obtenerAgendasUsuario($user_id){
            $consulta = "SELECT * FROM agenda WHERE user_id = $user_id";
            $resultado = $this->sql->query($consulta);
            $citas = array();
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $citaBD = new Agenda();
                    $citaBD->setId($row['id']);
                    $citaBD->setNombre($row['nombre']);
                    $citaBD->setFecha($row['fecha']);
                    $citaBD->setMotivo($row['motivo']);
                    $citaBD->setUser_id($row['user_id']);
                    array_push($citas, $citaBD);
                }
                return $citas;
            } else {
                    return false;
            }
        }

        public function obtenerAgendas(){
            $consulta = "SELECT * FROM agenda";
            $resultado = $this->sql->query($consulta);
            $citas = array();
            if($resultado){
                while($row = $resultado->fetch_assoc()){
                    $citaBD = new Agenda();
                    $citaBD->setId($row['id']);
                    $citaBD->setNombre($row['nombre']);
                    $citaBD->setFecha($row['fecha']);
                    $citaBD->setMotivo($row['motivo']);
                    $citaBD->setUser_id($row['user_id']);
                    array_push($citas, $citaBD);
                }
                return $citas;
            } else {
                    return false;
            }
        }
        
    } 
?>