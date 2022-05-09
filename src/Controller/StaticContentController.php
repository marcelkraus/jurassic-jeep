<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StaticContentController extends AbstractController
{
    public function events(): Response
    {
        return $this->render('content/events.html.twig');
    }

    public function homepage(): Response
    {
        return $this->render('content/homepage.html.twig');
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
