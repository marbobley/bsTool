<?php

namespace App\Controller;

use App\Message\SendMeteo;
use App\Service\BlueService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function index(MessageBusInterface $bus, BlueService $blueService): Response
    {       

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            /*'cid' => $response->getCid(),
            'uriblue' => $response->getUri(),*/
        ]);
    }

}
