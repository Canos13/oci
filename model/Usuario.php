<?php
    class Usuario{
        private $id;
        private $username;
        private $pass;
        private $rol;

        public function __construct(){
            $this->id=0;
            $this->username="";
            $this->pass="";
            $this->rol="";
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }

        public function getPass(){
            return $this->pass;
        }

        public function setRol($rol){
            $this->rol = $rol;
        }

        public function getRol(){
            return $this->rol;
        }

    }

?>