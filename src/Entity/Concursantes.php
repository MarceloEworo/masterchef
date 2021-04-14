<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concursantes
 *
 * @ORM\Table(name="concursantes")
 * @ORM\Entity (repositoryClass="App\Repository\ConcursantesRepository")
 */
class Concursantes
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_concursante", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idConcursante;

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
     * @var string
     *
     * @ORM\Column(name="Curso", type="string", length=100, nullable=false)
     */
    private $curso;

    public function getIdConcursante(): ?int
    {
        return $this->idConcursante;
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

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;

        return $this;
    }


}
