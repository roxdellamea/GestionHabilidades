<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mes
 *
 * @ORM\Table(name="meses")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\MesRepository")
 */
class Mes
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
     * @ORM\Column(name="mes", type="string", length=50)
     */
    private $mes;

    /**
     * @ORM\OneToMany(targetEntity="Califcompetencia", mappedBy="mes")
     */
    protected $califcompetencia;


    /**
     * @ORM\OneToMany(targetEntity="Califtecnologia", mappedBy="mes")
     */
    protected $califtecnologia;

     public function __construct()
    {
        $this->califcompetencia = new ArrayCollection();
        $this->califtecnologia = new ArrayCollection();
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
     * Set mes
     *
     * @param string $mes
     *
     * @return Meses
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return string
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Add califcompetencia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia
     *
     * @return Mes
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

    /**
     * Add califtecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Califtecnologia $califtecnologia
     *
     * @return Mes
     */
    public function addCaliftecnologia(\GestionHabilidadesBundle\Entity\Califtecnologia $califtecnologia)
    {
        $this->califtecnologia[] = $califtecnologia;

        return $this;
    }

    /**
     * Remove califtecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Califtecnologia $califtecnologia
     */
    public function removeCaliftecnologia(\GestionHabilidadesBundle\Entity\Califtecnologia $califtecnologia)
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
}
