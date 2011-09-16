<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValoresDao
 *
 * @author edwin
 */

namespace ISRI\SidPla\GestionPaoBundle\EntityDao;
use ISRI\SidPla\GestionPaoBundle\Entity\Valores;
class ValoresDao {
    //put your code here

     var $doctrine;
    var $repositorio;
    var $em;    
	
    function __construct($doctrine){ 
        $this->doctrine=$doctrine;      	
        $this->em=$this->doctrine->getEntityManager();
        $this->repositorio=$this->doctrine->getRepository('ISRISidPlaGestionPaoBundle:Valores');
    } 
    
  
    
    public function getValores() {	    
        $mensajes=$this->repositorio->findAll();
        return $mensajes;
    }
  
    /*
     *  Almacena un objetivo ingresado en el sistema
     */
    
    public function addValores($valdescripcion) {
        
        $valorSistema=new Valores();
        
        $valorSistema->setValdescripcion($valdescripcion);
       
	    
        $this->em->persist($valorSistema);
        $this->em->flush();	    
        $matrizMensajes = array('El proceso de almacenar el valor ha termino con exito', 'Valor '.$valorSistema->getIdvalores());

        return $matrizMensajes;
    }
    
    public function editValores($valdescripcion, $id){
            
            $valorTemp=new Valores();            
            $valorTemp=$this->repositorio->find($id);
            
            if(!$valorTemp){
                throw $this->createNotFoundException('No se encontro el valor  con ese id '.$id);
            }
            
            $valorTemp->setValdescripcion($valdescripcion);
        
            
            $this->em->flush();            
            $matrizMensajes = array('El proceso de editar termino con exito', 'Valor '.$valorTemp->getIdvalores());
 
            return $matrizMensajes;
        }
        
         /*
         * eliminar objetivo
         */
        
        
        public function delValores($id){            
            
            $valorTemp=$this->repositorio->find($id);
            
            if(!$valorTemp){
                throw $this->createNotFoundException('No se encontro el Valor con ese  id '.$id);
            }
            
            $this->em->remove($valorTemp);
            $this->em->flush();
            
            $matrizMensajes = array('El proceso de eliminar el Valor correo termino con exito', 'Valor '.$valorTemp->getIdvalores());
 
            return $matrizMensajes;
        }
    
    
    
    
    
}

?>
