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
    private Cities $cities ;
    private SerializerJsonService $serializerJson ;

    public function __construct(SerializerJsonService $serializerJson)
    {
        $this->$serializerJson = $serializerJson;

       // $this->cityServer = new CityService();
        //$this->cities = $this->cityServer->getCities($_ENV['JSON_PATH']);
    }

    public function __invoke(SendMeteo $message): void
    {
        $jsonPath = $_ENV['JSON_PATH'];

        $serviceCity = new CityService($this->serializerJson);

        $cities = $serviceCity->getCities();

        $city_1 = $this->cities->cities[array_rand( $this->cities->cities)];

        $latitude = $city_1["latitude"];
        $longitude = $city_1["longitude"];

        $meteoString = MeteoService::GetMeteo($latitude,$longitude);

        $finalString = $city_1["label"] . " : " . $meteoString;

        // do something with your message
        $passwordApi = $_ENV['PASSWORD_API'];

        BlueService::SendMessage($finalString, 'meteosymfony.bsky.social' , $passwordApi );

    }
}
