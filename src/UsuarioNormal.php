<?php
require_once 'Usuario.php';

class UsuarioNormal extends Usuario{
    
    public function __construct($nombre){
        parent::__construct($nombre);
    }
    
}