<?php 
namespace App\Model;

class City
{
	public string $insee_code;
	public string $city_code;
	public string $zip_code;
	public string $label;
	public string $latitude;
	public string $longitude;
	public string $department_name;
	public string $department_number;
	public string $region_name;
	public string $region_geojson_name;
/*    
        "insee_code": "25620",
        "city_code": "ville du pont",
        "zip_code": "25650",
        "label": "ville du pont",
        "latitude": "46.999873398",
        "longitude": "6.498147193",
        "department_name": "doubs",
        "department_number": "25",
        "region_name": "bourgogne-franche-comt\u00e9",
        "region_geojson_name": "Bourgogne-Franche-Comt\u00e9"*/

/*	public function __construct(
		string $insee_code,
		string $city_code,
		string $zip_code,
		string $label,
		string $latitude,
		string $longitude,
		string $department_name,
		string $department_number,
		string $region_name,
		string $region_geojson_name
	) {
		$this->insee_code = $insee_code;
		$this->city_code = $city_code;
		$this->zip_code = $zip_code;
		$this->label = $label;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->department_name = $department_name;
		$this->department_number = $department_number;
		$this->region_name = $region_name;
		$this->region_geojson_name = $region_geojson_name;
	}*/
}