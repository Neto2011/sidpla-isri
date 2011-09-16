<?php

namespace ISRI\SidPla\GestionPaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ISRI\SidPla\GestionPaoBundle\Entity\ResultadoEsperado
 *
 * @ORM\Table(name="sidpla_resultadosesperados")
 * @ORM\Entity
 */
class ResultadoEsperado
{
    /**
     * @var integer $idResultadoE
     *
     * @ORM\Column(name="resulesp_codigoresultado", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idResultadoE;

    

    /**
     * @var string $resuldescripcion
     *
     * @ORM\Column(name="resulesp_descripcionresultado", type="string", length=250)
     */
    private $resuldescripcion;

  
    /**
     * Get idResultadoE
     *
     * @return integer 
     */
    public function getIdResultadoE()
    {
        return $this->idResultadoE;
    }

    /**
     * Set resuldescripcion
     *
     * @param string $resuldescripcion
     */
    public function setResuldescripcion($resuldescripcion)
    {
        $this->resuldescripcion = $resuldescripcion;
    }

    /**
     * Get resuldescripcion
     *
     * @return string 
     */
    public function getResuldescripcion()
    {
        return $this->resuldescripcion;
    }
}