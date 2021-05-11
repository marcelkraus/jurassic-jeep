<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class VehicleContentController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('content/vehicle/index.html.twig');
    }

    public function fogLights(): Response
    {
        return $this->render('content/vehicle/fog-lights.html.twig');
    }


    public function paintjob(): Response
    {
        return $this->render('content/vehicle/paintjob.html.twig');
    }

    public function panels(): Response
    {
        return $this->render('content/vehicle/panels.html.twig');
    }

    public function rims(): Response
    {
        return $this->render('content/vehicle/rims.html.twig');
    }

    public function seats(): Response
    {
        return $this->render('content/vehicle/seats.html.twig');
    }

    public function softtop(): Response
    {
        return $this->render('content/vehicle/softtop.html.twig');
    }
}
