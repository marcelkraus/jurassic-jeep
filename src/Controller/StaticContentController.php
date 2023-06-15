<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticContentController extends AbstractController
{
    #[Route('/events', name: 'events')]
    public function events(): Response
    {
        return $this->render('content/events.html.twig');
    }

    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        return $this->render('content/homepage.html.twig');
    }

    #[Route('/die-historie-des-jeep', name: 'history')]
    public function history(): Response
    {
        return $this->render('content/history.html.twig');
    }

    #[Route('/den-jeep-mieten', name: 'leasing')]
    public function leasing(): Response
    {
        return $this->render('content/leasing.html.twig');
    }
}
