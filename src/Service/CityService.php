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
    private ?Cities $cities = null; 

    public function __construct(private SerializerJsonService $serializer)
    {        

    }
    
    public function getCities() : Cities
    {
        if($this->cities === null)
        {
            $this->cities = $this->serializer->GetCity($_ENV['JSON_PATH']);
        }
        return $this->cities;
    }
}