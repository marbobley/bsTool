<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {

        $passwordApi = $this->getParameter('app.passwordapi');


        /*$api = new \potibm\Bluesky\BlueskyApi('marbobley.bsky.social', '$passwordApi');
        $postService = new \potibm\Bluesky\BlueskyPostService($api);
        $post = \potibm\Bluesky\Feed\Post::create('✨ example mentioning @atproto.com to share the URL 👨‍❤️‍👨 https://en.wikipedia.org/wiki/CBOR.');
        $response = $api->createRecord($post);*/


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'passwordApi' => $passwordApi,
        ]);
    }
}
