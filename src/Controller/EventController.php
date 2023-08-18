<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    private EventRepository $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    #[Route('/events', name: 'events')]
    public function events(): Response
    {
        return $this->render('content/events.html.twig', [
            'events' => $this->eventRepository->getAllEvents(),
        ]);
    }

    public function nextEventIfApplicable(): Response
    {
        return $this->render('sidebar/next-event.html.twig', [
            'event' => $this->eventRepository->getNextEventOnly(),
        ]);
    }
}
