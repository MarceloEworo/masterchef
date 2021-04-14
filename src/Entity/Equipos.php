<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Equipos
 *
 * @ORM\Table(name="equipos", indexes={@ORM\Index(name="ID_evento", columns={"ID_evento"})})
 * @ORM\Entity (repositoryClass="App\Repository\EquiposRepository")
 */ 
class Equipos
{
    /**
     * @var string $nombreEquipo
     *
     * @ORM\Column(name="Nombre_equipo", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nombreEquipo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Triptico", type="string", length=1000, nullable=true)
     */
    private $triptico;

    /**
     * @var \Eventos
    
     * @ORM\OneToOne(targetEntity="Eventos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_evento", referencedColumnName="ID_evento")
     * })
     */
    private $idEvento;
    public function setNombreEquipo(?string $nombreEquipo): self
    {
        $this->nombreEquipo = $nombreEquipo;

        return $this;
    }
    public function getNombreEquipo(): ?string
    {
        return $this->nombreEquipo;
    }

    public function getTriptico(): ?string
    {
        return $this->triptico;
    }

    public function setTriptico(?string $triptico): self
    {
        $this->triptico = $triptico;

        return $this;
    }

    public function getIdEvento(): ?Eventos
    {
        return $this->idEvento;
    }

    public function setIdEvento(?Eventos $idEvento): self
    {
        $this->idEvento = $idEvento;

        return $this;
    }

    public function __toString(){
        return $this->getNombreEquipo();
    }

    

}
