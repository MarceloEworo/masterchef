<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Valoraciones
 *
 * @ORM\Table(name="valoraciones", indexes={@ORM\Index(name="Nombre_equipo", columns={"Nombre_equipo"}), @ORM\Index(name="ID_evento", columns={"ID_evento"}), @ORM\Index(name="ID_juez", columns={"ID_juez"})})
 * @ORM\Entity (repositoryClass="App\Repository\ValoracionesRepository")
 */
class Valoraciones
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_valoraciones", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idValoraciones;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Presentacion", type="integer", nullable=true)
     */
    private $presentacion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Servicio", type="integer", nullable=true)
     */
    private $servicio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Sabor", type="integer", nullable=true)
     */
    private $sabor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Imagen", type="integer", nullable=true)
     */
    private $imagen;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Triptico", type="integer", nullable=true)
     */
    private $triptico;

    /**
     * @var \Jueces
     *
     * @ORM\ManyToOne(targetEntity="Jueces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_juez", referencedColumnName="ID_juez")
     * })
     */
    private $idJuez;

    /**
     * @var \Equipos
     *
     * @ORM\ManyToOne(targetEntity="Equipos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Nombre_equipo", referencedColumnName="Nombre_equipo")
     * 
     * })
     */
    private $nombreEquipo;

    /**
     * @var \Eventos
     *
     * @ORM\ManyToOne(targetEntity="Eventos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_evento", referencedColumnName="ID_evento")
     * })
     */
    private $idEvento;

    public function getIdValoraciones(): ?int
    {
        return $this->idValoraciones;
    }

    public function getPresentacion(): ?int
    {
        return $this->presentacion;
    }

    public function setPresentacion(?int $presentacion): self
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    public function getServicio(): ?int
    {
        return $this->servicio;
    }

    public function setServicio(?int $servicio): self
    {
        $this->servicio = $servicio;

        return $this;
    }

    public function getSabor(): ?int
    {
        return $this->sabor;
    }

    public function setSabor(?int $sabor): self
    {
        $this->sabor = $sabor;

        return $this;
    }

    public function getImagen(): ?int
    {
        return $this->imagen;
    }

    public function setImagen(?int $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getTriptico(): ?int
    {
        return $this->triptico;
    }

    public function setTriptico(?int $triptico): self
    {
        $this->triptico = $triptico;

        return $this;
    }

    public function getIdJuez(): ?Jueces
    {
        return $this->idJuez;
    }

    public function setIdJuez(?Jueces $idJuez): self
    {
        $this->idJuez = $idJuez;

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
