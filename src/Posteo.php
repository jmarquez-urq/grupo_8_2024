<?php
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: PosteoRepository::class)]
#[ORM\Table(name: "posteos")]

class Posteo{
    
    #[ORM\Column(type: 'string')]
    protected string $contenido;

    

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    public function __construct($contenido) {
        $this->contenido = $contenido;

    }

    #[ORM\ManyToOne(targetEntity: UsuarioNormal::class, inversedBy: 'posteos')]
    private Collection $usuarios;

    #[ORM\ManyToOne(targetEntity: Admin::class, inversedBy: 'posteos')]
    private Collection $admins;

    public function getContenido(){
        return $this->contenido;
    }

    
}