<?php

namespace ISRI\SidPla\GestionPaoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ISRI\SidPla\GestionPaoBundle\Entity\Valores
 *
 * @ORM\Table(name="sidpla_valores")
 * @ORM\Entity
 */
class Valores
{
    /**
     * @var integer $idvalores
     *
     * @ORM\Column(name="val_codigovalor", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idvalores;

   
    /**
     * @var string $valdescripcion
     *
     * @ORM\Column(name="val_descripcion", type="string", length=250)
     */
    private $valdescripcion;

   
    /**
     * Get idvalores
     *
     * @return integer 
     */
    public function getIdvalores()
    {
        return $this->idvalores;
    }

    /**
     * Set valdescripcion
     *
     * @param string $valdescripcion
     */
    public function setValdescripcion($valdescripcion)
    {
        $this->valdescripcion = $valdescripcion;
    }

    /**
     * Get valdescripcion
     *
     * @return string 
     */
    public function getValdescripcion()
    {
        return $this->valdescripcion;
    }
}