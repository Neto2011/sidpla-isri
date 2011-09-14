<?php

namespace ISRI\SidPla\PaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ISRI\SidPla\PaoBundle\Entity\Pao
 *
 * @ORM\Table(name="sidpla_pao")
 * @ORM\Entity
 */
class Pao
{
    /**
     * @var integer $idPao
     *
     * @ORM\Column(name="pao_codigo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPao;

    
    /**
     * @var integer $anio
     *
     * @ORM\Column(name="pao_anio", type="integer")
     */
    private $anio;
    
    
     /**
     * @ORM\ManyToOne(targetEntity="ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa", inversedBy="paos")
     * @ORM\JoinColumn(name="uniorg_codigo", referencedColumnName="uniorg_codigo")
     */
    protected $unidadOrganizativa;
    
        
    /**
     * @ORM\OneToOne(targetEntity="ISRI\SidPla\CensoBundle\Entity\CensoPoblacion", mappedBy="pao")
     * @ORM\JoinColumn(name="censopoblacion_codigo", referencedColumnName="censopoblacion_codigo")
     */
    private $cesopoblacion;
    
     /**
     * @ORM\OneToOne(targetEntity="Justificacion", mappedBy="pao")
     * @ORM\JoinColumn(name="justificacion_codigo", referencedColumnName="justificacion_codigo")
     */
    private $justificacion;



    /**
     * Set idPao
     *
     * @param integer $idPao
     */
    public function setIdPao($idPao)
    {
        $this->idPao = $idPao;
    }

    /**
     * Get idPao
     *
     * @return integer 
     */
    public function getIdPao()
    {
        return $this->idPao;
    }

    /**
     * Set anio
     *
     * @param integer $anio
     */
    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    /**
     * Get anio
     *
     * @return integer 
     */
    public function getAnio()
    {
        return $this->anio;
    }

    /**
     * Set unidadOrganizativa
     *
     * @param ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $unidadOrganizativa
     */
    public function setUnidadOrganizativa(\ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa $unidadOrganizativa)
    {
        $this->unidadOrganizativa = $unidadOrganizativa;
    }

    /**
     * Get unidadOrganizativa
     *
     * @return ISRI\SidPla\AdminBundle\Entity\UnidadOrganizativa 
     */
    public function getUnidadOrganizativa()
    {
        return $this->unidadOrganizativa;
    }

    /**
     * Set cesopoblacion
     *
     * @param ISRI\SidPla\CensoBundle\Entity\CensoPoblacion $cesopoblacion
     */
    public function setCesopoblacion(\ISRI\SidPla\CensoBundle\Entity\CensoPoblacion $cesopoblacion)
    {
        $this->cesopoblacion = $cesopoblacion;
    }

    /**
     * Get cesopoblacion
     *
     * @return ISRI\SidPla\CensoBundle\Entity\CensoPoblacion 
     */
    public function getCesopoblacion()
    {
        return $this->cesopoblacion;
    }

    /**
     * Set justificacion
     *
     * @param ISRI\SidPla\PaoBundle\Entity\Justificacion $justificacion
     */
    public function setJustificacion(\ISRI\SidPla\PaoBundle\Entity\Justificacion $justificacion)
    {
        $this->justificacion = $justificacion;
    }

    /**
     * Get justificacion
     *
     * @return ISRI\SidPla\PaoBundle\Entity\Justificacion 
     */
    public function getJustificacion()
    {
        return $this->justificacion;
    }
}