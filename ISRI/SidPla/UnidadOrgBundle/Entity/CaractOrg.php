<?php

namespace ISRI\SidPla\UnidadOrgBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ISRI\SidPla\UnidadOrgBundle\Entity\CaractOrg
 *
 * @ORM\Table(name="sidpla_caracteristicaorganizaci")
 * @ORM\Entity
 */
class CaractOrg
{
    /**
     * @var integer $idCaractOrg
     *
     * @ORM\Column(name="carorg_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */    
    private $idCaractOrg;

    /**
     * @var text $mision
     *
     * @ORM\Column(name="carorg_mision", type="text")
     */
    private $mision;

    /**
     * @var text $vision
     *
     * @ORM\Column(name="carorg_vision", type="text")
     */
    private $vision;

    /**
     * @var text $funcionPrincipal
     *
     * @ORM\Column(name="carorg_funcionprincipal", type="text")
     */
    private $funcionPrincipal;

    /**
     * @var text $objetivoGeneral
     *
     * @ORM\Column(name="carorg_objetivogeneral", type="text")
     */
    private $objetivoGeneral;
    
    
     /**
     * @ORM\OneToMany(targetEntity="FuncionEspecifica", mappedBy="caractOrg")
     */
    protected $funcionesEspec;
    
    /**
     * @ORM\OneToMany(targetEntity="ObjetivoEspecifico", mappedBy="caractOrg")
     */
    protected $objetivosEspec;
    
    /**
     * @ORM\OneToOne(targetEntity="ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa", inversedBy="caractOrg")
     * @ORM\JoinColumn(name="uniorg_codigo", referencedColumnName="uniorg_codigo")
     */
    private $unidadOrganizativa;
    
    
    /**
     * Set idCaractOrg
     *
     * @param integer $idCaractOrg
     */
    public function setIdCaractOrg($idCaractOrg)
    {
        $this->idCaractOrg = $idCaractOrg;
    }

    /**
     * Get idCaractOrg
     *
     * @return integer 
     */
    public function getIdCaractOrg()
    {
        return $this->idCaractOrg;
    }

    /**
     * Set mision
     *
     * @param text $mision
     */
    public function setMision($mision)
    {
        $this->mision = $mision;
    }

    /**
     * Get mision
     *
     * @return text 
     */
    public function getMision()
    {
        return $this->mision;
    }

    /**
     * Set vision
     *
     * @param text $vision
     */
    public function setVision($vision)
    {
        $this->vision = $vision;
    }

    /**
     * Get vision
     *
     * @return text 
     */
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * Set funcionPrincipal
     *
     * @param text $funcionPrincipal
     */
    public function setFuncionPrincipal($funcionPrincipal)
    {
        $this->funcionPrincipal = $funcionPrincipal;
    }

    /**
     * Get funcionPrincipal
     *
     * @return text 
     */
    public function getFuncionPrincipal()
    {
        return $this->funcionPrincipal;
    }

    /**
     * Set objetivoGeneral
     *
     * @param text $objetivoGeneral
     */
    public function setObjetivoGeneral($objetivoGeneral)
    {
        $this->objetivoGeneral = $objetivoGeneral;
    }

    /**
     * Get objetivoGeneral
     *
     * @return text 
     */
    public function getObjetivoGeneral()
    {
        return $this->objetivoGeneral;
    }
    
    public function __construct()
    {
        $this->funcionesEspec = new ArrayCollection();
        $this->objetivosEspec= new ArrayCollection();
    }
    
    /**
     * Add funcionesEspec
     *
     * @param ISRI\SidPla\UnidadOrgBundle\Entity\FuncionEspecifica $funcionesEspec
     */
    public function addFuncionesEspec(ISRI\SidPla\UnidadOrgBundle\Entity\FuncionEspecifica $funcionesEspec)
    {
        $this->funcionesEspec[] = $funcionesEspec;
    }

    /**
     * Get funcionesEspec
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFuncionesEspec()
    {
        return $this->funcionesEspec;
    }

    /**
     * Set unidadOrganizativa
     *
     * @paramISRI\SidPla\UnidadOrgBundle\Entity\UnidadOrganizativa $unidadOrganizativa
     */
    public function setUnidadOrganizativa(ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $unidadOrganizativa)
    {
        $this->unidadOrganizativa = $unidadOrganizativa;
    }

    /**
     * Get unidadOrganizativa
     *
     * @return ISRI\SidPla\UnidadOrgBundle\Entity\UnidadOrganizativa 
     */
    public function getUnidadOrganizativa()
    {
        return $this->unidadOrganizativa;
    }

    /**
     * Add funcionesEspec
     *
     * @param ISRI\SidPla\UnidadOrgBundle\Entity\FuncionEspecifica $funcionesEspec
     */
    public function addFuncionEspecifica(ISRI\SidPla\UnidadOrgBundle\Entity\FuncionEspecifica $funcionesEspec)
    {
        $this->funcionesEspec[] = $funcionesEspec;
    }

    /**
     * Add objetivosEspec
     *
     * @param ISRI\SidPla\UnidadOrgBundle\Entity\ObjetivoEspecifico $objetivosEspec
     */
    public function addObjetivoEspecifico(ISRI\SidPla\UnidadOrgBundle\Entity\ObjetivoEspecifico $objetivosEspec)
    {
        $this->objetivosEspec[] = $objetivosEspec;
    }

    /**
     * Get objetivosEspec
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getObjetivosEspec()
    {
        return $this->objetivosEspec;
    }
}