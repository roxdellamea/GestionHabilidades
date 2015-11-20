<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Califtecnologia
 *
 * @ORM\Table(name="califtecnologias")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\CaliftecnologiaRepository")
 */
class Califtecnologia
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
     * @ORM\Column(name="nota", type="string", columnDefinition="ENUM('1','2','3','4','5')")
     */
    private $nivel;



     /**
     * @ORM\ManyToOne(targetEntity="Mes", inversedBy="califtecnologia")
     * @ORM\JoinColumn(name="mes_id", referencedColumnName="id")
     */
    protected $mes;

      /**
     * @ORM\ManyToOne(targetEntity="Profesional", inversedBy="califtecnologia")
     * @ORM\JoinColumn(name="dni_id", referencedColumnName="id")
     */
    protected $dni;


    /**
     * @ORM\ManyToOne(targetEntity="Tecnologia", inversedBy="califtecnologia")
     * @ORM\JoinColumn(name="tecnologia_id", referencedColumnName="id")
     */
    protected $tecnologia;



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
     * Set nivel
     *
     * @param string $nivel
     *
     * @return Califtecnologia
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Set mes
     *
     * @param \GestionHabilidadesBundle\Entity\Mes $mes
     *
     * @return Califtecnologia
     */
    public function setMes(\GestionHabilidadesBundle\Entity\Mes $mes = null)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return \GestionHabilidadesBundle\Entity\Mes
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set dni
     *
     * @param \GestionHabilidadesBundle\Entity\Profesional $dni
     *
     * @return Califtecnologia
     */
    public function setDni(\GestionHabilidadesBundle\Entity\Profesional $dni = null)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return \GestionHabilidadesBundle\Entity\Profesional
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set tecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Tecnologia $tecnologia
     *
     * @return Califtecnologia
     */
    public function setTecnologia(\GestionHabilidadesBundle\Entity\Tecnologia $tecnologia = null)
    {
        $this->tecnologia = $tecnologia;

        return $this;
    }

    /**
     * Get tecnologia
     *
     * @return \GestionHabilidadesBundle\Entity\Tecnologia
     */
    public function getTecnologia()
    {
        return $this->tecnologia;
    }
}
