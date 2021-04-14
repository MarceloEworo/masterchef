<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity (repositoryClass="App\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="usurio", type="string", length=100, nullable=false)
     */
    private $usurio;

    /**
     * @var string
     *
     * @ORM\Column(name="clave", type="string", length=200, nullable=false)
     */
    private $clave;

    public function getIdAdmin(): ?int
    {
        return $this->idAdmin;
    }

    public function getUsurio(): ?string
    {
        return $this->usurio;
    }

    public function setUsurio(string $usurio): self
    {
        $this->usurio = $usurio;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->clave;
    }

    public function setClave(string $clave): self
    {
        $this->clave = $clave;

        return $this;
    }


}
