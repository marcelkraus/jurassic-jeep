<?php

namespace App\Controller;

use \DateTime;
use Contentful\Core\Exception\NotFoundException;
use Contentful\Delivery\Client\ClientInterface;
use Contentful\Delivery\Query;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    #[Route('/events', name: 'events')]
    public function events(ClientInterface $client): Response
    {
        try {
            $query = new Query();
            $query
                ->setContentType('event')
                ->where('fields.endDate[gte]', new DateTime())
                ->orderBy('-fields.startingDate');
            $events = $client->getEntries($query);
        } catch (NotFoundException $contentfulException) {
            throw new NotFoundHttpException();
        }

        return $this->render('content/events.html.twig', [
            'events' => $events,
        ]);
    }

    public function nextEventIfApplicable(ClientInterface $client): Response
    {
        $query = new Query();
        $query
            ->setContentType('event')
            ->where('fields.endDate[gte]', new DateTime())
            ->orderBy('-fields.startingDate')
            ->where('limit', 1);
        $events = $client->getEntries($query);

        return $this->render('sidebar/next-event.html.twig', [
            'event' => isset($events[0]) ? $events[0] : null,
        ]);
    }

}