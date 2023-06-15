<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VehicleContentController extends AbstractController
{
    #[Route('/der-jeep-im-detail', name: 'vehicle')]
    public function index(): Response
    {
        return $this->render('content/vehicle/index.html.twig');
    }

    #[Route('/der-jeep-im-detail/die-nebelscheinwerfer', name: 'vehicle_fog_lights')]
    public function fogLights(): Response
    {
        return $this->render('content/vehicle/fog-lights.html.twig');
    }

    #[Route('/der-jeep-im-detail/die-lackierung', name: 'vehicle_paintjob')]
    public function paintjob(): Response
    {
        return $this->render('content/vehicle/paintjob.html.twig');
    }

    #[Route('/der-jeep-im-detail/die-verkleidungen', name: 'vehicle_panels')]
    public function panels(): Response
    {
        return $this->render('content/vehicle/panels.html.twig');
    }

    #[Route('/der-jeep-im-detail/die-felgen-und-reifen', name: 'vehicle_rims')]
    public function rims(): Response
    {
        return $this->render('content/vehicle/rims.html.twig');
    }

    #[Route('/der-jeep-im-detail/die-sitze-und-teppiche', name: 'vehicle_seats')]
    public function seats(): Response
    {
        return $this->render('content/vehicle/seats.html.twig');
    }

    #[Route('/der-jeep-im-detail/das-softtop-mit-halbtueren', name: 'vehicle_softtop')]
    public function softtop(): Response
    {
        return $this->render('content/vehicle/softtop.html.twig');
    }
}
