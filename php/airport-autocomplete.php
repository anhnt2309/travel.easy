<?php

$from = $_GET['from-location'];

if($from == "da lat"){
	$from = "dli";
}

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://api.sandbox.amadeus.com/v1.2/airports/autocomplete?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&term=".$from,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_FOLLOWLOCATION=> TRUE,
	CURLOPT_SSL_VERIFYPEER=> false,
	));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo $response;
	if($response != null){
		$response_array = json_decode($response);
		echo" <datalist id='airport'>";
		foreach ($response_array as $key => $value) {
			$airportName = strtok($value->label, '[');
			$cityName = strtok($value->label, '-');
			$cityName = strtok($cityName, '[');


			echo "<option value='".$cityName." (" .$value->value.")'>". $airportName ."</option>";
			// echo $value->value ." -- ". $first ."<br>";
		}
		echo "</datalist>";
		// echo $response;

	}
}

?>