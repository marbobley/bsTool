<?php

namespace App\MessageHandler;

use App\Message\SendMeteo;
use App\Model\Cities;
use App\Service\BlueService;
use App\Service\CityService;
use App\Service\MeteoService;
use App\Service\SerializerJsonService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendMeteoHandler
{
    private CityService $cityServer ;
    private SerializerJsonService $serializerJson ;

    public function __construct(
        private CityService $cityService,
        private BlueService $blueService,
        private MeteoService $meteoService

    )
    {
        
    }

    public function __invoke(SendMeteo $message): void
    {
        $cities = $this->cityService->getCities();

        $city_1 = $cities->cities[array_rand( $cities->cities)];

        $latitude = $city_1->latitude;
        $longitude = $city_1->longitude;

         $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        $finalString = $city_1->label . " : " . $meteoString;

        // do something with your message
        ///Passer le paramètre via le service
        $passwordApi = $_ENV['PASSWORD_API'];

        $this->blueService->SendMessage($finalString, 'meteosymfony.bsky.social' , $passwordApi );/**/

    }
}
