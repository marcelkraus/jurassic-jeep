<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalContentController extends AbstractController
{
    #[Route('/impressum', name: 'imprint')]
    public function imprint(): Response
    {
        return $this->render('content/legal/imprint.html.twig');
    }

    #[Route('/datenschutz', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('content/legal/privacy.html.twig');
    }
}
