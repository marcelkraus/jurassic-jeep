<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CampaignController extends AbstractController
{
    public function kinopolisLaunchWeekend2022(): Response
    {
        return $this->render('content/campaigns/kinopolis-launch-weekend-2022.html.twig');
    }
}
