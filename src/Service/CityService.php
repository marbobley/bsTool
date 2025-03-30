<?php 

namespace App\Service;

use App\Model\Cities;
use App\Model\City;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class CityService 
{
    public static function ReadCityJson(string $jsonPath)
    {
        $filesystem = new Filesystem();

        $json = $filesystem->readFile($jsonPath);

        return $json;
    }

    public static function JsonToCities(string $jsonData)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->deserialize($jsonData, Cities::class, 'json');
    }
}