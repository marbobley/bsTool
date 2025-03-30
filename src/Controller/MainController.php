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
        $jsonPath = $this->getParameter('app.jsonpath');

        $cityJson = CityService::ReadCityJson($jsonPath);
        $cities = CityService::JsonToCities($cityJson);

        $city_1 = $cities->cities[0];
        $city_2 = $cities->cities[1];
        $city_3 = $cities->cities[2];

        $meteoString_1 = MeteoService::GetMeteo($city_1["latitude"],$city_1["longitude"]);
        $meteoString_2 = MeteoService::GetMeteo($city_2["latitude"],$city_2["longitude"]);
        $meteoString_3 = MeteoService::GetMeteo($city_3["latitude"],$city_3["longitude"]);

        $meteoCities = 
        $city_1["label"] . " : " . $meteoString_1 .
        $city_2["label"] . " : " . $meteoString_2 .
        $city_3["label"] . " : " . $meteoString_3 ;

        /*$bus->dispatch(new SendMeteo());*/

       /* $passwordApi = $this->getParameter('app.passwordapi');
        
        $latitude = 48.866667;
        $longitude = 2.333333;    


        $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        BlueService::SendMessage($meteoString, 'meteosymfony.bsky.social' , $passwordApi );*/

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'meteoCities' => $meteoCities,
        ]);
    }
}
