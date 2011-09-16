<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccionAdminObjetivosInstitucionalesController
 *
 * @author edwin
 */
namespace ISRI\SidPla\GestionPaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use ISRI\SidPla\GestionPaoBundle\EntityDao\ObjetivosInstitucionalesDao;
use ISRI\SidPla\GestionPaoBundle\Entity\ObjetivosInstitucionales;

class AccionAdminObjetivosInstitucionalesController  extends Controller{
    //put your code here
    
    public function consultarObjInstAction(){
        
        $opciones=$this->getRequest()->getSession()->get('opciones');
       
        $ObjetivoDao=new ObjetivosInstitucionalesDao($this->getDoctrine());        
        $Objetivos=$ObjetivoDao->getObjInst();        
        
        return $this->render('ISRISidPlaGestionPaoBundle:ObjetivosInstitucionales:manttObjetivosInstitucionales.html.twig'
                , array('opciones' => $opciones, 'objetivos' => $Objetivos));              
    } 
    
     public function consultarObjInstJSONAction(){
        
       
         $ObjetivoDao=new ObjetivosInstitucionalesDao($this->getDoctrine());        
        $ObjetivosT=$ObjetivoDao->getObjInst();  
         
        
        $numfilas=count($ObjetivosT);  
            
            $uni= new ObjetivosInstitucionales();
            $i=0;
            
            foreach ($ObjetivosT as $uni) {
                $rows[$i]['id']= $uni->getIdobjInst();
                $rows[$i]['cell']= array($uni->getIdobjInst(),
                                         $uni->getObjInstObjetivo());    
                $i++;
            }
            
            $datos=json_encode($rows);            
            
            
            $jsonresponse='{
               "page":"1",
               "total":"1",
               "records":"'.$numfilas.'", 
               "rows":'.$datos.'}';
            
            
            $response=new Response($jsonresponse);              
            return $response;            
        
    }
    
   /*
         * Opciones de mantenimiento de mensajes correo template
         * Eliminar, agregar, editar
         * 
         */
          
    
    public function manttObjInstEdicionAction(){
            
            $request=$this->getRequest();
            $objetivo=$request->get('objetivo');
            
            
            $id=$request->get('id');
            
            
            $operacion=$request->get('oper'); 
            
            $objetivoDao=new ObjetivosInstitucionalesDao($this->getDoctrine());
            
            if($operacion=='edit'){                
                $objetivoDao->editObjInst($objetivo, $id);
            }
            
            if($operacion=='del'){
                $objetivoDao->delObjInst($id);        
            }
            
            if($operacion=='add'){
                $objetivoDao->addObjInst($objetivo);
            }
             
            return new Response("{sc:true,msg:''}"); 
            
        }
    
    
    
}

?>
