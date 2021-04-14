<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Eventos
 *
 * @ORM\Table(name="eventos")
 * @ORM\Entity (repositoryClass="App\Repository\EventosRepository")
 */
class Eventos
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_evento", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvento;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre_evento", type="string", length=200, nullable=false)
     */
    private $nombreEvento;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="hora", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="Estado", type="string", length=20, nullable=false)
     */
    private $estado;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Descripcion", type="string", length=1000, nullable=true)
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lugar", type="string", length=200, nullable=true)
     */
    private $lugar;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Jueces", mappedBy="idEvento")
     */
    private $idJuez;

    /**
     * Constructor
     */


    public function __construct()
    {
        $this->idJuez = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdEvento(): ?int
    {
        return $this->idEvento;
    }

    public function getNombreEvento(): ?string
    {
        return $this->nombreEvento;
    }

    public function setNombreEvento(string $nombreEvento): self
    {
        $this->nombreEvento = $nombreEvento;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(?\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(?\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(?string $lugar): self
    {
        $this->lugar = $lugar;

        return $this;
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

    /**
     * @return Collection|Jueces[]
     */
    public function getIdJuez(): Collection
    {
        return $this->idJuez;
    }

    public function addIdJuez(Jueces $idJuez): self
    {
        if (!$this->idJuez->contains($idJuez)) {
            $this->idJuez[] = $idJuez;
            $idJuez->addIdEvento($this);
        }

        return $this;
    }

    public function removeIdJuez(Jueces $idJuez): self
    {
        if ($this->idJuez->removeElement($idJuez)) {
            $idJuez->removeIdEvento($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->getNombreEvento();
    }

  

}
