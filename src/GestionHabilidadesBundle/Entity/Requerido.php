<?php

namespace GestionHabilidadesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requerido
 *
 * @ORM\Table(name="requeridos")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\RequeridoRepository")
 */
class Requerido
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
     * @ORM\ManyToOne(targetEntity="Puesto", inversedBy="requerido")
     * @ORM\JoinColumn(name="puesto_id", referencedColumnName="id")
     */
    protected $puesto;

     /**
     * @ORM\ManyToOne(targetEntity="Tecnologia", inversedBy="requerido")
     * @ORM\JoinColumn(name="tecnologia_id", referencedColumnName="id")
     */
    protected $tecnologia;

     /**
     * @ORM\ManyToOne(targetEntity="Proyecto", inversedBy="requerido")
     * @ORM\JoinColumn(name="proyecto_id", referencedColumnName="id")
     */
    protected $proyecto;









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
     * Set requeridos
     *
     * @param \GestionHabilidadesBundle\Entity\Puesto $requerido
     *
     * @return Requerido
     */
    public function setRequerido(\GestionHabilidadesBundle\Entity\Puesto $requerido = null)
    {
        $this->requerido = $requerido;

        return $this;
    }

    /**
     * Get requerido
     *
     * @return \GestionHabilidadesBundle\Entity\Puesto
     */
    public function getRequerido()
    {
        return $this->requerido;
    }

    /**
     * Set puesto
     *
     * @param \GestionHabilidadesBundle\Entity\Puesto $puesto
     *
     * @return Requerido
     */
    public function setPuesto(\GestionHabilidadesBundle\Entity\Puesto $puesto = null)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return \GestionHabilidadesBundle\Entity\Puesto
     */
    public function getPuesto()
    {
        return $this->puesto;
    }

    /**
     * Set tecnologia
     *
     * @param \GestionHabilidadesBundle\Entity\Tecnologia $tecnologia
     *
     * @return Requerido
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

    /**
     * Set proyecto
     *
     * @param \GestionHabilidadesBundle\Entity\Proyecto $proyecto
     *
     * @return Requerido
     */
    public function setProyecto(\GestionHabilidadesBundle\Entity\Proyecto $proyecto = null)
    {
        $this->proyecto = $proyecto;

        return $this;
    }

    /**
     * Get proyecto
     *
     * @return \GestionHabilidadesBundle\Entity\Proyecto
     */
    public function getProyecto()
    {
        return $this->proyecto;
    }
}
