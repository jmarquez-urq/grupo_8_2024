<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Usuario.php';
#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: "usuario_admin")]
class Admin extends Usuario{

    #[ORM\OneToMany(targetEntity: Posteo::class, mappedBy: 'admins')]
    private Collection $posteos;

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    protected int|null $id = null;

    public function __construct($nombre){
        parent::__construct($nombre);
    }

    public function getPosteos(){
        return $this->posteos;
    }
}