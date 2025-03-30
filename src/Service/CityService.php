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
    private Cities $cities ;

    public function __construct(SerializerJsonService $serializer)
    {        
        $this->cities = $serializer->GetCity($_ENV['JSON_PATH']);
    }
    
    public function getCities() : Cities
    {
        return $this->cities;
    }
}