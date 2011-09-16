<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of objetivosinstitucionalesDao
 *
 * @author edwin
 */

namespace ISRI\SidPla\GestionPaoBundle\EntityDao;
use ISRI\SidPla\GestionPaoBundle\Entity\ObjetivosInstitucionales;
class ObjetivosInstitucionalesDao {
    
    //put your code here
    
    
    var $doctrine;
    var $repositorio;
    var $em;    
	
    function __construct($doctrine){ 
        $this->doctrine=$doctrine;      	
        $this->em=$this->doctrine->getEntityManager();
        $this->repositorio=$this->doctrine->getRepository('ISRISidPlaGestionPaoBundle:ObjetivosInstitucionales');
    } 
    
  
    
    public function getObjInst() {	    
        $mensajes=$this->repositorio->findAll();
        return $mensajes;
    }
  
    /*
     *  Almacena un objetivo ingresado en el sistema
     */
    
    public function addObjInst($objInstObjetivo) {
        
        $objetivoSistema=new ObjetivosInstitucionales();
        
        $objetivoSistema->setObjInstObjetivo($objInstObjetivo);
       
	    
        $this->em->persist($objetivoSistema);
        $this->em->flush();	    
        $matrizMensajes = array('El proceso de almacenar el objetivo Institucional ha termino con exito', 'Objetivo '.$objetivoSistema->getIdobjInst());

        return $matrizMensajes;
    }
    
    public function editObjInst($objInstObjetivo, $id){
            
            $objetivoTemp=new ObjetivosInstitucionales();            
            $objetivoTemp=$this->repositorio->find($id);
            
            if(!$objetivoTemp){
                throw $this->createNotFoundException('No se encontro el objetivo con ese id '.$id);
            }
            
            $objetivoTemp->setObjInstObjetivo($objInstObjetivo);
        
            
            $this->em->flush();            
            $matrizMensajes = array('El proceso de editar termino con exito', 'Objetivo '.$objetivoTemp->getIdobjInst());
 
            return $matrizMensajes;
        }
        
         /*
         * eliminar objetivo
         */
        
        
        public function delObjInst($id){            
            
            $objetivoTemp=$this->repositorio->find($id);
            
            if(!$objetivoTemp){
                throw $this->createNotFoundException('No se encontro el objetivo con ese  id '.$id);
            }
            
            $this->em->remove($objetivoTemp);
            $this->em->flush();
            
            $matrizMensajes = array('El proceso de eliminar el objetivo correo termino con exito', 'Rol '.$objetivoTemp->getIdobjInst());
 
            return $matrizMensajes;
        }
    
    
    
    
    
}

?>
