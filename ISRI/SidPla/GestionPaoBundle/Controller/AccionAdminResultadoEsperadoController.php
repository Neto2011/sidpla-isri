<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccionAdminResultadoEsperadoController
 *
 * @author edwin
 */



namespace ISRI\SidPla\GestionPaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use ISRI\SidPla\GestionPaoBundle\EntityDao\ResultadoEsperadoDao;
use ISRI\SidPla\GestionPaoBundle\Entity\ResultadoEsperado;

class AccionAdminResultadoEsperadoController extends Controller {
    //put your code here

    public function consultarResultadoEspAction(){
        
        $opciones=$this->getRequest()->getSession()->get('opciones');
       
        $valorDao=new ResultadoEsperadoDao($this->getDoctrine());        
        $valores=$valorDao->getResulEsp();        
        
        return $this->render('ISRISidPlaGestionPaoBundle:ResultadosEsperados:manttResultadosEsperados.html.twig'
                , array('opciones' => $opciones, 'valores' => $valores));              
    } 
    
     public function consultarResultadoEspJSONAction(){
        
       
         $resultadoDao=new ResultadoEsperadoDao($this->getDoctrine());        
        $resultadoT=$resultadoDao->getResulEsp();  
         
        
        $numfilas=count($resultadoT);  
            
            $uni= new ResultadoEsperado();
            $i=0;
            
            foreach ($resultadoT as $uni) {
                $rows[$i]['id']= $uni->getIdResultadoE();
                $rows[$i]['cell']= array($uni->getIdResultadoE(),
                                         $uni->getResuldescripcion());    
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
          
    
    public function manttResultadoEspEdicionAction(){
            
            $request=$this->getRequest();
            $resultado=$request->get('resultado');
            
            
            $id=$request->get('id');
            
            
            $operacion=$request->get('oper'); 
            
            $resultadoDao=new ResultadoEsperadoDao($this->getDoctrine());
            
            if($operacion=='edit'){                
                $resultadoDao->editResulEsp($resultado, $id);
            }
            
            if($operacion=='del'){
                $resultadoDao->delResulEsp($id);        
            }
            
            if($operacion=='add'){
                $resultadoDao->addResulEsp($resultado);
            }
             
            return new Response("{sc:true,msg:''}"); 
            
        } 
    
    
    
    
    
    
    
    
    
    
    
    
}

?>
