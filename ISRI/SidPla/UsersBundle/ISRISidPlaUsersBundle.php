<?php

namespace ISRI\SidPla\UsersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ISRISidPlaUsersBundle extends Bundle
{
     public function getParent()
    {
        return 'FOSUserBundle';
    }
    
}
