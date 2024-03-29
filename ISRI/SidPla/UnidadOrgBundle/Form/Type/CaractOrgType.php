<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ISRI\SidPla\UnidadOrgBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Doctrine\ORM\EntityRepository;

/**
 * Description of CaractOrgType
 *
 * @author bgonzalez
 */
class CaractOrgType extends AbstractType {
    
    public function buildForm(FormBuilder $builder, array $opciones)
    {
        //$builder->add('unidadOrganizativa',  'entity',  array( 'class' => 'MinSal\\SidPla\\AdminBundle\\Entity\\UnidadOrganizativa')); 
        $builder->add('mision', 'textarea');
        $builder->add('vision', 'textarea');
        $builder->add('funcionPrincipal', 'textarea');
        $builder->add('objetivoGeneral', 'textarea');  
        $builder->add('idCaractOrg', 'hidden');  
    }

    public function getName()
    {
        return 'caractOrg';
    }
}

?>
