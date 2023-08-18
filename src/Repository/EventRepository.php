<?php

namespace App\Repository;

use \DateTime;
use Contentful\Core\Exception\NotFoundException;
use Contentful\Core\Resource\ResourceArray;
use Contentful\Delivery\Client\ClientInterface;
use Contentful\Delivery\Query;

class EventRepository
{
    private ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    public function getAllEvents()
    {
        $query = $this->makeBaseQuery();

        return $this->client->getEntries($query);
    }

    public function getNextEventOnly(): mixed
    {
        $query = $this
            ->makeBaseQuery()
            ->where('limit', 1)
        ;

        $events = $this->client->getEntries($query);

        return isset($events[0]) ? $events[0] : null;
    }

    private function makeBaseQuery(): Query
    {
        $query = new Query();
        $query
            ->setContentType('event')
            ->where('fields.endDate[gte]', new DateTime())
            ->orderBy('-fields.startDate');

        return $query;
    }
}
