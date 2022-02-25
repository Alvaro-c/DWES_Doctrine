<?php

namespace App\Entity;

use App\Repository\JugadorBidireccionalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JugadorBidireccionalRepository::class)]
class JugadorBidireccional
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private $Apellido;

    #[ORM\Column(type: 'integer')]
    private $Edad;

    /**
    * @ORM\ManyToOne(targetEntity="EquipoBidireccional", inversedBy = "jugadores")
    * @ORM\JoinColumn(name="equipo_id", referencedColumnName="id")
    **/
    private $Equipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): self
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    public function getEdad(): ?int
    {
        return $this->Edad;
    }

    public function setEdad(int $Edad): self
    {
        $this->Edad = $Edad;

        return $this;
    }

    public function getEquipo()
    {
        return $this->Equipo;
    }

    public function setEquipo(int $Equipo): self
    {
        $this->Equipo = $Equipo;

        return $this;
    }


}
