<?php 

namespace App\Service;

use App\Model\Cities;
use App\Model\City;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class SerializerJsonService 
{
    private $encoders = null;
    private $normalizers = null;
    private Serializer $serializer ;
    private string $jsonPath ;
    
    public function __construct()
    {
        $this->encoders = [new JsonEncoder()];
        $this->normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($this->normalizers, $this->encoders);        
    }

    public function GetCity(string $jsonPath): Cities
    {
        $jsonData = self::ReadCityJson($jsonPath);        
        return $this->serializer->deserialize($jsonData, Cities::class, 'json');
    }


    public static function ReadCityJson(string $jsonPath)
    {
        $filesystem = new Filesystem();
        $json = $filesystem->readFile($jsonPath);
        return $json;
    }
    
}