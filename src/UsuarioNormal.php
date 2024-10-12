<?php
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Usuario.php';
#[ORM\Entity(repositoryClass: UsuarioNormalRepository::class)]
#[ORM\Table(name: "usuario_normal")]
class UsuarioNormal extends Usuario{
    #[ORM\Column(type: 'string')]
    protected string $contraseña;

    #[ORM\OneToMany(targetEntity: Posteo::class, mappedBy: 'usuarios')]
    private Collection $posteos;

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    protected int|null $id = null;

    public function __construct($nombre,$contraseña){
        parent::__construct($nombre);
        $this->contraseña = $contraseña;
    }
    
    public function getPosteos(){
        return $this->posteos;
    }

    private function getPassword(){
        return $this->contraseña;
    }
}