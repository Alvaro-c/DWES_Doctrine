<?php

//src/Entity/Jugador.php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Length;

#[ORM\Table(name:"jugador")]
#[ORM\Entity(repositoryClass: "JugadorRepository")]



class Jugador {

    
    #[ORM\Id]
    #[ORM\Column(type:"integer")]
    #[ORM\GeneratedValue]
    private $Id; 

    #[ORM\Column(type:"string", length : 255)]
    private $Nombre; 

    #[ORM\Column(type:"string", length : 255)]
    private $Apellidos; 
    
    #[ORM\Column(type:"integer")]
    private $Edad; 
    
    #[ORM\Column(type:"integer")]
    private $Equipo;





}