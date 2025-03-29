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

        $httpClient = new \Http\Adapter\Guzzle7\Client();
        $openMeteo = new \PhpWeather\Provider\OpenMeteo\OpenMeteo($httpClient);

        // search on map : 47.873, 8.004.
        /*$latitude = 43.688371;
        $longitude = 3.579329;*/

        
        $latitude = 48.866667;
        $longitude = 2.333333;        

        $currentWeatherQuery = \PhpWeather\Common\WeatherQuery::create($latitude, $longitude);
        $currentWeather = $openMeteo->getCurrentWeather($currentWeatherQuery);

        $meteoString = sprintf("Temperature à Paris : %u C° , vent : %u km/h", $currentWeather->getTemperature() , $currentWeather->getWindSpeed());

        $api = new \potibm\Bluesky\BlueskyApi('meteosymfony.bsky.social', $passwordApi);
        $postService = new \potibm\Bluesky\BlueskyPostService($api);
        $post = \potibm\Bluesky\Feed\Post::create($meteoString);
        $response = $api->createRecord($post);


        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'currentWeather' => $currentWeather,
        ]);
    }
}
