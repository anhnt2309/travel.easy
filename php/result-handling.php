<!DOCTYPE html>
<html>
<head>
	<title>result test</title>
	<meta charset="utf-8">
	<?php 
	$from_airport = $_GET["from_airport"];
	$to_airport = $_GET["to_airport"];
	$start_date = $_GET["start_date"];
	$end_date = $_GET["end_date"];
	$classes = $_GET["classes"];
	$adults = $_GET["adults"];
	$children = $_GET["children"];
	$infants = $_GET["infants"];
	$currency = $_GET["currency"];
	$maxPrice = $_GET["maxPrice"];
	$nonstop = $_GET["nonstop"];
	if ($nonstop != "true") {
		$nonstop="false";
	}
	$url = "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&origin=".$from_airport."&destination=".$to_airport."&departure_date=".$start_date."&return_date=". $end_date."&adults=".$adults."&children=".$children."&infants=".$infants."&nonstop=".$nonstop."&max_price=".$maxPrice."&currency=".$currency."&travel_class=".$classes;
	//get airport code only
	$from_airport = substr($from_airport, strpos($from_airport, '(') +1);
	$from_airport = strtok($from_airport, ')');

	$to_airport = substr($to_airport, strpos($to_airport, '(') +1);
	$to_airport = strtok($to_airport, ')');

	if ($maxPrice ==""){
		$url = "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&origin=".$from_airport."&destination=".$to_airport."&departure_date=".$start_date."&return_date=". $end_date."&adults=".$adults."&children=".$children."&infants=".$infants."&nonstop=".$nonstop."&currency=".$currency."&travel_class=".$classes;
	}

	if($end_date =="" ){
		$url = "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&origin=".$from_airport."&destination=".$to_airport."&departure_date=".$start_date."&adults=".$adults."&children=".$children."&infants=".$infants."&nonstop=".$nonstop."&max_price=".$maxPrice."&currency=".$currency."&travel_class=".$classes;
	}

	if($end_date =="" &&$maxPrice ==""){
		$url = "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&origin=".$from_airport."&destination=".$to_airport."&departure_date=".$start_date."&adults=".$adults."&children=".$children."&infants=".$infants."&nonstop=".$nonstop."&currency=".$currency."&travel_class=".$classes;
	}

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
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
		// print_r($response);
		$response_array = json_decode($response);
		echo '<pre>';
		
		echo '</pre>';
		echo $response_array->currency;

			// echo $response_array->results[0]->itineraries[0]->outbound->flights[0]->departs_at;
		foreach ( $response_array->results as $key => $value) {

			foreach ($value->itineraries as $key => $value1) {
				foreach ($value1->outbound->flights as $key => $value_flights_detail) {
					echo '</br>';
					echo 'outbound</br>';

					echo $value_flights_detail->arrives_at;
					echo '</br>';

					echo $value_flights_detail->departs_at;
					echo '</br>';

					echo $value_flights_detail->origin->airport;
					echo '</br>';

					echo $value_flights_detail->origin->terminal;
					echo '</br>';

					echo $value_flights_detail->destination->airport;
					echo '</br>';

					echo $value_flights_detail->marketing_airline;
					echo '</br>';

					echo $value_flights_detail->operating_airline;
					echo '</br>';

					echo $value_flights_detail->flight_number;
					echo '</br>';

					echo $value_flights_detail->aircraft;
					echo '</br>';
				}
				foreach ($value1->inbound->flights as $key => $value_flights_detail2) {
					echo '</br>';
					echo 'inbound</br>';

					echo $value_flights_detail2->arrives_at;
					echo '</br>';

					echo $value_flights_detail2->departs_at;
					echo '</br>';

					echo $value_flights_detail2->origin->airport;
					echo '</br>';

				// echo $value->origin->terminal;
				// echo '</br>';

					echo $value_flights_detail2->destination->airport;
					echo '</br>';

					echo $value_flights_detail2->marketing_airline;
					echo '</br>';

					echo $value_flights_detail2->operating_airline;
					echo '</br>';

					echo $value_flights_detail2->flight_number;
					echo '</br>';

					echo $value_flights_detail2->aircraft;
					echo '</br>';
				}
			}
		// foreach ($value->fare as $key => $value_fare) {
			echo '</br>';
			echo 'Fare</br>';

			echo 'total_price: ';
			echo $value->fare->total_price;
			echo '</br>';

			echo 'price_per_adult-------- ';
			echo '</br>';
			echo 'total_fare: ';
			echo $value->fare->price_per_adult->total_fare;
			echo '</br>';

			echo 'tax: ';
			echo $value->fare->price_per_adult->tax;
			echo '</br>';

			echo 'price_per_infant----- ';
			echo '</br>';
			echo 'total_fare: ';
			echo $value->fare->price_per_infant->total_fare;
			echo '</br>';

			echo 'tax: ';
			echo $value->fare->price_per_infant->tax;
			echo '</br>';

		// }

	}
}
	


	?>


</head>
<body>
	<p id="txt">test</p>
</body>
</html>