<?php

namespace App\MessageHandler;

use App\Message\SendMeteo;
use App\Service\BlueService;
use App\Service\CityService;
use App\Service\MeteoService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendMeteoHandler
{
    public function __invoke(SendMeteo $message): void
    {
        $jsonPath = $_ENV['JSON_PATH'];

        $cityJson = CityService::ReadCityJson($jsonPath);
        $cities = CityService::JsonToCities($cityJson);

        $city_1 = $cities->cities[array_rand($cities->cities)];

        $latitude = $city_1["latitude"];
        $longitude = $city_1["longitude"];

        $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        $finalString = $city_1["label"] . " : " . $meteoString;

        // do something with your message
        $passwordApi = $_ENV['PASSWORD_API'];

        BlueService::SendMessage($finalString, 'meteosymfony.bsky.social' , $passwordApi );

    }
}
