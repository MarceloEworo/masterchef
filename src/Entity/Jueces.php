<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Jueces
 *
 * @ORM\Table(name="jueces")
 * @ORM\Entity (repositoryClass="App\Repository\JuecesRepository")
 */
class Jueces
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_juez", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idJuez;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellidos", type="string", length=200, nullable=false)
     */
    private $apellidos;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Departamento", type="string", length=100, nullable=true)
     */
    private $departamento;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Intolerancia", type="string", length=1000, nullable=true)
     */
    private $intolerancia;

    /**
     * @var string
     *
     * @ORM\Column(name="Correo", type="string", length=200, nullable=false)
     */
    private $correo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="clave", type="string", length=200, nullable=true)
     */
    private $clave;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Eventos", inversedBy="idJuez")
     * @ORM\JoinTable(name="solicitudes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ID_juez", referencedColumnName="ID_juez")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="ID_evento", referencedColumnName="ID_evento")
     *   }
     * )
     */
    private $idEvento;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEvento = new ArrayCollection();
        //\Doctrine\Common\Collections\ArrayCollection
    }

    public function getIdJuez(): ?int
    {
        return $this->idJuez;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getDepartamento(): ?string
    {
        return $this->departamento;
    }

    public function setDepartamento(?string $departamento): self
    {
        $this->departamento = $departamento;

        return $this;
    }

    public function getIntolerancia(): ?string
    {
        return $this->intolerancia;
    }

    public function setIntolerancia(?string $intolerancia): self
    {
        $this->intolerancia = $intolerancia;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(?string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * @return Collection|Eventos[]
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }

    public function addIdEvento(Eventos $idEvento): self
    {
        if (!$this->idEvento->contains($idEvento)) {
            $this->idEvento[] = $idEvento;
        }

        return $this;
    }

    public function removeIdEvento(Eventos $idEvento): self
    {
        $this->idEvento->removeElement($idEvento);

        return $this;
    }

}
