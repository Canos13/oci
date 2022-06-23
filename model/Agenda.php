<?php

    class Agenda{

        private $id;
        private $nombre;
        private $fecha;
        private $motivo;
        private $user_id;

        public function __construct(){
            $this->id = 0;
            $this->nombre = "";
            $this->fecha = "";
            $this->motivo = "";
            $this->user_id = 0;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setMotivo($motivo){
            $this->motivo = $motivo;
        }

        public function getMotivo(){
            return $this->motivo;
        }

        public function setUser_id($user_id){
            $this->user_id = $user_id;
        }

        public function getUser_id(){
            return $this->user_id;
        }

    }

?>