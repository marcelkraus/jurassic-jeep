<?php

namespace App\Controller;

use Contentful\Core\Exception\NotFoundException;
use Contentful\Delivery\Client\ClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/events', name: 'events')]
    public function events(): Response
    {
        return $this->render('content/events.html.twig');
    }
}
