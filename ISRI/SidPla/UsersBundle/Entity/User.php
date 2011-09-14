<?php

namespace ISRI\SidPla\UsersBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sidpla_usuario")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(name="usuario_codigo", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $idUsuario;
    
    
    /**
     * @ORM\OneToOne(targetEntity="ISRI\SidPla\AdminBundle\Entity\Empleado", mappedBy="usuario")
     * @ORM\JoinColumn(name="empleado_codigo", referencedColumnName="empleado_codigo")
     */
    private $empleado;
    
     /**
     * @ORM\ManyToOne(targetEntity="ISRI\SidPla\AdminBundle\Entity\RolSistema", inversedBy="usuarios")
     * @ORM\JoinColumn(name="rol_codigo", referencedColumnName="rol_codigo")
     */
    protected $rol;
    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set empleado
     *
     * @param ISRI\SidPla\UsersBundle\Entity\Empleado $empleado
     */
    public function setEmpleado(\ISRI\SidPla\AdminBundle\Entity\Empleado $empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * Get empleado
     *
     * @return ISRI\SidPla\UsersBundle\Entity\Empleado 
     */
    public function getEmpleado()
    {
        return $this->empleado;
    }

    /**
     * Set rol
     *
     * @param ISRI\SidPla\AdminBundle\Entity\RolSistema $rol
     */
    public function setRol(\ISRI\SidPla\AdminBundle\Entity\RolSistema $rol)
    {
        $this->rol = $rol;
    }

    /**
     * Get rol
     *
     * @return ISRI\SidPla\AdminBundle\Entity\RolSistema 
     */
    public function getRol()
    {
        return $this->rol;
    }
}