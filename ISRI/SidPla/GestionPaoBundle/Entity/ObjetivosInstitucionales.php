<?php

namespace ISRI\SidPla\GestionPaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ISRI\SidPla\GestionPaoBundle\Entity\objetivosinstitucionales
 *
 * @ORM\Table(name="sidpla_objetivosinstitucionales")
 * @ORM\Entity
 */
class ObjetivosInstitucionales
{
    /**
     * @var integer $idobjInst
     *
     * @ORM\Column(name="objeins_codigoobjetivo", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idobjInst;
    
    /**
     * @var string $objInstObjetivo
     *
     * @ORM\Column(name="objeins_objetivo", type="string", length=250)
     */
    private $objInstObjetivo;
   
    /**
     * Get idobjInst
     *
     * @return integer 
     */
    public function getIdobjInst()
    {
        return $this->idobjInst;
    }

    /**
     * Set objInstObjetivo
     *
     * @param string $objInstObjetivo
     */
    public function setObjInstObjetivo($objInstObjetivo)
    {
        $this->objInstObjetivo = $objInstObjetivo;
    }

    /**
     * Get objInstObjetivo
     *
     * @return string 
     */
    public function getObjInstObjetivo()
    {
        return $this->objInstObjetivo;
    }
}