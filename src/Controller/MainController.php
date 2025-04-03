<?php

namespace App\Controller;

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
        $passwordApi = $_ENV['PASSWORD_API']; ;
        //BlueService::SendMessage($finalString,  , $passwordApi );/**/
        //$response = $blueService->SendMessage("Hello" ,'meteosymfony.bsky.social',$passwordApi );
/** 
        cid : bafyreiaju2ej7zoeio3hoxukkpbl73j2er3rtyor3dphjlojpsuhq6665i
        uri : at://did:plc:p4eaqlry6f26os5aem25wuqb/app.bsky.feed.post/3llrm3sc3x52b
        did : did:plc:p4eaqlry6f26os5aem25wuqb
        ndis:app.bsky.feed.post
        3llrm3sc3x52b
**/
$blueService->AddMessage("", "Salute1");
/*$blueService->AddMessage($response->getUri(), "Salute1");
$blueService->QuoteMessage($response->getUri(), "Salute2");*/

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            /*'cid' => $response->getCid(),
            'uriblue' => $response->getUri(),*/
        ]);
    }

}
