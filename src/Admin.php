<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
require_once 'Usuario.php';
#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: "usuario_admin")]
class Admin extends Usuario{

    #[ORM\Id, ORM\Column(type:'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    public function __construct($nombre){
        parent::__construct($nombre);
    }

    #[ORM\OneToMany(targetEntity: Posteo::class, mappedBy: 'admins')]
    private Collection $posteos;
}