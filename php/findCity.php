<?php
class City{
	/**
	 * Class Constructor
	 * @param    $name   
	 * @param    $country   
	 * @param    $latitude   
	 * @param    $longitude   
	 */
	public $name;
	public $country;
	public $latitude;
	public $longitude;
	public function __construct($name, $country, $latitude, $longitude)
	{
		$this->name = $name;
		$this->country = $country;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		
	}
}

function findCityName($to_airport){
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.sandbox.amadeus.com/v1.2/location/".$to_airport."?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: 09bc22fd-f5ab-b57b-dcf0-cb2f7a538b3a"
		),
	));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo "<pre>";
 //  print_r( $response);

 //  echo "<pre>";

	$response_array = json_decode($response);
	$response_count = json_decode($response,true);
	$numOfresult = count($response_count);
	if($numOfresult == 1){
		foreach ($response_array->airports as $key => $value) {
			if($key == 0){
				$toCity = new City($value->name,$value->country,$value->location->latitude,$value->location->longitude);
			}
		}
		
	}
	else{
		$toCity = new City($response_array->city->name,$response_array->city->country,$response_array->city->location->latitude,$response_array->city->location->longitude);
	}
  // echo $toCity->name;
  // echo $toCity->latitude;
  // echo $toCity->longitude;
}
return $toCity;
}

?>