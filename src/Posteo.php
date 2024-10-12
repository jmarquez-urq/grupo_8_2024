<?php
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: PosteoRepository::class)]
#[ORM\Table(name: "posteos")]

class Posteo{
    
    #[ORM\Column(type: 'string')]
    protected string $contenido;
    
    #[ORM\ManyToOne(targetEntity: UsuarioNormal::class, inversedBy: 'posteos')]
    private UsuarioNormal|null $usuarios = null;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'posteos')]
    private Admin|null $admins = null;

    

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    public function __construct($contenido) {
        $this->contenido = $contenido;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsuarios(){
        return $this->usuarios;
    }

    public function setUsuario(Usuario $u)
    {
        $this->usuarios = $u;
    }

    public function getAdmins(){
        return $this->admins;
    }

    public function setAdmin(Admin $a)
    {
        $this->admins = $a;
    }


    public function getContenido(){
        return $this->contenido;
    }

    
}