<?php

namespace ISRI\SidPlaBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ISRI\SidPla\AdminBundle\EntityDao\OpcionSistemaDao;
use Symfony\Component\HttpFoundation\Request;
use ISRI\SidPla\UsersBundle\Entity\User;
use ISRI\SidPla\AdminBundle\Entity\RolSistema;
use ISRI\SidPla\AdminBundle\Entity\OpcionSistema;



class DefaultController extends Controller
{
    
    public function indexAction()
    {
        
        $user=new User();
        $rol=new RolSistema();
        $opciones=new OpcionSistema();
        
        $user = $this->get('security.context')->getToken()->getUser();
        
        if($user!='anon.'){
            $rol=$user->getRol();
            $opciones=$rol->getOpcionesSistema();            
        }
        
       // $rol=$user->getRol();
        //    $opciones=$rol->getOpcionesSistema();
        
        //$opcDao=new OpcionSistemaDao($this->getDoctrine());
        //$opciones=$opcDao->getOpciones();        
        
        $peticion =$this->getRequest();
        $sesion = $peticion->getSession();
        $sesion->set('opciones', $opciones);
        
        return $this->render('ISRISidPlaBundle:Default:index.html.twig', array('opciones' => $opciones)); 
            
        
        
        
    }
}
