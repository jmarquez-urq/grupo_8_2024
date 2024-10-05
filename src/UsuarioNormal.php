<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Usuario.php';
#[ORM\Entity(repositoryClass: UsuarioNormalRepository::class)]
#[ORM\Table(name: "usuario_normal")]
class UsuarioNormal extends Usuario{
    #[ORM\Column(type: 'string')]
    protected string $contraseña;

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    public function __construct($nombre,$contraseña){
        parent::__construct($nombre);
        $this->contraseña = $contraseña;
    }
    
    #[ORM\OneToMany(targetEntity: Posteo::class, mappedBy: 'usuarios')]
    private Collection $posteos;
    

    private function getPassword(){
        return $this->contraseña;
    }
}