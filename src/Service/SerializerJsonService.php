<?php 

namespace App\Service;

use App\Model\Cities;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerJsonService 
{
    private string $jsonPath ;
    private Cities $cities;
    
    public function __construct(
        private SerializerInterface $serializer , 
        private Filesystem $filesystem)
    {
          
    }

    public function GetCity(string $jsonPath): Cities
    {
        $jsonData = $this->ReadCityJson($jsonPath);         
        return $this->serializer->deserialize($jsonData, Cities::class, 'json');
    }

    private function ReadCityJson(string $jsonPath)
    {
        $json = $this->filesystem->readFile($jsonPath);
        return $json;
    }
    
}