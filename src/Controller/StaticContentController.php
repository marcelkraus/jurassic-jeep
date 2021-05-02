<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StaticContentController extends AbstractController
{
    public function history(): Response
    {
        return $this->render('base.html.twig');
    }
}
