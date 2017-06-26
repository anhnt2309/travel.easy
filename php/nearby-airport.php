

<?php


// // Print header
// foreach (explode("\r\n",$headers) as $hdr)
//     printf('<p>Header: %s</p>', $hdr);

$latitude = $_GET["latitude"];
$longtitude = $_GET["longtitude"];

// echo $latitude ."<br>";
// echo "alert(".$longtitude.")";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sandbox.amadeus.com/v1.2/airports/nearest-relevant?apikey=B9YiDA5BMa8PnEOgWglAwAuRhAzF9A6q&latitude=".$latitude."&longitude=".$longtitude,
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
	$response_array = json_decode($response);
	echo" <datalist id='airport'>";
	foreach ($response_array as $key => $value) {
		# code...
		// echo "<div class='outtermost' value'".$value->city_name. " ( ".$value->airport.")". "'>";
		// echo "<div class='line1box' style=' display: flex;
		// 							    flex-wrap: wrap; /* optional. only if you want the items to wrap */
		// 							    justify-content: left; /* for horizontal alignment */
		// 							    align-items: center;
		// 							     /* for vertical alignment */
		// 							    '>";
		// echo "<div style='border-style: double;'>".$value->airport."</div><PRE>";
		// echo "<div>&nbsp".$value->airport_name."</div>";
		// echo "</div>";
		// echo "<div class='line2box' style=' display: flex;
		// 							    flex-wrap: wrap; /* optional. only if you want the items to wrap */
		// 							    justify-content: center; /* for horizontal alignment */
		// 							    align-items: center; /* for vertical alignment */'>";
		// echo "<div>".$value->city_name."</div><br>";
		// echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp".$value->distance."km</div><br>";
		// echo "</div><br><br>";
		// echo "</div>";
	echo "<option value='".$value->city_name." (" .$value->airport.")'>".$value->airport_name."( " .$value->distance. " km)" ."</option>";

	}
		
	
}



?>