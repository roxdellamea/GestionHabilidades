<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puesto
 *
 * @ORM\Table(name="puestos")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\PuestoRepository")
 */
class Puesto
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
     * @ORM\OneToMany(targetEntity="Requerido", mappedBy="puesto")
     */
    protected $requerido;

    public function __construct()
    {
        $this->requerido = new ArrayCollection();
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
     * @return Puestos
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
     * Add requerido
     *
     * @param \GestionHabilidadesBundle\Entity\Requerido $requerido
     *
     * @return Puesto
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
