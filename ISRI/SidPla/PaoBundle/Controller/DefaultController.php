<?php

namespace ISRI\SidPla\PaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('ISRISidPlaPaoBundle:Default:index.html.twig', array('name' => $name));
    }
}
