<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Proyecto
 *
 * @ORM\Table(name="proyectos")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\ProyectoRepository")
 */
class Proyecto
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="Requerido", mappedBy="proyecto", cascade={"persist", "remove"})
     */
    protected $requerido;

    public function __construct()
    {
        $this->requerido = new ArrayCollection();
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
     * @return Proyecto
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Proyecto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

  
    /**
     * Add requerido
     *
     * @param \GestionHabilidadesBundle\Entity\Requerido $requerido
     *
     * @return Proyecto
     */
    public function addRequerido(\GestionHabilidadesBundle\Entity\Requerido $requerido)
    {
        $this->requerido[] = $requerido;

        return $this;
    }

    /**
     * Remove requerido
     *
     * @param \GestionHabilidadesBundle\Entity\Requerido $requerido
     */
    public function removeRequerido(\GestionHabilidadesBundle\Entity\Requerido $requerido)
    {
        $this->requerido->removeElement($requerido);
    }

    /**
     * Get requerido
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRequerido()
    {
        return $this->requerido;
    }
}
