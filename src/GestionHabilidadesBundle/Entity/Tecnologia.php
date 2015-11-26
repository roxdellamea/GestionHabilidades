<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tecnologia
 *
 * @ORM\Table(name="tecnologias")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\TecnologiaRepository")
 */
class Tecnologia
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
     * @ORM\OneToMany(targetEntity="Califcompetencia", mappedBy="tecnologia", cascade={"persist", "remove"})
     */
    protected $califtecnologia;

    /**
     * @ORM\OneToMany(targetEntity="Requerido", mappedBy="tecnologia", cascade={"persist", "remove"})
     */
    protected $requerido;

     public function __construct()
    {
        $this->califtecnologia = new ArrayCollection();
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
     * @return Tecnologias
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
     * Add califtecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califtecnologia
     *
     * @return Tecnologia
     */
    public function addCaliftecnologia(\GestionHabilidadesBundle\Entity\Califcompetencia $califtecnologia)
    {
        $this->califtecnologia[] = $califtecnologia;

        return $this;
    }

    /**
     * Remove califtecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califtecnologia
     */
    public function removeCaliftecnologia(\GestionHabilidadesBundle\Entity\Califcompetencia $califtecnologia)
    {
        $this->califtecnologia->removeElement($califtecnologia);
    }

    /**
     * Get califtecnologia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaliftecnologia()
    {
        return $this->califtecnologia;
    }

    /**
     * Add requerido
     *
     * @param \GestionHabilidadesBundle\Entity\Requerido $requerido
     *
     * @return Tecnologia
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
