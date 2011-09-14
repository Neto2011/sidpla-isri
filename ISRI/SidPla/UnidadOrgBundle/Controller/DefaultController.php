<?php

namespace ISRI\SidPla\UnidadOrgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ISRISidPlaUnidadOrgBundle:Default:index.html.twig', array('name' => $name));
    }
}
