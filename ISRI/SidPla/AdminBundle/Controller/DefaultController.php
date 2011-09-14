<?php

namespace ISRI\SidPla\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $opciones=$this->getRequest()->getSession()->get('opciones');
        return $this->render('ISRISidPlaAdminBundle:Default:index.html.twig', array('opciones' => $opciones));
      
        
    }
}
