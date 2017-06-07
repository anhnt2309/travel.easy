<?php
include 'simple_html_dom.php';
class Airline{
  public $name;
  public $country;
  public $website;
  public $countryFlag;
}


function getAirlines($iataCode){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://www.avcodes.co.uk/airlcoderes.asp",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "status=Y&iataairl=".$iataCode."&icaoairl=&account=&prefix=&airlname=&country=&callsign=&B1=Submit",
    CURLOPT_HTTPHEADER => array(
      "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
      "accept-encoding: gzip, deflate",
      "accept-language: en-US,en;q=0.8,vi;q=0.6",
      "cache-control: no-cache",
      "connection: keep-alive",
      "content-type: application/x-www-form-urlencoded",
      "cookie: ASPSESSIONIDCCTRQBBC=JICOJMMAJIJIOOJBAOHAFHID; __utmt=1; __utma=17375465.346819072.1494680783.1495304952.1496506945.3; __utmb=17375465.34.10.1496506945; __utmc=17375465; __utmz=17375465.1494680783.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)",
      "origin: http://www.avcodes.co.uk",
      "postman-token: b18503a3-6d09-2fe7-a147-f5133792c77a",
      "referer: http://www.avcodes.co.uk/airlcodesearch.asp",
      "upgrade-insecure-requests: 1",
      "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36"
      ),
    ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $airline = new Airline();

    $html = str_get_html($response);

    foreach ( $html->find('center') as $index3 =>$element ) {
      if($index3 ==0){
        foreach ( $element->find('td') as $index2 =>$element1 ) {
         if ($index2 == 0) {
          // echo $element1->plaintext . '<br>';
          $airline->name=$element1->plaintext;
        }
        if($index2 == 8){
          // echo $element1->plaintext . '<br>';
         $airline->country=$element1->plaintext;
       }
     }

     foreach ( $element->find('a') as $index =>$element2 ) {
      if ($index == 0) {
          // echo $element2->href ."<br>";
        $airline->website = $element2->href;
      }

    }
    foreach ( $element->find('img') as $index4=>$element3 ) {
      if($index4 == 1){
        // echo $element3->src ."<br>";
        $airline->countryFlag = "http://www.avcodes.co.uk/" .$element3->src;
      }
    }

  }
}
// var_dump($airline);
return $airline;
}
}

function displayNoStopResult($allFlights,$departs_time,$arrive_time,$flight_duration){
  // echo "<article id='ARTICLE_1' class='content'>";
  //                           echo '<div id="DIV_2">';
  //                           echo '<div id="DIV_3">';
  //                           echo '<div id="DIV_4">';
  //                           echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
  //                           echo '</div>';
  //                           echo '</div>';
                            echo '<section id="SECTION_7">';
                            echo '<div id="DIV_8">';
                            echo "<img src='"."http://pics.avs.io/80/40/".$allFlights->marketing_airline.".png"."' alt='VietJet Air' id='IMG_5' />";
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
                            // echo "<div class='leg-operator'>Operated by ".$airline->name." Airlines</div>";
                            // echo '</div>';
                            // echo '<aside id="ASIDE_27">';
                            // echo '</aside>';
                            // echo '<div id="DIV_28">';
                            // echo '<div id="DIV_29">';
                            // echo '<div id="DIV_30">';
                            // echo '<div id="DIV_31">';
                            // echo '<div id="DIV_32">';
                            // echo "<span id='SPAN_33'>"."<p>".$adults." adults  &#9892  ".$children." childrens  &#9892  ".$infants." infants</p>"."</span>";
                            // echo '<div id="DIV_34">';
                            // echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($allFlights->total_price).$currency."</a><br id='BR_37' />";
                            // echo '</div>';
                            // echo "</div><a href='".$airline->website."' title='Select' id='A_39'><span id='SPAN_40'>Select</span><span id='SPAN_41'></span></a>";
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</article>';
                            // echo '<br>';
 }

function displayHasStopResult($allFlights,$departs_time,$arrive_time,$flight_duration){
  // echo "<article id='ARTICLE_1' class='content'>";
  //                           echo '<div id="DIV_2">';
  //                           echo '<div id="DIV_3">';
  //                           echo '<div id="DIV_4">';
  //                           echo "<img src='"."http://pics.avs.io/60/30/".$allFlights->firstHalfFlight->operating_airline.".png"."' alt='VietJet Air' id='IMG_5' /><span id='SPAN_6'>VietJet Air</span>";
  //                           echo '</div>';
  //                           echo '</div>';
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
                            echo "<span id='SPAN_20' style='color:red'>"."1 Stop "."</span><span id='SPAN_21'></span>";
                            echo "<span class='leg-stops-station' style='color: #524c61;'><span class='stop-station' data-id='12071' style='cursor: help;line-height: 1.125rem;' aria-describedby='int2'>".$allFlights->firstHalfFlight->destination_airport."</span></span>";
                            echo '</div>';
                            echo '</div>';
                            echo '<div id="DIV_22">';
                            echo "<span id='SPAN_23'><span id='SPAN_24'>".$arrive_time."</span><span id='SPAN_25'>".$allFlights->secondHalfFlight->destination_airport."</span></span>";
                            echo '</div>';
                            echo '<div id="DIV_26">';
                            echo '</div>';
                            echo '</div>';
                            echo '</section>';
                            // echo "<div class='leg-operator'>Operated by ".$airline->name." Airlines</div>";
                            // echo '</div>';
                            // echo '<aside id="ASIDE_27">';
                            // echo '</aside>';
                            // echo '<div id="DIV_28">';
                            // echo '<div id="DIV_29">';
                            // echo '<div id="DIV_30">';
                            // echo '<div id="DIV_31">';
                            // echo '<div id="DIV_32">';
                            // echo "<span id='SPAN_33'>"."<p>".$adults." adults  &#9892  ".$children." childrens  &#9892  ".$infants." infants</p>"."</span>";
                            // echo '<div id="DIV_34">';
                            // echo "<a href='#' id='A_35'><span id='SPAN_36'></span>".number_format($total_hasstop_flight)  .$currency."</a><br id='BR_37' />";
                            // echo '</div>';
                            // echo "</div><a href='".$airline->website."' title='Select' id='A_39'><span id='SPAN_40'>Select</span><span id='SPAN_41'></span></a>";
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</div>';
                            // echo '</article>';
                            // echo '<br>';
}

?>
