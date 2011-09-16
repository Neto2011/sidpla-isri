<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ResultadoEsperadoDao
 *
 * @author edwin
 */
namespace ISRI\SidPla\GestionPaoBundle\EntityDao;
use ISRI\SidPla\GestionPaoBundle\Entity\ResultadoEsperado;
class ResultadoEsperadoDao {
    //put your code here
    
    var $doctrine;
    var $repositorio;
    var $em;    
	
    function __construct($doctrine){ 
        $this->doctrine=$doctrine;      	
        $this->em=$this->doctrine->getEntityManager();
        $this->repositorio=$this->doctrine->getRepository('ISRISidPlaGestionPaoBundle:ResultadoEsperado');
    } 
    
  
    
    public function getResulEsp() {	    
        $mensajes=$this->repositorio->findAll();
        return $mensajes;
    }
  
    /*
     *  Almacena un objetivo ingresado en el sistema
     */
    
    public function addResulEsp($resuldescripcion) {
        
        $resultadoSistema=new ResultadoEsperado();
        
        $resultadoSistema->setResuldescripcion($resuldescripcion);
       
	    
        $this->em->persist($resultadoSistema);
        $this->em->flush();	    
        $matrizMensajes = array('El proceso de almacenar   ha termino con exito', 'Objetivo '.$resultadoSistema->getIdResultadoE());

        return $matrizMensajes;
    }
    
    public function editResulEsp($resuldescripcion, $id){
            
            $resultadoTemp=new ResultadoEsperado();            
            $resultadoTemp=$this->repositorio->find($id);
            
            if(!$resultadoTemp){
                throw $this->createNotFoundException('No se encontro  ese id '.$id);
            }
            
            $resultadoTemp->setResuldescripcion($resuldescripcion);
        
            
            $this->em->flush();            
            $matrizMensajes = array('El proceso de editar termino con exito', 'Objetivo '.$resultadoTemp->getIdResultadoE());
 
            return $matrizMensajes;
        }
        
         /*
         * eliminar objetivo
         */
        
        
        public function delResulEsp($id){            
            
            $resultadoTemp=$this->repositorio->find($id);
            
            if(!$resultadoTemp){
                throw $this->createNotFoundException('No se encontro  ese  id '.$id);
            }
            
            $this->em->remove($resultadoTemp);
            $this->em->flush();
            
            $matrizMensajes = array('El proceso de eliminar  termino con exito', 'Rol '.$resultadoTemp->getIdResultadoE());
 
            return $matrizMensajes;
        }
    
    
    
    
}

?>
