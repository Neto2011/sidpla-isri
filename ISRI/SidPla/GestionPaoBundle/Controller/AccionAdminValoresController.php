<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccionAdminValoresController
 *
 * @author edwin
 */


namespace ISRI\SidPla\GestionPaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use ISRI\SidPla\GestionPaoBundle\EntityDao\ValoresDao;
use ISRI\SidPla\GestionPaoBundle\Entity\Valores;
class AccionAdminValoresController extends Controller {
    //put your code here

    public function consultarValoresAction(){
        
        $opciones=$this->getRequest()->getSession()->get('opciones');
       
        $valorDao=new ValoresDao($this->getDoctrine());        
        $valores=$valorDao->getValores();        
        
        return $this->render('ISRISidPlaGestionPaoBundle:Valores:manttValores.html.twig'
                , array('opciones' => $opciones, 'valores' => $valores));              
    } 
    
     public function consultarValoresJSONAction(){
        
       
         $valorDao=new ValoresDao($this->getDoctrine());        
        $valorT=$valorDao->getValores();  
         
        
        $numfilas=count($valorT);  
            
            $uni= new Valores();
            $i=0;
            
            foreach ($valorT as $uni) {
                $rows[$i]['id']= $uni->getIdvalores();
                $rows[$i]['cell']= array($uni->getIdvalores(),
                                         $uni->getValdescripcion());    
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
          
    
    public function manttValoresEdicionAction(){
            
            $request=$this->getRequest();
            $valor=$request->get('valor');
            
            
            $id=$request->get('id');
            
            
            $operacion=$request->get('oper'); 
            
            $valorDao=new ValoresDao($this->getDoctrine());
            
            if($operacion=='edit'){                
                $valorDao->editValores($valor, $id);
            }
            
            if($operacion=='del'){
                $valorDao->delValores($id);        
            }
            
            if($operacion=='add'){
                $valorDao->addValores($valor);
            }
             
            return new Response("{sc:true,msg:''}"); 
            
        } 
}

?>
