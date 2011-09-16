<?php

namespace ISRI\SidPla\GestionPaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ISRISidPlaGestionPaoBundle:Default:index.html.twig', array('name' => $name));
    }
}
