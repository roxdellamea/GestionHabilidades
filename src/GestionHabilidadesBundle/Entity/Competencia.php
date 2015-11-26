<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Competencia
 *
 * @ORM\Table(name="competencias")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\CompetenciaRepository")
 */
class Competencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;


    /**
     * @ORM\OneToMany(targetEntity="Califcompetencia", mappedBy="competencia", cascade={"persist", "remove"})
     */
    protected $califcompetencia;

    public function __construct()
    {
        $this->califcompetencia = new ArrayCollection();
    }

    public function __toString()
    {
        return strval($this->nombre);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Competencia
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add califcompetencia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia
     *
     * @return Competencia
     */
    public function addCalifcompetencia(\GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia)
    {
        $this->califcompetencia[] = $califcompetencia;

        return $this;
    }

    /**
     * Remove califcompetencia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia
     */
    public function removeCalifcompetencia(\GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia)
    {
        $this->califcompetencia->removeElement($califcompetencia);
    }

    /**
     * Get califcompetencia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCalifcompetencia()
    {
        return $this->califcompetencia;
    }
}
