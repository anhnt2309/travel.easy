<<?php 
	class Flight{
		public $type;
		public $departs_at;
		public $arrives_at;
		public $origin_airport;
		public $destination_airport;
		public $marketing_airline;
		public $operating_airline;
		public $flight_number;
		public $aircraft;
		public $total_price;
		public $price_per_adult;
		public $price_per_infant;
		public $refundable;
		public $change_penalties;


	/**
	 * Class Constructor
	 * @param    $type   
	 * @param    $departs_at   
	 * @param    $arrives_at   
	 * @param    $origin_airport   
	 * @param    $destination_airport   
	 * @param    $marketing_airline   
	 * @param    $operating_airline   
	 * @param    $flight_number   
	 * @param    $total_price   
	 * @param    $price_per_adult   
	 * @param    $price_per_infant   
	 * @param    $refundable   
	 * @param    $change_penalties   
	 */
	public function __construct($type, $departs_at, $arrives_at, $origin_airport, $destination_airport, $marketing_airline, $operating_airline, $flight_number,$aircraft, $total_price, $price_per_adult, $price_per_infant, $refundable, $change_penalties)
	{
		$this->type = $type;
		$this->departs_at = $departs_at;
		$this->arrives_at = $arrives_at;
		$this->origin_airport = $origin_airport;
		$this->destination_airport = $destination_airport;
		$this->marketing_airline = $marketing_airline;
		$this->operating_airline = $operating_airline;
		$this->flight_number = $flight_number;
		$this->aircraft = $aircraft;
		$this->total_price = $total_price;
		$this->price_per_adult = $price_per_adult;
		$this->price_per_infant = $price_per_infant;
		$this->refundable = $refundable;
		$this->change_penalties = $change_penalties;
	}

	}

	class HasStopFlight{
		public $firstHalfFlight;
		public $secondHalfFlight;

		public function __construct($firstHalfFlight,$secondHalfFlight){
			$this->firstHalfFlight = $firstHalfFlight;
			$this->secondHalfFlight= $secondHalfFlight;
		}
	}

	class ReturnFlight{
		public $departFlight;
		public $returnFlight;
		public function __construct($departFlight,$returnFlight){
			$this->departFlight = $departFlight;
			$this->returnFlight= $returnFlight;
		}
	}



 ?>