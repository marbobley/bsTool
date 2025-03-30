<?php

namespace App\MessageHandler;

use App\Message\SendMeteo;
use App\Service\BlueService;
use App\Service\MeteoService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendMeteoHandler
{
    public function __invoke(SendMeteo $message): void
    {
        // do something with your message
        $passwordApi = $_ENV['PASSWORD_API'];
        
        $latitude = 48.866667;
        $longitude = 2.333333;    

        $meteoString = MeteoService::GetMeteo($latitude,$longitude);
        BlueService::SendMessage($meteoString, 'meteosymfony.bsky.social' , $passwordApi );
    }
}
