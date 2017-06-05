<!DOCTYPE html>
<html>
<head>
	<title>result test</title>
	<meta charset="utf-8">
	<link rel="stylesheet" media="all" type="text/css" href="../css/result-holder.css">
	

</head>
<body>
<?php 
	include 'result-model.php';
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
		$allFlight = array();
	
		$currency= $response_array->currency;
		if(strcasecmp($currency,"VND") ==0){
			$currency = "₫";
		}

			// echo $response_array->results[0]->itineraries[0]->outbound->flights[0]->departs_at;
		foreach ( $response_array->results as $key => $value) {
			$flights_with_same_price = array();
			// $firstHalfFlight =null;
			foreach ($value->itineraries as $key => $value1) {
				
				foreach ($value1->outbound->flights as $key => $value_flights_detail) {
					// echo '</br>';
					// echo 'outbound</br>';


					// echo $value_flights_detail->arrives_at;
					// echo '</br>';

					// echo $value_flights_detail->departs_at;
					// echo '</br>';

					// echo $value_flights_detail->origin->airport;
					// echo '</br>';

					// // echo $value_flights_detail->origin->terminal;
					// // echo '</br>';

					// echo $value_flights_detail->destination->airport;
					// echo '</br>';

					// echo $value_flights_detail->marketing_airline;
					// echo '</br>';

					// echo $value_flights_detail->operating_airline;
					// echo '</br>';

					// echo $value_flights_detail->flight_number;
					// echo '</br>';

					// echo $value_flights_detail->aircraft;
					// echo '</br>';


					if(strcasecmp($value_flights_detail->destination->airport,$to_airport) ==0 && strcasecmp($value_flights_detail->origin->airport,$from_airport) ==0){
						$outboundFlight = new Flight('outbound',$value_flights_detail->arrives_at,$value_flights_detail->departs_at,$value_flights_detail->origin->airport,$value_flights_detail->destination->airport,$value_flights_detail->marketing_airline,$value_flights_detail->operating_airline,$value_flights_detail->flight_number,$value_flights_detail->aircraft,0,0,0,true,true);
					// echo $outboundFlight->type;
					// print_r($outboundFlight);
						array_push($flights_with_same_price,$outboundFlight);
						// echo "<br>";
						// echo "array size: " .count($flights_with_same_price);
						// echo "<br>";

					// array_push($allFlight, $flights_with_same_price);
					}
					else{
						if(strcasecmp($value_flights_detail->origin->airport,$from_airport) ==0 && strcasecmp($value_flights_detail->destination->airport,$to_airport) !=0){
							$firstHalfFlight = new Flight('outbound',$value_flights_detail->departs_at,$value_flights_detail->arrives_at,$value_flights_detail->origin->airport,$value_flights_detail->destination->airport,$value_flights_detail->marketing_airline,$value_flights_detail->operating_airline,$value_flights_detail->flight_number,$value_flights_detail->aircraft,0,0,0,true,true);

						}
						if(strcasecmp($value_flights_detail->origin->airport,$from_airport) !=0 &&strcasecmp($value_flights_detail->destination->airport,$to_airport) ==0){
							$secondHalfFlight = new Flight('outbound',$value_flights_detail->departs_at,$value_flights_detail->arrives_at,$value_flights_detail->origin->airport,$value_flights_detail->destination->airport,$value_flights_detail->marketing_airline,$value_flights_detail->operating_airline,$value_flights_detail->flight_number,$value_flights_detail->aircraft,0,0,0,true,true);
							$hasStopFlight = new HasStopFlight($firstHalfFlight,$secondHalfFlight);
							array_push($flights_with_same_price,$hasStopFlight);
						// echo "<br>";
						// echo "array size with stop: " .count($flights_with_same_price);
						// echo "<br>";
						// print "<pre>";
						// print_r($flights_with_same_price);
						// print "<pre>";
						}
					}
					

				}


				
				// foreach ($value1->inbound->flights as $key => $value_flights_detail2) {
				// 	echo '</br>';
				// 	echo 'inbound</br>';

				// 	echo $value_flights_detail2->arrives_at;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->departs_at;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->origin->airport;
				// 	echo '</br>';

				// // echo $value->origin->terminal;
				// // echo '</br>';

				// 	echo $value_flights_detail2->destination->airport;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->marketing_airline;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->operating_airline;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->flight_number;
				// 	echo '</br>';

				// 	echo $value_flights_detail2->aircraft;
				// 	echo '</br>';
				// }
			}
			array_push($allFlight, $flights_with_same_price);

		// foreach ($value->fare as $key => $value_fare) {
			// echo '</br>';
			// echo 'Fare</br>';

			// echo 'total_price: ';
			// echo $value->fare->total_price;
			// echo '</br>';

			// echo 'price_per_adult-------- ';
			// echo '</br>';
			// echo 'total_fare: ';
			// echo $value->fare->price_per_adult->total_fare;
			// echo '</br>';

			// echo 'tax: ';
			// echo $value->fare->price_per_adult->tax;
			// echo '</br>';

			// echo 'price_per_infant----- ';
			// echo '</br>';
			// echo 'total_fare: ';
			// echo $value->fare->price_per_infant->total_fare;
			// echo '</br>';

			// echo 'tax: ';
			// echo $value->fare->price_per_infant->tax;
			// echo '</br>';

			foreach ($flights_with_same_price as $outboundFlight_array) {
				if(strcasecmp(get_class($outboundFlight_array),"HasStopFlight") != 0){
					$outboundFlight_array->total_price = $value->fare->total_price/2;
					$outboundFlight_array->price_per_adult = $value->fare->price_per_adult->total_fare/2;
					$outboundFlight_array->price_per_infant = $value->fare->price_per_infant->total_fare;
					$outboundFlight_array->refundable = $value->fare->restrictions->refundable;
					$outboundFlight_array->change_penalties=$value->fare->restrictions->change_penalties;
				}
				else{
					$outboundFlight_array->firstHalfFlight->total_price = $value->fare->total_price /4;
					$outboundFlight_array->firstHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare/4;
					$outboundFlight_array->firstHalfFlight->price_per_infant = $value->fare->price_per_infant->total_fare/2;
					$outboundFlight_array->firstHalfFlight->refundable = $value->fare->restrictions->refundable;
					$outboundFlight_array->firstHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;

					$outboundFlight_array->secondHalfFlight->total_price = $value->fare->total_price/4;
					$outboundFlight_array->secondHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare /4;
					$outboundFlight_array->secondHalfFlight->price_per_infant =number_format( $value->fare->price_per_infant->total_fare/2);
					$outboundFlight_array->secondHalfFlight->refundable = $value->fare->restrictions->refundable;
					$outboundFlight_array->secondHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;
				}
			// print_r($outboundFlight_array);

			}
		// }

		}
		// echo "total size: " . count($allFlight);
		// print "<pre>";
		// print_r($allFlight);
		// print "<pre>";
		foreach ($allFlight as $allFlightOuter) {
			foreach ($allFlightOuter as $allFlights) {
			if(strcasecmp(get_class($allFlights),"HasStopFlight") != 0)	{
				//get hour
				$arrive_time = substr($allFlights->departs_at, strpos($allFlights->departs_at, 'T') +1);
				$departs_time = substr($allFlights->arrives_at, strpos($allFlights->arrives_at, 'T') +1);
				// $departs_time = date('h:i A', strtotime($departs_time));

				//get flight duration
				$departs_datetime = new DateTime($departs_time);
				$flight_duration_object = $departs_datetime->diff(new DateTime($arrive_time));

				$flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";

			echo "<article id='ARTICLE_1'>";
			echo '<div id="DIV_2">';
			echo '<div id="DIV_3">';
			echo '<div id="DIV_4">';
			echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
			echo '</div>';
			echo '</div>';
			echo '<section id="SECTION_7">';
			echo '<div id="DIV_8">';
			echo "<img src='"."http://pics.avs.io/80/40/".$allFlights->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' />";
			echo '</div>';
			echo '<div id="DIV_10">';
			echo '<div id="DIV_11">';
			echo "<span id='SPAN_12'><span id='SPAN_13'>".$departs_time."</span><span id='SPAN_14'>".$allFlights->origin_airport."</span></span>";
			echo '</div>';
			echo '<div id="DIV_15">';
			echo "<span id='SPAN_16'>".$flight_duration."</span>";
			echo '<ul id="UL_17">';
			echo '<li id="LI_18">';
			echo '</li>';
			echo '</ul>';
			echo '<div id="DIV_19">';
			echo "<span id='SPAN_20'>".$allFlights->operating_airline.$allFlights->flight_number."</span><span id='SPAN_21'></span>";
			echo '</div>';
			echo '</div>';
			echo '<div id="DIV_22">';
			echo "<span id='SPAN_23'><span id='SPAN_24'>".$arrive_time."</span><span id='SPAN_25'>".$allFlights->destination_airport."</span></span>";
			echo '</div>';
			echo '<div id="DIV_26">';
			echo '</div>';
			echo '</div>';
			echo '</section>';
			echo '<div class="leg-operator">Operated by Jetstar Pacific Airlines</div>';
			echo '</div>';
			echo '<aside id="ASIDE_27">';
			echo '</aside>';
			echo '<div id="DIV_28">';
			echo '<div id="DIV_29">';
			echo '<div id="DIV_30">';
			echo '<div id="DIV_31">';
			echo '<div id="DIV_32">';
			echo "<span id='SPAN_33'>"."<p>".$adults." adults  &#9892  ".$children." childrens  &#9892  ".$infants." infants</p>"."</span>";
			echo '<div id="DIV_34">';
			echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($allFlights->total_price).$currency."</a><br id='BR_37' />";
			echo '</div>';
			echo '</div><a href="#" title="Select" id="A_39"><span id="SPAN_40">Select</span><span id="SPAN_41"></span></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</article>';
			echo '<br>';
		}
		else{
			//get hour
				$arrive_time = substr($allFlights->firstHalfFlight->departs_at, strpos($allFlights->firstHalfFlight->departs_at, 'T') +1);
				$departs_time = substr($allFlights->secondHalfFlight->arrives_at, strpos($allFlights->secondHalfFlight->arrives_at, 'T') +1);
				// $departs_time = date('h:i A', strtotime($departs_time));

				//get flight duration
				$departs_datetime = new DateTime($departs_time);
				$flight_duration_object = $departs_datetime->diff(new DateTime($arrive_time));

				$flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";
				$total_hasstop_flight = $allFlights->firstHalfFlight->total_price + $allFlights->secondHalfFlight->total_price ;

			echo "<article id='ARTICLE_1'>";
			echo '<div id="DIV_2">';
			echo '<div id="DIV_3">';
			echo '<div id="DIV_4">';
			echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->firstHalfFlight->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
			echo '</div>';
			echo '</div>';
			echo '<section id="SECTION_7">';
			echo '<div id="DIV_8">';
			echo "<img src='"."http://pics.avs.io/80/40/".$allFlights->firstHalfFlight->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' />";
			echo '</div>';
			echo '<div id="DIV_10">';
			echo '<div id="DIV_11">';
			echo "<span id='SPAN_12'><span id='SPAN_13'>".$departs_time."</span><span id='SPAN_14'>".$allFlights->firstHalfFlight->origin_airport."</span></span>";
			echo '</div>';
			echo '<div id="DIV_15">';
			echo "<span id='SPAN_16'>".$flight_duration."</span>";
			echo '<ul id="UL_17">';
			echo '<li id="LI_18">';
			echo '<li class="stop-dot"></li>';
			echo '</li>';
			echo '</ul>';
			echo '<div id="DIV_19">';
			echo "<span id='SPAN_20' style='color:red'>"."1 Stop"."</span><span id='SPAN_21'></span>";
			echo '</div>';
			echo '</div>';
			echo '<div id="DIV_22">';
			echo "<span id='SPAN_23'><span id='SPAN_24'>".$arrive_time."</span><span id='SPAN_25'>".$allFlights->secondHalfFlight->destination_airport."</span></span>";
			echo '</div>';
			echo '<div id="DIV_26">';
			echo '</div>';
			echo '</div>';
			echo '</section>';
			echo '<div class="leg-operator">Operated by Jetstar Pacific Airlines</div>';
			echo '</div>';
			echo '<aside id="ASIDE_27">';
			echo '</aside>';
			echo '<div id="DIV_28">';
			echo '<div id="DIV_29">';
			echo '<div id="DIV_30">';
			echo '<div id="DIV_31">';
			echo '<div id="DIV_32">';
			echo "<span id='SPAN_33'>"."<p>".$adults." adults  &#9892  ".$children." childrens  &#9892  ".$infants." infants</p>"."</span>";
			echo '<div id="DIV_34">';
			echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($total_hasstop_flight)  .$currency."</a><br id='BR_37' />";
			echo '</div>';
			echo '</div><a href="#" title="Select" id="A_39"><span id="SPAN_40">Select</span><span id="SPAN_41"></span></a>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</article>';
			echo '<br>';
		}
		}
		}
	}
	


	?>

	<!-- <article id="ARTICLE_1">
		<div id="DIV_2">
			<div id="DIV_3">
				<div id="DIV_4">
					<img src="//logos.skyscnr.com/images/airlines/favicon/4V.png" alt="VietJet Air" id="IMG_5" /><span id="SPAN_6">VietJet Air</span>
				</div>
			</div>
			<section id="SECTION_7">
				<div id="DIV_8">
					<img src="//logos.skyscnr.com/images/airlines/small/4V.png" alt="VietJet Air" id="IMG_9" />
				</div>
				<div id="DIV_10">
					<div id="DIV_11">
						<span id="SPAN_12"><span id="SPAN_13">4:20 PM</span><span id="SPAN_14">SGN</span></span>
					</div>
					<div id="DIV_15">
						<span id="SPAN_16">0h 50m</span>
						<ul id="UL_17">
							<li id="LI_18">
							</li>
						</ul>
						<div id="DIV_19">
							<span id="SPAN_20">Non-stop</span><span id="SPAN_21"></span>
						</div>
					</div>
					<div id="DIV_22">
						<span id="SPAN_23"><span id="SPAN_24">5:10 PM</span><span id="SPAN_25">DLI</span></span>
					</div>
					<div id="DIV_26">
					</div>
				</div>
			</section>
		</div>
		<aside id="ASIDE_27">
		</aside>
		<div id="DIV_28">
			<div id="DIV_29">
				<div id="DIV_30">
					<div id="DIV_31">
						<div id="DIV_32">
							<span id="SPAN_33">6 deals from</span>
							<div id="DIV_34">
								<a href="#" id="A_35"><span id="SPAN_36"></span>414.000 ₫</a><br id="BR_37" /><a href="#" id="A_38">828.000 ₫ total</a>
							</div>
						</div><a href="#" title="Select" id="A_39"><span id="SPAN_40">Select</span><span id="SPAN_41"></span></a>
					</div>
				</div>
			</div>
		</div>
	</article> -->
</body>
</html>