<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Forman
 *
 * @ORM\Table(name="forman", indexes={@ORM\Index(name="ID_concursante", columns={"ID_concursante"}), @ORM\Index(name="ID_evento", columns={"ID_evento"}), @ORM\Index(name="IDX_23D88BA5BA1609E8", columns={"Nombre_equipo"})})
 * @ORM\Entity (repositoryClass="App\Repository\FormanRepository")
 */
class Forman
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="Rol", type="string", length=20, nullable=true)
     */
    private $rol;

    /**
     * @var \Equipos
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Equipos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Nombre_equipo", referencedColumnName="Nombre_equipo")
     * })
     */
    private $nombreEquipo;

    /**
     * @var \Concursantes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Concursantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_concursante", referencedColumnName="ID_concursante")
     * })
     */
    private $idConcursante;

    /**
     * @var \Eventos
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Eventos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_evento", referencedColumnName="ID_evento")
     * })
     */
    private $idEvento;

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(?string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getNombreEquipo(): ?Equipos
    {
        return $this->nombreEquipo;
    }

    public function setNombreEquipo(?Equipos $nombreEquipo): self
    {
        $this->nombreEquipo = $nombreEquipo;

        return $this;
    }

    public function getIdConcursante(): ?Concursantes
    {
        return $this->idConcursante;
    }

    public function setIdConcursante(?Concursantes $idConcursante): self
    {
        $this->idConcursante = $idConcursante;

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


}
