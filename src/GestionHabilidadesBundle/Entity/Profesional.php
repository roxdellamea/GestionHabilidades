<?php

namespace GestionHabilidadesBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Profesional
 *
 * @ORM\Table(name="profesionales")
 * @ORM\Entity(repositoryClass="GestionHabilidadesBundle\Entity\ProfesionalRepository")
 */
class Profesional
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
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100)
     */
    private $apellido;

    /**
     * @var integer
     *
     * @ORM\Column(name="dni", type="integer", unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=16)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=100)
     */
    private $linkedin;


     /**
     * @ORM\OneToMany(targetEntity="Califcompetencia", mappedBy="dni")
     */
    protected $califcompetencia;

    /**
     * @ORM\OneToMany(targetEntity="Califtecnologia", mappedBy="dni")
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Profesional
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Profesional
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return Profesional
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return integer
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Profesional
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Profesional
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set linkedin
     *
     * @param string $linkedin
     *
     * @return Profesional
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get linkedin
     *
     * @return string
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Add califcompetencia
     *
     * @param \GestionHabilidadesBundle\Entity\Califcompetencia $califcompetencia
     *
     * @return Profesional
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
     * @return Profesional
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
