<?php

namespace App\Controller;

use App\Message\SendMeteo;
use App\MessageHandler\SendMeteoHandler;
use App\Service\BlueService;
use App\Service\MeteoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(MessageBusInterface $bus): Response
    {

        $bus->dispatch(new SendMeteo());

       /* $passwordApi = $this->getParameter('app.passwordapi');
        
        $latitude = 48.866667;
        $longitude = 2.333333;    


        $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        BlueService::SendMessage($meteoString, 'meteosymfony.bsky.social' , $passwordApi );*/

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'meteoString' => 'meteo',
        ]);
    }
}
