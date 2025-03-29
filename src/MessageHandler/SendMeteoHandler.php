<?php

namespace App\MessageHandler;

use App\Message\SendMeteo;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class SendMeteoHandler
{
    public function __invoke(SendMeteo $message): void
    {
        // do something with your message
    }
}
