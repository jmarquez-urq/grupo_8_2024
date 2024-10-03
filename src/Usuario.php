<?php

abstract class Usuario{
    
    protected string $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;

    }

    public function postear(){

    }

    public function getNombre(){
        return $this->nombre;
    }
    
}