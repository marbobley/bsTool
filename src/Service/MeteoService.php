<?php
namespace App\Service;

class MeteoService{
    public static function GetMeteo(float $latitude, float $longitude): string{
        $httpClient = new \Http\Adapter\Guzzle7\Client();
        $openMeteo = new \PhpWeather\Provider\OpenMeteo\OpenMeteo($httpClient);

        // search on map : 47.873, 8.004.
        /*$latitude = 43.688371;
        $longitude = 3.579329;*/

        
       /* $latitude = 48.866667;
        $longitude = 2.333333;   */     

        $currentWeatherQuery = \PhpWeather\Common\WeatherQuery::create($latitude, $longitude);
        $currentWeather = $openMeteo->getCurrentWeather($currentWeatherQuery);

        return sprintf("Temperature à Paris : %u C° , vent : %u km/h", $currentWeather->getTemperature() , $currentWeather->getWindSpeed());
    }
}