<?php

namespace App\Entity;

use App\Repository\EquipoBidireccionalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipoBidireccionalRepository::class)]
class EquipoBidireccional
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nombre;

    #[ORM\Column(type: 'integer')]
    private $Socios;

    #[ORM\Column(type: 'integer')]
    private $Fundacion;

    #[ORM\Column(type: 'string', length: 255)]
    private $Ciudad;

    #[ORM\Column(type: 'integer')]
    private $codLiga;

    /**
    * @ORM\OneToMany(targetEntity="JugadorBidireccional", mappedBy="equipo")
    */
    private $jugadores;

    public function __construct() {
        $this->jugadores = new ArrayCollection();
    }
        

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

    public function getSocios(): ?int
    {
        return $this->Socios;
    }

    public function setSocios(int $Socios): self
    {
        $this->Socios = $Socios;

        return $this;
    }

    public function getFundacion(): ?string
    {
        return $this->Fundacion;
    }

    public function setFundacion(string $Fundacion): self
    {
        $this->Fundacion = $Fundacion;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->Ciudad;
    }

    public function setCiudad(string $Ciudad): self
    {
        $this->Ciudad = $Ciudad;

        return $this;
    }

    public function getCodLiga(): ?int
    {
        return $this->codLiga;
    }

    public function setCodLiga(int $codLiga): self
    {
        $this->codLiga = $codLiga;

        return $this;
    }

    public function getJugadores()
    {
        return $this->jugadores;
    }

}
