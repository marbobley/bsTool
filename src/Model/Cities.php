<?php
namespace App\Model;
use App\Model\City;

class Cities
{
	/** @var City[] */
	public array $cities;

	/**
	 * @param City[] $cities
	 */
	public function __construct(array $cities)
	{
		$this->cities = $cities;
	}
} 