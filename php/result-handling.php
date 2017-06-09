<!DOCTYPE html>
<html>
<head>
	<title>result test</title>
	<meta charset="utf-8">
 <!-- Theme CSS -->
 <!-- <link rel="stylesheet" type="text/css" href="../css/agency.min.css"> -->
 <!-- Bootstrap Core CSS -->
<!--     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-iso.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" media="all" type="text/css" href="../css/result-holder.css">
    <link rel="stylesheet" media="all" type="text/css" href="../css/preloader.css">
    <link rel="stylesheet" media="all" type="text/css" href="../css/result_detail.css">


    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

    <script type="text/javascript">
	//Wait for window load
	$(window).on('load', function () {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
	$(document).ready(function(){
          $("#previous a").addClass("disable-button");
          var pageSize = 10;

          showPage = function(page) {
            $(".content").hide();
            $(".content").each(function(n) {
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();
          });        
       }

       showPage(1);

       $("#pagin li").click(function() {
          var total_Page = $("#pagin li").size();
          if(parseInt($(this).text()) == 1){
              $("#previous a").addClass("disable-button");
         }
         else{
          $("#previous a").removeClass("disable-button");
     }
     if(parseInt($(this).text()) == total_Page -2){
         $("#next a").addClass("disable-button");
    }else{
     $("#next a").removeClass("disable-button");
}

if($(this).text().match("Previous") || $(this).text().match("Next")){
   if($(this).text().match("Previous")){

     var current_Active = parseInt($(".is-active").text() );
     if(current_Active >1){
          if(current_Active == total_Page -2){
               $("#next a").removeClass("disable-button");
          }

          if(current_Active == 2){
               $("#previous a").removeClass("disable-button");
          }
          pre_Active = current_Active -1;
          $("#pagin li").removeClass("current");
          $("#pagin li").removeClass("is-active");
          $("#pagin li").each(function(n){
                              // alert($(this).text());
                              if(parseInt($(this).text()) ==pre_Active){
                               $(this).addClass("is-active");
                               showPage(pre_Active) ;
                          }

                     });
     }

}
if($(this).text().match("Next")){
    var current_Active = parseInt($(".is-active").text() );

    if(current_Active < total_Page -2){
     next_Active = current_Active +1;
     $("#pagin li").removeClass("current");
     $("#pagin li").removeClass("is-active");
     $("#pagin li").each(function(n){
                              // alert($(this).text());
                              if(parseInt($(this).text()) ==next_Active){
                               $(this).addClass("is-active");
                               $("#previous a").removeClass("disable-button");
                               showPage(next_Active) ;



                          }

                     });
}
if(current_Active == total_Page -3){
  $("#next a").addClass("disable-button");
}

}


}

else{
   $("#pagin li").removeClass("current");
   $("#pagin li").removeClass("is-active");
   $(this).addClass("current");
   $(this).addClass("is-active");
   showPage(parseInt($(this).text())) ;
}
});


  });


</script>
</head>
<body>
	<div class="se-pre-con">
        <!-- <script src="../js/typed.js"></script>
        <script>
          $(window).on('unload', function () {
            $(".typed-text").typed({
               strings: ["Across Airlines.^3000" ,"World Wide Filghts.^3000","Việt Nam.^5000"],
               typeSpeed: 0,
               startDelay: 500,
               backDelay: 500,
                              // // Fade out instead of backspace (must use CSS class)
                              // fadeOut: true,
                              // fadeOutClass: 'typed-fade-out',
                              // fadeOutDelay: 300, // milliseconds
                              // loop
                              loop: true,
                              // null = infinite
                              loopCount: null,
                              // show cursor
                              showCursor: true,
                              // character for cursor
                              cursorChar: "|",
                              // attribute to type (null == text)
                              attr: null,
                              // either html or text
                              contentType: 'html',
                         });
       });
  </script>

  <span class="typed-text "> </span> -->
</div>

<!-- Navigation -->

<!-- <div class='result-wrap'> -->
     <?php 
     include 'result-model.php';
     include 'find-airline.php';
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
     if(isset($_GET['nonstop'])){
         $nonstop = $_GET["nonstop"];
    }else{
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
         $isStopOutboundFlight=0;
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

              if(strcasecmp($value_flights_detail->destination->airport,$to_airport) ==0 && strcasecmp($value_flights_detail->origin->airport,$from_airport) ==0){
               $outboundFlight = new Flight('outbound',$value_flights_detail->arrives_at,$value_flights_detail->departs_at,$value_flights_detail->origin->airport,$value_flights_detail->destination->airport,$value_flights_detail->marketing_airline,$value_flights_detail->operating_airline,$value_flights_detail->flight_number,$value_flights_detail->aircraft,0,0,0,true,true);
					// echo $outboundFlight->type;
					// print_r($outboundFlight);
               if($end_date ==""){
                    array_push($flights_with_same_price,$outboundFlight);
               }
						// echo "<br>";
						// echo "array size: " .count($flights_with_same_price);
						// echo "<br>";

					// array_push($allFlight, $flights_with_same_price);
          }
          else{
               $isStopOutboundFlight =1;
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


 if($end_date !=""){
    foreach ($value1->inbound->flights as $key2 => $value_flights_detail2) {
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

     if(strcasecmp($value_flights_detail2->destination->airport,$from_airport) ==0 && strcasecmp($value_flights_detail2->origin->airport,$to_airport) ==0){ 

          $inboundFlight = new Flight('inbound',$value_flights_detail2->arrives_at,$value_flights_detail2->departs_at,$value_flights_detail2->origin->airport,$value_flights_detail2->destination->airport,$value_flights_detail2->marketing_airline,$value_flights_detail2->operating_airline,$value_flights_detail2->flight_number,$value_flights_detail2->aircraft,0,0,0,true,true);
                         // echo $outboundFlight->type;
                         // print_r($outboundFlight);
          if($isStopOutboundFlight !=1){
           $returnFlight = new ReturnFlight($outboundFlight,$inboundFlight);
      }
      else{
          $returnFlight = new ReturnFlight($hasStopFlight,$inboundFlight);
     }
     array_push($flights_with_same_price,$returnFlight);
                              // echo "<br>";
                              // echo "array size: " .count($flights_with_same_price);
                              // echo "<br>";

                         // array_push($allFlight, $flights_with_same_price);
}
else{

     if(strcasecmp($value_flights_detail2->origin->airport,$to_airport) ==0 && strcasecmp($value_flights_detail2->destination->airport,$from_airport) !=0){
          $inboundFirstHalfFlight = new Flight('inbound',$value_flights_detail2->departs_at,$value_flights_detail2->arrives_at,$value_flights_detail2->origin->airport,$value_flights_detail2->destination->airport,$value_flights_detail2->marketing_airline,$value_flights_detail2->operating_airline,$value_flights_detail2->flight_number,$value_flights_detail2->aircraft,0,0,0,true,true);

     }
     if(strcasecmp($value_flights_detail2->origin->airport,$to_airport) !=0 &&strcasecmp($value_flights_detail2->destination->airport,$from_airport) ==0){
          $inboundSecondHalfFlight = new Flight('inbound',$value_flights_detail2->departs_at,$value_flights_detail2->arrives_at,$value_flights_detail2->origin->airport,$value_flights_detail2->destination->airport,$value_flights_detail2->marketing_airline,$value_flights_detail2->operating_airline,$value_flights_detail2->flight_number,$value_flights_detail2->aircraft,0,0,0,true,true);
          $inboundHasStopFlight = new HasStopFlight($inboundFirstHalfFlight,$inboundSecondHalfFlight);
          if($isStopOutboundFlight !=1){
           $returnFlight = new ReturnFlight($outboundFlight,$inboundHasStopFlight);
      }
      else{
          $returnFlight = new ReturnFlight($hasStopFlight,$inboundHasStopFlight);
     }
     array_push($flights_with_same_price,$returnFlight);
                              // echo "<br>";
                              // echo "array size with stop: " .count($flights_with_same_price);
                              // echo "<br>";
                              // print "<pre>";
                              // print_r($flights_with_same_price);
                              // print "<pre>";
}
}
}
}
}

array_push($allFlight, $flights_with_same_price);


foreach ($flights_with_same_price as $outboundFlight_array) {

                                   //return flight
     if($end_date !=""){
      foreach ($outboundFlight_array as $key => $return_detail) {
                        # code...

          if(strcasecmp(get_class($return_detail),"HasStopFlight") != 0){
               $return_detail->total_price = $value->fare->total_price/2;
               $return_detail->price_per_adult = $value->fare->price_per_adult->total_fare/2;
               if($infants >0){
                    $return_detail->price_per_infant = $value->fare->price_per_infant->total_fare;
               }
               $return_detail->refundable = $value->fare->restrictions->refundable;
               $return_detail->change_penalties=$value->fare->restrictions->change_penalties;
          }
          else{
               $return_detail->firstHalfFlight->total_price = $value->fare->total_price /4;
               $return_detail->firstHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare/4;
               if($infants >0){
                    $return_detail->firstHalfFlight->price_per_infant = $value->fare->price_per_infant->total_fare/2;
               }
               $return_detail->firstHalfFlight->refundable = $value->fare->restrictions->refundable;
               $return_detail->firstHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;

               $return_detail->secondHalfFlight->total_price = $value->fare->total_price/4;
               $return_detail->secondHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare /4;
               if($infants >0){
                    $return_detail->secondHalfFlight->price_per_infant =$value->fare->price_per_infant->total_fare/2;
               }
               $return_detail->secondHalfFlight->refundable = $value->fare->restrictions->refundable;
               $return_detail->secondHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;
          }
     }
}


                                   //one-way flight
if($end_date ==""){
   if(strcasecmp(get_class($outboundFlight_array),"HasStopFlight") != 0){
    $outboundFlight_array->total_price = $value->fare->total_price/2;
    $outboundFlight_array->price_per_adult = $value->fare->price_per_adult->total_fare/2;
    if($infants >0){
     $outboundFlight_array->price_per_infant = $value->fare->price_per_infant->total_fare;
}
$outboundFlight_array->refundable = $value->fare->restrictions->refundable;
$outboundFlight_array->change_penalties=$value->fare->restrictions->change_penalties;
}
else{
    $outboundFlight_array->firstHalfFlight->total_price = $value->fare->total_price /4;
    $outboundFlight_array->firstHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare/4;
    if($infants >0){
     $outboundFlight_array->firstHalfFlight->price_per_infant = $value->fare->price_per_infant->total_fare/2;
}
$outboundFlight_array->firstHalfFlight->refundable = $value->fare->restrictions->refundable;
$outboundFlight_array->firstHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;

$outboundFlight_array->secondHalfFlight->total_price = $value->fare->total_price/4;
$outboundFlight_array->secondHalfFlight->price_per_adult = $value->fare->price_per_adult->total_fare /4;
if($infants >0){
     $outboundFlight_array->secondHalfFlight->price_per_infant =$value->fare->price_per_infant->total_fare/2;
}
$outboundFlight_array->secondHalfFlight->refundable = $value->fare->restrictions->refundable;
$outboundFlight_array->secondHalfFlight->change_penalties=$value->fare->restrictions->change_penalties;
}
}
			// print_r($outboundFlight_array);

}
		// }

}
		// echo "total size: " . count($allFlight);
// print "<pre>";
// print_r($allFlight);
// print "<pre>";
$airline_operating = "";
$airline_to ="";
$total_flight =0;

$airline = new Airline();
foreach ($allFlight as $indexX=>$allFlightOuter) {

  foreach ($allFlightOuter as $index=>$allFlights) {
   $total_flight = $total_flight +1;

//return render
   if($end_date !=""){
     $isStopFilght =0;
     echo "<article id='ARTICLE_1' class='content' style='height: 225px;'>";
     echo '<div id="DIV_2">';
     echo '<div id="DIV_3">';
     echo '<div id="DIV_4">';
     echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
     echo '</div>';
     echo '</div>';
     foreach ($allFlights as $key3 => $return_info ){

         if(strcasecmp(get_class($return_info),"HasStopFlight") != 0)     {
                    //get hour
              $arrive_date = strtok($return_info->departs_at, "T");
              $departs_date = strtok($return_info->arrives_at, "T");

              $arrive_time = substr($return_info->departs_at, strpos($return_info->departs_at, 'T') +1);
              $departs_time = substr($return_info->arrives_at, strpos($return_info->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));

                    //get flight duration
              $departs_datetime = new DateTime($departs_date." ".$departs_time);
              $flight_duration_object = $departs_datetime->diff(new DateTime($arrive_date." ".$arrive_time));

              $flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";

                    //get airline information
              if($index==0){
               $airline = getAirlines($return_info->operating_airline);
          }

          $date = new DateTime($start_date);
          $formatedDate = date_format($date,'d-m-Y');

          if(strcasecmp($return_info->operating_airline,"BL") == 0){
               $airline->website= $airline->website."//vn/vi/home?origin=".$from_airport."&destination=".$to_airport."&club-jetstar=0&adult=".$adults."&children=".$adults."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
          }


          displayNoStopResult($return_info,$departs_time,$arrive_time,$flight_duration);
     }else{
          $isStopFilght =1;
          $arrive_date = strtok($return_info->firstHalfFlight->departs_at, "T");
          $departs_date = strtok($return_info->secondHalfFlight->arrives_at, "T");
          $arrive_time = substr($return_info->firstHalfFlight->departs_at, strpos($return_info->firstHalfFlight->departs_at, 'T') +1);
          $departs_time = substr($return_info->secondHalfFlight->arrives_at, strpos($return_info->secondHalfFlight->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));
          $date = new DateTime($start_date);
          $formatedDate = date_format($date,'d-m-Y');

                    //get airline information
          if($index==0){
               $airline = getAirlines($return_info->firstHalfFlight->operating_airline);
          }

          if(strcasecmp($return_info->firstHalfFlight->operating_airline,"BL") == 0){
               $airline->website= $airline->website."//vn/vi/home?origin=".$return_info->firstHalfFlight->origin_airport."&destination=".$return_info->firstHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$adults."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
          }
         



                    //get flight duration
          $departs_datetime = new DateTime($departs_date."".$departs_time);
          $flight_duration_object = $departs_datetime->diff(new DateTime($arrive_date."".$arrive_time));

          $flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";
          $total_hasstop_flight = $return_info->firstHalfFlight->total_price + $return_info->secondHalfFlight->total_price ;
          displayHasStopResult($return_info,$departs_time,$arrive_time,$flight_duration);

     }

}
echo "<div class='leg-operator'>Operated by ".$airline->name." Airlines</div>";
echo '</div>';
echo '<aside id="ASIDE_27" style="height: 190px;">';
echo '</aside>';
echo '<div id="DIV_28_2">';
echo '<div id="DIV_29_2">';
echo '<div id="DIV_30_2">';
echo '<div id="DIV_31">';
echo '<div id="DIV_32">';
echo "<span id='SPAN_33'>"."<p>".$adults." adults  &#9892  ".$children." childrens  &#9892  ".$infants." infants</p>"."</span>";
echo '<div id="DIV_34">';
if($isStopFilght == 0){
   echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($return_info->total_price).$currency."</a><br id='BR_37' />";
}
if($isStopFilght == 1){
   echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($total_hasstop_flight).$currency."</a><br id='BR_37' />";
}
echo '</div>';
echo "</div><a href='".$airline->website."' title='Select' id='A_39'><span id='SPAN_40'>Select</span><span id='SPAN_41'></span></a>";
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</article>';
echo '<br>';


}


//one-way render
if($end_date == ""){
   if(strcasecmp(get_class($allFlights),"HasStopFlight") != 0)	{
				//get hour
    $arrive_date = strtok($allFlights->departs_at, "T");
    $departs_date = strtok($allFlights->arrives_at, "T");

    $arrive_time = substr($allFlights->departs_at, strpos($allFlights->departs_at, 'T') +1);
    $departs_time = substr($allFlights->arrives_at, strpos($allFlights->arrives_at, 'T') +1);
				// $departs_time = date('h:i A', strtotime($departs_time));

				//get flight duration
    $departs_datetime = new DateTime($departs_date." ".$departs_time);
    $flight_duration_object = $departs_datetime->diff(new DateTime($arrive_date." ".$arrive_time));

    $flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";



				//get airline information
    if($index==0){
     $airline = getAirlines($allFlights->operating_airline);
}

$date = new DateTime($start_date);
$formatedDate = date_format($date,'d-m-Y');

$total_money = number_format($allFlights->total_price).$currency;

$aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->aircraft);



if(strcasecmp($allFlights->operating_airline,"BL") == 0){
     $airline->website= $airline->website."//vn/vi/home?origin=".$from_airport."&destination=".$to_airport."&club-jetstar=0&adult=".$adults."&children=".$adults."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}
echo "<article id='ARTICLE_1' class='content' data-toggle='modal' data-target='#myModal".$total_flight."' >";
echo '<div id="DIV_2">';
echo '<div id="DIV_3">';
echo '<div id="DIV_4">';
echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
echo '</div>';
echo '</div>';
displayNoStopResult($allFlights,$departs_time,$arrive_time,$flight_duration);
echo "<div class='leg-operator'>Operated by ".$airline->name." Airlines</div>";
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
echo "</div><a href='".$airline->website."' title='Select' id='A_39'><span id='SPAN_40'>Select</span><span id='SPAN_41'></span></a>";
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

echo '</article>';
echo '<br>';

echo '<!-- Modal -->';
echo "<div class='modal fade' id='myModal".$total_flight."' role='dialog'>";
echo '<div class="modal-dialog">';
echo '<!-- Modal content-->';
echo '<div class="modal-content" >';
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
echo '<h4 class="modal-title">Flight Details</h4>';
echo '</div>';
echo '<div class="modal-body">';

noStopFlightDetail($departs_date,$departs_time,$arrive_date,$arrive_time,$from_airport,$to_airport,$airline,$allFlights,$flight_duration,$aircraft,$total_money);

echo '</div>';
echo '<div class="modal-footer">';
echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';

}
//one way has stop
else{
			//get hour
    $first_arrive_date = strtok($allFlights->firstHalfFlight->arrives_at, "T");
    $first_departs_date = strtok($allFlights->firstHalfFlight->departs_at, "T");

    $second_departs_date = strtok($allFlights->secondHalfFlight->departs_at, "T");
    $second_arrive_date = strtok($allFlights->secondHalfFlight->arrives_at, "T");


    $first_arrive_time = substr($allFlights->firstHalfFlight->arrives_at, strpos($allFlights->firstHalfFlight->departs_at, 'T') +1);

    $first_departs_time = substr($allFlights->firstHalfFlight->departs_at, strpos($allFlights->firstHalfFlight->arrives_at, 'T') +1);

    $second_arrive_time = substr($allFlights->secondHalfFlight->arrives_at, strpos($allFlights->secondHalfFlight->departs_at, 'T') +1);


    $second_departs_time = substr($allFlights->secondHalfFlight->departs_at, strpos($allFlights->secondHalfFlight->arrives_at, 'T') +1);
				// $departs_time = date('h:i A', strtotime($departs_time));
    $date = new DateTime($start_date);
    $formatedDate = date_format($date,'d-m-Y');

				//get airline information
    if($index==0){
     $airline = getAirlines($allFlights->firstHalfFlight->operating_airline);
}

if(strcasecmp($allFlights->firstHalfFlight->operating_airline,"BL") == 0){
     $airline->website= $airline->website."//vn/vi/home?origin=".$allFlights->firstHalfFlight->origin_airport."&destination=".$allFlights->firstHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}

 if(strcasecmp($allFlights->secondHalfFlight->operating_airline,"BL") == 0){
               $airline->website2= $airline->website2."//vn/vi/home?origin=".$allFlights->secondHalfFlight->origin_airport."&destination=".$allFlights->secondHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
          }
$first_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->firstHalfFlight->aircraft);

$second_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->secondHalfFlight->aircraft);

				//get flight duration
$first_departs_datetime = new DateTime($first_departs_date."".$first_departs_time);
$first_flight_duration_object = $first_departs_datetime->diff(new DateTime($first_arrive_date."".$first_arrive_time));

$second_departs_datetime = new DateTime($second_departs_date."".$second_departs_time);
$second_flight_duration_object = $second_departs_datetime->diff(new DateTime($second_arrive_date."".$second_arrive_time));

$stop_duration_datetime = new DateTime($first_arrive_date."".$first_arrive_time);
$stop_duration_object = $stop_duration_datetime->diff(new DateTime($second_departs_date."".$second_departs_time));

$first_flight_duration = $first_flight_duration_object->h ."h ".$first_flight_duration_object->i."m";

$second_flight_duration = $second_flight_duration_object->h ."h ".$second_flight_duration_object->i."m";

$total_duration_hour =$first_flight_duration_object->h+$second_flight_duration_object->h ;
$total_duration_minute = $first_flight_duration_object->i +$second_flight_duration_object->i;
if($total_duration_minute ==60){
     $total_duration_hour = $total_duration_hour +1;
     $total_duration_minute =00;
}
if($total_duration_minute >60){
     $total_duration_hour = $total_duration_hour +1;
     $total_duration_minute =$total_duration_minute -60;
}

$overall_duration_hour =$total_duration_hour + $stop_duration_object->h;

$overall_duration_minute = $total_duration_minute +$stop_duration_object->i;
echo $overall_duration_minute;
if($overall_duration_minute ==60){
     $overall_duration_hour = $overall_duration_hour +1;
     $overall_duration_minute =00;
}
if($overall_duration_minute >60){
     $overall_duration_hour = $overall_duration_hour +1;
     $overall_duration_minute = $overall_duration_minute -60;
}


$total_flight_duration =$total_duration_hour."h ".$total_duration_minute."m";
$overall_flight_duration = $overall_duration_hour."h ".$overall_duration_minute."m";
$stop_flight_duration = $stop_duration_object->h."h".$stop_duration_object->i."m";

$total_hasstop_flight = $allFlights->firstHalfFlight->total_price + $allFlights->secondHalfFlight->total_price ;
echo "<article id='ARTICLE_1' class='content' data-toggle='modal' data-target='#myModal".$total_flight."'>";
echo '<div id="DIV_2">';
echo '<div id="DIV_3">';
echo '<div id="DIV_4">';
echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->firstHalfFlight->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
echo '</div>';
echo '</div>';

displayHasStopResult($allFlights,$first_departs_time,$second_arrive_time,$overall_flight_duration);
echo "<div class='leg-operator'>Operated by ".$airline->name." Airlines</div>";
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
echo "</div><a href='".$airline->website."' title='Select' id='A_39'><span id='SPAN_40'>Select</span><span id='SPAN_41'></span></a>";
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</article>';
echo '<br>';

echo '<!-- Modal -->';
echo "<div class='modal fade' id='myModal".$total_flight."' role='dialog'>";
echo '<div class="modal-dialog">';
echo '<!-- Modal content-->';
echo '<div class="modal-content" style="height: 550px;">';
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
echo '<h4 class="modal-title">Flight Details</h4>';
echo '</div>';
echo '<div class="modal-body">';

     hasStopFlightDetail($first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$allFlights,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration);

echo '</div>';
// echo '<div class="modal-footer">';
// echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


}
}
}

}
                    	// echo '<ol id="pagin">';
                         // echo '<div class="pagination-container wow zoomIn mar-b-1x" data-wow-duration="0.5s">';
echo ' <ul id="pagin" class="pagination-custom">';
echo ' <li id="previous" class="pagination-item--wide first"> <a class="pagination-link--wide first" href="#">Previous</a> </li>';
$numOfItem = 10;
                    	// echo $total_flight;
$numOfPage = ceil($total_flight/$numOfItem);
for ($i =1;$i <=$numOfPage;$i++){
  if($i ==1){
                    			// echo "<li><a class='current' href='#''>".$i."</a></li>";
     echo "<li class='pagination-item first-number is-active'> <a class='pagination-link' href='#''>".$i."</a> </li>";
}else{
                    			// echo "<li><a href='#''>".$i."</a></li>";
     echo "<li class='pagination-item'> <a class='pagination-link' href='#''>".$i."</a> </li>";
}
}
                    	// echo "</ol>"; 
echo "<li id='next' class='pagination-item--wide last'> <a class='pagination-link--wide last' href='#''>Next</a> </li>";
echo "</ul>";
echo "</div>";
}


?>

<!-- </div> -->

<section id="portfolio" class="bg-light-gray ">
   <div class="container">
       <div class="row">
           <div class="col-lg-12 text-center wow rollIn">
               <h2 class="section-heading">City Points Of Interest</h2>
               <h3 class="section-subheading text-muted">Discover your destination city's famous places</h3>
          </div>
     </div>


     <div id="map_wrapper" style="height: 400px;">
          <div id="map_canvas" class="mapping" style=" width: 100%;height: 100%;"></div>
     </div>
</section>



<?php include '../php/mapping.php'  ?>


</body>
</html>