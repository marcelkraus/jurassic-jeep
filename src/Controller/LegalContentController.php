<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LegalContentController extends AbstractController
{
    public function imprint(): Response
    {
        return $this->render('content/legal/imprint.html.twig');
    }

    public function privacy(): Response
    {
        return $this->render('content/legal/privacy.html.twig');
    }

    public function termsOfUse(): Response
    {
        return $this->render('content/legal/terms-of-use.html.twig');
    }
}
