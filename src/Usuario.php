<?php
use Doctrine\ORM\Mapping as ORM;

#[ORM\MappedSuperclass]
abstract class Usuario{
    
    #[ORM\Column(type: 'string')]
    protected string $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;

    }

    public function postear(){

    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    
}