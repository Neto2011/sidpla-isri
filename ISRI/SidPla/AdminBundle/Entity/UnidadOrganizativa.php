<?php

namespace ISRI\SidPla\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa
 *
 * @ORM\Table(name="sidpla_unidadorganizativa")
 * @ORM\Entity
 */
class UnidadOrganizativa {
    
    /**
     * @var integer $idUnidadOrg
     *
     * @ORM\Column(name="uniorg_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     private $idUnidadOrg;
     
     
     /**
     * @var string $nombreUnidad
     *
     * @ORM\Column(name="uniorg_nombre", type="string", length=150)
     */
     private $nombreUnidad;    
     
     
     /**
     * @var string $descripcionUnidad
     *
     * @ORM\Column(name="uniorg_descripcion", type="string", length=200)
     */
     private $descripcionUnidad;
     
     /**
     * @var string $tipoUnidad
     *
     * @ORM\Column(name="uniorg_tipounidad", type="string", length=15)
     */
     private $tipoUnidad;
     
             
     /**
     * @var integer $idMunicipio
     *
     * @ORM\Column(name="muni_codigo", type="integer")
     */
     private $idMunicipio;  
     
     
    /**
     * @ORM\OneToMany(targetEntity="UnidadOrganizativa", mappedBy="parent")
     */
    protected $subUnidades;
    
    /**
     * @ORM\ManyToOne(targetEntity="UnidadOrganizativa", inversedBy="subUnidades")
     * @ORM\JoinColumn(name="uniorg_codigo1", referencedColumnName="uniorg_codigo")
     */
    private $parent;
    
    
     /**
     * @ORM\OneToOne(targetEntity="InformacionGeneral", mappedBy="unidadOrganizativa")
     */
    private $informacionGeneral;
    
    
     /**
     * @ORM\OneToMany(targetEntity="ISRI\SidPla\PaoBundle\Entity\Pao", mappedBy="unidadOrganizativa")
     */
    protected $paos;
    
     /**
     * @ORM\OneToOne(targetEntity="ISRI\SidPla\UnidadOrgBundle\Entity\CaractOrg", mappedBy="unidadOrganizativa")
     * @ORM\JoinColumn(name="carorg_codigo", referencedColumnName="carorg_codigo")
     */
    private $caractOrg;
    
    
    public function __construct()
    {
        $this->subUnidades = new ArrayCollection();
        $this->paos=new ArrayCollection();
    }
    
    /**
     * Add subUnidades
     *
     * @param \ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $subUnidades
     */
    public function addSubUnidades(\ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $subUnidades)
    {
        $this->subUnidades[] = $subUnidades;
    }

    /**
     * Get subUnidades
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getSubUnidades()
    {
        return $this->subUnidades;
    }
    
     public function getParent()
    {
        return $this->parent;
    }
    
    public function setParent($parent)
    {
        $this->parent = $parent;
    }
    
     
     
     /**
     * Get idUnidadOrg
     *
     * @return integer 
     */
    public function getIdUnidadOrg()
    {
        return $this->idUnidadOrg;
    }
    
    public function getNombreUnidad()
    {
        return $this->nombreUnidad;
    }
    
    public function setNombreUnidad($nombreUnidad)
    {
        $this->nombreUnidad = $nombreUnidad;
    }
    
    public function getDescripcionUnidad()
    {
        return $this->descripcionUnidad;
    }
    
    public function setDescripcionUnidad($descripcionUnidad)
    {
        $this->descripcionUnidad = $descripcionUnidad;
    }
    
    public function getTipoUnidad()
    {
        return $this->tipoUnidad;
    }
    
     public function setTipoUnidad($tipoUnidad)
    {
        $this->tipoUnidad = $tipoUnidad;
    }
    
   
    
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }
    
    public function setIdMunicipio($idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;
    }
   

    /**
     * Set informacionGeneral
     *
     * @param ISRI\SidPla\AdminBundle\Entity\InformacionGeneral $informacionGeneral
     */
    public function setInformacionGeneral(\ISRI\SidPla\AdminBundle\Entity\InformacionGeneral $informacionGeneral)
    {
        $this->informacionGeneral = $informacionGeneral;
    }

    /**
     * Get informacionGeneral
     *
     * @return ISRI\SidPla\AdminBundle\Entity\InformacionGeneral 
     */
    public function getInformacionGeneral()
    {
        return $this->informacionGeneral;
    }

    /**
     * Add paos
     *
     * @param ISRI\SidPla\PaoBundle\Entity\Pao $paos
     */
    public function addPaos(\ISRI\SidPla\PaoBundle\Entity\Pao $paos)
    {
        $this->paos[] = $paos;
    }

    /**
     * Get paos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPaos()
    {
        return $this->paos;
    }
    
    
    /**
     * Set caractOrg
     *
     * @param ISRI\SidPla\UnidadOrgBundle\Entity\CaractOrg $caractOrg
     */
    public function setCaractOrg(\ISRI\SidPla\UnidadOrgBundle\Entity\CaractOrg $caractOrg)
    {
        $this->caractOrg = $caractOrg;
    }

    /**
     * Get caractOrg
     *
     * @return ISRI\SidPla\UnidadOrgBundle\Entity\CaractOrg 
     */
    public function getCaractOrg()
    {
        return $this->caractOrg;
    }
    
    
    public function __toString()
    {
       return $this->getNombreUnidad();
    }

    /**
     * Add subUnidades
     *
     * @param ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $subUnidades
     */
    public function addUnidadOrganizativa(\ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $subUnidades)
    {
        $this->subUnidades[] = $subUnidades;
    }

    /**
     * Add paos
     *
     * @param ISRI\SidPla\PaoBundle\Entity\Pao $paos
     */
    public function addPao(\ISRI\SidPla\PaoBundle\Entity\Pao $paos)
    {
        $this->paos[] = $paos;
    }
}