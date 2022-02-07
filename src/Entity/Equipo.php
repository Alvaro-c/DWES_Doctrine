<?php
//src/Entity/Equipo.php

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

/*
* @ORM\Table(name="equipo")
* @ORM\Entity(respositoryClass = "EquipoRepository)
*/

class Equipo {
    
    /*
    * @ORM\Id
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    */
    private $Id;

    /*
    * @ORM\Column(type="string", length = 255)
    */
    private $Nombre;

    /*
    * @ORM\Column(type="integer", nullable=false)
    */
    private $Socios;

    /*
    * @ORM\Column(type="string", length = 255)
    */
    private $Fundacion;

    /*
    * @ORM\Column(type="string", length = 255)
    */
    private $Ciudad;



}