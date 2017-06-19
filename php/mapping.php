<!-- <!DOCTYPE html>
<html>
<head>
	<title>abc</title>
	<meta charset="utf-8">


	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
</head>
<body> -->

	

	<?php
	include_once 'findCity.php';

class CityPOI{
	public $main_image;
	public $title;
	public $short_description;
	public $description;
	public $wiki_page_link;
	public $latitude;
	public $longitude;
	public $google_maps_link;


	/**
	 * Class Constructor
	 * @param    $name   
	 * @param    $main_image   
	 * @param    $title   
	 * @param    $short_description   
	 * @param    $description   
	 * @param    $wiki_page_link   
	 * @param    $latitude   
	 * @param    $longitude   
	 */
	public function __construct($main_image, $title, $short_description, $description, $wiki_page_link, $latitude, $longitude,$google_maps_link)
	{
		$this->main_image = $main_image;
		$this->title = $title;
		$this->short_description = $short_description;
		$this->description = $description;
		$this->wiki_page_link = $wiki_page_link;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
		$this->google_maps_link=$google_maps_link;
	}
}



$toCity = findCityName($to_airport);



$curl2 = curl_init();
curl_setopt_array($curl2, array(
	CURLOPT_URL => "https://api.sandbox.amadeus.com/v1.2/points-of-interest/yapq-search-circle?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&latitude=".$toCity->latitude."&longitude=".$toCity->longitude."&radius=42",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"postman-token: fb0d6f62-5ee3-f4b2-854e-69c1e313d240"
		),
	));

$response = curl_exec($curl2);
$err = curl_error($curl2);

curl_close($curl2);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
  // echo $response;
	$list_Of_POI = array();
	$response_decode = json_decode($response);
	foreach ($response_decode->points_of_interest as $key => $POI) {
		$POI = new CityPOI($POI->main_image,$POI->title,$POI->details->short_description,$POI->details->description,$POI->details->wiki_page_link,$POI->location->latitude,$POI->location->longitude,$POI->location->google_maps_link);
		array_push($list_Of_POI, $POI);
	}
// echo "<pre>";
// print_r($list_Of_POI);
// echo "<pre>";
}



?>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
	jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDxli8lTnJwRaHVl3ijzXUoUOQT2lXySZo&sensor=false&callback=initialize";
    document.body.appendChild(script);
});

	function initialize() {
		var map;
		var bounds = new google.maps.LatLngBounds();
		var mapOptions = {
			mapTypeId: 'hybrid',
			zoomControl: true,
			mapTypeControl: true,
			scaleControl: true,
			streetViewControl: true,
			rotateControl: true,
			fullscreenControl: true
		};

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);

    //Multiple Markers
    var markers = [
    <?php foreach ($list_Of_POI as $key => $POI) {
    	echo "[\"$POI->title'\",$POI->latitude,$POI->longitude ],";
    } ?>
    ];
      // alert(markers);                  
    // Info Window Content
    var infoWindowContent = [	
    <?php 
    foreach ($list_Of_POI as $key1 => $POI1) { 
    	$clean_description = str_replace('"','',$POI1->short_description);
    	echo "['<div class=\"info_content\" style=\"width: 650px; \">' +
    	'<img src = \"$POI1->main_image\" style=\"float: left;padding-right: 10px; width: 220px; height: 220px;\">'+
    	\"<h3 >$POI1->title</h3>\" +
    	\"<p style='padding-left: 224px; font-size: large;''> $clean_description </p>\"+ 
    	\"<a href='$POI1->wiki_page_link' style='padding-right: 25px;color: green;    font-size: 15px;font-weight: normal;' target='_blank'>Wikipedia pages</a>\"+'<a href=\"$POI1->google_maps_link\" style=\"color: red;    font-size: 15px;font-weight: normal;\"> View on Google Maps </a>'+       '</div>'],";
    }


    ?>
    ];

        // alert(infoWindowContent);
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
    	var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
    	bounds.extend(position);
    	marker = new google.maps.Marker({
    		position: position,
    		map: map,
    		title: markers[i][0]
    	});

        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
        	return function() {
        		infoWindow.setContent(infoWindowContent[i][0]);
        		infoWindow.open(map, marker);
        	}
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    	this.setZoom(14);
    	google.maps.event.removeListener(boundsListener);
    });
    
}
</script>
<!-- <a href=""></a>
</body>
</html>
 -->