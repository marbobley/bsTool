<?php

namespace App\Controller;

use App\Message\SendMeteo;
use App\MessageHandler\SendMeteoHandler;
use App\Model\City;
use App\Service\BlueService;
use App\Service\CityService;
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
        /*$jsonPath = $this->getParameter('app.jsonpath');

        $cityJson = CityService::ReadCityJson($jsonPath);
        $cities = CityService::JsonToCities($cityJson);

        $city_1 = $cities->cities[array_rand($cities->cities)];

        $lattitude = $city_1["latitude"];
        $longitude = $city_1["longitude"];

        $meteoString = MeteoService::GetMeteo($lattitude,$longitude);

        $finalString = $city_1["label"] . " : " . $meteoString;*/


        $bus->dispatch(new SendMeteo());

       /* $passwordApi = $this->getParameter('app.passwordapi');
        
        $latitude = 48.866667;
        $longitude = 2.333333;    


        $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        BlueService::SendMessage($meteoString, 'meteosymfony.bsky.social' , $passwordApi );*/

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'meteoCities' => "C'est peut être parti ou non",
        ]);
    }
}
