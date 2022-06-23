<?php
    class Bitacora{
        private $id;
        private $usuario;
        private $actividad;
        private $hora;
        private $fin;
        private $user_id;

        public function __construct(){
            $this->id=0; 
            $this->usuario="";
            $this->actividad="";
            $this->hora="";
            $this->fin="";
            $this->user_id=0;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function setActividad($actividad){
            $this->actividad = $actividad;
        }

        public function getActividad(){
            return $this->actividad;
        }

        public function setHora($hora){
            $this->hora = $hora;
        }

        public function getHora(){
            return $this->hora;
        }

        public function setFin($fin){
            $this->fin = $fin;
        }

        public function getFin(){
            return $this->fin;
        }

        public function getUser_id(){
            return $this->user_id;
        }

        public function setUser_id($user_id){
            $this->user_id = $user_id;
        }


    }

?>