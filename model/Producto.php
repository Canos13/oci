<?php

    class Producto{
        private $id;
        private $nombre;
        private $marca;
        private $preio;
        private $cantidad;
        private $caract;

        public function __construct(){
            $this->id=0;
            $this->nombre="";
            $this->marca="";
            $this->precio=0;
            $this->cantidad=0;
            $this->caract="";
        }

        public function setId($id){
            $this->id=$id;
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

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
        }

        public function getPrecio(){
            return $this->precio;
        }

        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }

        public function getCantidad(){
            return $this->cantidad;
        }

        public function setCaract($caract){
            $this->caract = $caract;
        }

        public function getCaract(){
            return $this->caract;
        }
    }

?>