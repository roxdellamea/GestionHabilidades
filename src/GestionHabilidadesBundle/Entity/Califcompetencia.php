<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Califcompetencia
 *
 * @ORM\Table(name="califcompetencias")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\CalifcompetenciaRepository")
 */
class Califcompetencia
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
     * @ORM\Column(name="nota", type="string", columnDefinition="ENUM('NE','1','2','3')")
     */
    private $nota;

    /**
     * @var string
     *
     * @ORM\Column(name="actividades", type="string", columnDefinition="ENUM('1','2','3','4','5','6','7','8','9','10')")
     */
    private $actividad;

     /**
     * @ORM\ManyToOne(targetEntity="Mes", inversedBy="califcompetencia")
     * @ORM\JoinColumn(name="mes_id", referencedColumnName="id")
     */
    protected $mes;

     /**
     * @ORM\ManyToOne(targetEntity="Profesional", inversedBy="califcompetencia")
     * @ORM\JoinColumn(name="dni_id", referencedColumnName="id")
     */
    protected $dni;

     /**
     * @ORM\ManyToOne(targetEntity="Competencia", inversedBy="califcompetencia")
     * @ORM\JoinColumn(name="competencia_id", referencedColumnName="id")
     */
    protected $competencia;



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
     * Set nota
     *
     * @param string $nota
     *
     * @return Califcompetencia
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set actividad
     *
     * @param string $actividad
     *
     * @return Califcompetencia
     */
    public function setActividad($actividad)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return string
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set mes
     *
     * @param \GestionHabilidadesBundle\Entity\Mes $mes
     *
     * @return Califcompetencia
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
     * Set competencia
     *
     * @param \GestionHabilidadesBundle\Entity\Competencia $competencia
     *
     * @return Califcompetencia
     */
    public function setCompetencia(\GestionHabilidadesBundle\Entity\Competencia $competencia = null)
    {
        $this->competencia = $competencia;

        return $this;
    }

    /**
     * Get competencia
     *
     * @return \GestionHabilidadesBundle\Entity\Competencia
     */
    public function getCompetencia()
    {
        return $this->competencia;
    }

    /**
     * Set dni
     *
     * @param \GestionHabilidadesBundle\Entity\Profesional $dni
     *
     * @return Califcompetencia
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
}
