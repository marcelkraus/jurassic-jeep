<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StaticContentController extends AbstractController
{
    public function baseVehicle(): Response
    {
        return $this->render('content/base-vehicle.html.twig');
    }

    public function contact(): Response
    {
        return $this->render('content/contact.html.twig');
    }

    public function equipment(): Response
    {
        return $this->render('content/equipment.html.twig');
    }

    public function gallery(): Response
    {
        return $this->render('content/gallery.html.twig');
    }

    public function history(): Response
    {
        return $this->render('content/history.html.twig');
    }

    public function leasing(): Response
    {
        return $this->render('content/leasing.html.twig');
    }
}
