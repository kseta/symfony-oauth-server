<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @RouteResource("welcome")
 */
class WelcomeController extends FOSRestController
{
    public function getAction()
    {
        return ["welcome!"];
    }
}
