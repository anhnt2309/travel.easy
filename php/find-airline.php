<?php
include 'simple_html_dom.php';
class Airline{
  public $name;
  public $country;
  public $website;
  public $website2;
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
        $airline->website2 =$element2->href;
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

function displayHasStopResult($allFlights,$first_departs_time,$second_arrive_time,$total_flight_duration){

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
                            echo "<span id='SPAN_12'><span id='SPAN_13'>".$first_departs_time."</span><span id='SPAN_14'>".$allFlights->firstHalfFlight->origin_airport."</span></span>";
                            echo '</div>';
                            echo '<div id="DIV_15">';
                            echo "<span id='SPAN_16'>".$total_flight_duration."</span>";
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
                            echo "<span id='SPAN_23'><span id='SPAN_24'>".$second_arrive_time."</span><span id='SPAN_25'>".$allFlights->secondHalfFlight->destination_airport."</span></span>";
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

function noStopFlightDetail($departs_date,$departs_time,$arrive_date,$arrive_time,$from_airport,$to_airport,$airline,$allFlights,$flight_duration,$aircraft,$total_money){
  echo "<section class=\"panel-content\" id=\"result_detail_id_SECTION_1\">\n"; 
echo "   <div class=\"leg-heading\" id=\"result_detail_id_DIV_2\">\n"; 
echo "      <h4 class=\"new-leg-title leg-0 \" id=\"result_detail_id_H4_3\">Depart</h4>\n"; 
echo "      <h6 class=\"text-base leg-date date-label\" id=\"result_detail_id_H6_4\">$departs_date</h6>\n"; 
echo "   </div>\n"; 
echo "   <div class=\"itinerary-leg chevron-toggle\" id=\"result_detail_id_DIV_5\" >\n"; 
echo "      <div class=\"leg-summary clearfix   opened\" id=\"result_detail_id_DIV_6\">\n"; 
echo "         <section data-id=\"0\" class=\"card-main leg clearfix\" id=\"result_detail_id_SECTION_7\">\n"; 
echo "            <div class=\"leg-details compact-view\" id=\"result_detail_id_DIV_8\">\n"; 
echo "               <div class=\"depart\" id=\"result_detail_id_DIV_9\"><span class=\"station-tooltip\" data-id=\"16240\" id=\"result_detail_id_SPAN_10\"><span class=\"times\" id=\"result_detail_id_SPAN_11\">$departs_time</span><span class=\"stop-station\" data-id=\"16240\" id=\"result_detail_id_SPAN_12\">$from_airport</span></span></div>\n"; 
echo "               <div class=\"stops\" id=\"result_detail_id_DIV_13\">\n"; 
echo "                  <span class=\"duration\" id=\"result_detail_id_SPAN_14\">&nbsp;</span>\n"; 
echo "                  <ul class=\"stop-line\" id=\"result_detail_id_UL_15\">\n"; 
echo "                     <li class=\"stop-line\" id=\"result_detail_id_LI_16\"></li>\n"; 

echo "                  </ul>\n"; 
echo "                  <div class=\"leg-stops no-stops\" id=\"result_detail_id_DIV_17\"><span class=\"leg-stops-green leg-stops-label\" id=\"result_detail_id_SPAN_18\">Non-stop </span><span class=\"leg-stops-station\" id=\"result_detail_id_SPAN_19\"></span></div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"arrive\" id=\"result_detail_id_DIV_20\"><span class=\"station-tooltip\" data-id=\"11036\" id=\"result_detail_id_SPAN_21\"><span class=\"times\" id=\"result_detail_id_SPAN_22\">$arrive_time</span><span class=\"stop-station\" data-id=\"11036\" id=\"result_detail_id_SPAN_23\">$to_airport</span></span></div>\n"; 
echo "               <div class=\"clearfix\" id=\"result_detail_id_DIV_24\"></div>\n"; 
echo "            </div>\n"; 
echo "            <div class=\"leg-operator\" id=\"result_detail_id_DIV_25\">Operated by $airline->name Airlines</div>\n"; 
echo "         </section>\n"; 
echo "         <div class=\"show-btn   opened\" data-id=\"0\" data-hide-text=\"Ẩn\" data-show-text=\"Chi tiết\" id=\"result_detail_id_DIV_26\"><span class=\"details-chevron\" id=\"result_detail_id_SPAN_27\"></span></div>\n"; 
echo "      </div>\n"; 
echo "      <div data-id=\"0\" class=\"expanded-details leg-details leg-0 collapsible\" id=\"result_detail_id_DIV_28\">\n"; 
echo "         <div class=\"segment-airline segment-row\" id=\"result_detail_id_DIV_29\"><img class=\"small-logo\" src=\"http://pics.avs.io/70/24/$allFlights->marketing_airline.png\" alt=\"Jetstar\" onerror=\"__imgErrRemove__(this)\" id=\"result_detail_id_IMG_30\"><span class=\"operated-by text-sm\" id=\"result_detail_id_SPAN_31\">$airline->name $allFlights->operating_airline$allFlights->flight_number </span></div>\n"; 
echo "         <div class=\"segment-row flight-row\" id=\"result_detail_id_DIV_32\">\n"; 
echo "            <div class=\" col duration text-sm modal-duration\" id=\"result_detail_id_DIV_33\">$flight_duration</div>\n"; 
echo "            <div class=\"segment-details\" id=\"result_detail_id_DIV_34\">\n"; 
echo "               <div class=\"departure segment-row\" id=\"result_detail_id_DIV_35\">\n"; 
echo "                  <div class=\"stop-line-vert depart-line col\" id=\"result_detail_id_DIV_36\"></div>\n"; 
echo "                  <div class=\"times fss-bold col\" id=\"result_detail_id_DIV_37\">$departs_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$from_airport  </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$to_airport </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"segment-row split-duration\" id=\"result_detail_id_DIV_43\">\n"; 
echo "                  <div class=\"col\" id=\"result_detail_id_DIV_44\"></div>\n"; 
echo "                  <div class=\"duration text-sm col\" id=\"result_detail_id_DIV_45\">$flight_duration</div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 

echo "<a href=\"$airline->website\" class=\"fss-bpk-button action-select\" title=\"Mở trong cửa sổ mới\" data-deeplink=\"direct\" data-agent-id=\"alow\" data-is-airline=\"false\" data-select-id=\"null\" target=\"_blank\" style=\"
    float: right;
     position: absolute;
    right: 2px;
    /* padding: 10px 16px; */
    display: inline-block;
    margin: px;
    padding: .375rem 1.125 rem;
    border: 0;
    border-radius: 1.125rem;
    background-color: #fed136;
    background-image: linear-gradient(-180deg,#fed136,#fed136);
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5rem;
    text-align: center;
    text-decoration: none;
    box-shadow: none;
    cursor: pointer;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    /* position: relative; */
    width: 20%;
    height: 50%;
\"><span class=\"cta-small-text has-cta-icon\" style=\"
    font-size: 10px;
\">$total_money</span><span class=\"bpk-icon-sm bpk-icon-pointer bpk-icon-sm--align-to-button\"></span></a>";

echo "         </div>\n"; 

echo "         <div class=\"arrival-info text-sm\" id=\"result_detail_id_DIV_46\">\n"; 
echo "            <div class=\"arrival\" id=\"result_detail_id_DIV_47\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_48\">Arrive:</strong> $arrive_date</div>\n"; 
echo "            <div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_50\">Flight Duration:</strong> $flight_duration</div>\n";
echo "<div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"
    width: 30%;
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px;display: inline; \">$aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n"; 
echo "   </div>\n"; 
// echo "</section>\n";
}


function hasStopFlightDetail($first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$allFlights,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration){

  // echo "<pre>";
  // print_r($allFlights);
  // echo "<pre>";

  $firstHalfFlight = $allFlights->firstHalfFlight;
  $secondHalfFlight =$allFlights->secondHalfFlight;

  $first_price = number_format((int)$firstHalfFlight->total_price).$currency;
  
  $second_price = number_format((int)$secondHalfFlight->total_price).$currency;
  // echo "abc".$airline->website2;

  echo "<section class=\"panel-content\" id=\"result_detail_id_SECTION_1\">\n"; 
echo "   <div class=\"leg-heading\" id=\"result_detail_id_DIV_2\">\n"; 
echo "      <h4 class=\"new-leg-title leg-0 \" id=\"result_detail_id_H4_3\">Depart</h4>\n"; 
echo "      <h6 class=\"text-base leg-date date-label\" id=\"result_detail_id_H6_4\">$first_departs_date</h6>\n"; 
echo "   </div>\n"; 
echo "   <div class=\"itinerary-leg chevron-toggle\" id=\"result_detail_id_DIV_5\" style=\"height: 400px;\">\n"; 
echo "      <div class=\"leg-summary clearfix   opened\" id=\"result_detail_id_DIV_6\">\n"; 
echo "         <section data-id=\"0\" class=\"card-main leg clearfix\" id=\"result_detail_id_SECTION_7\">\n"; 
echo "            <div class=\"leg-details compact-view\" id=\"result_detail_id_DIV_8\">\n"; 
echo "               <div class=\"depart\" id=\"result_detail_id_DIV_9\"><span class=\"station-tooltip\" data-id=\"16240\" id=\"result_detail_id_SPAN_10\"><span class=\"times\" id=\"result_detail_id_SPAN_11\">$first_departs_time</span><span class=\"stop-station\" data-id=\"16240\" id=\"result_detail_id_SPAN_12\">$firstHalfFlight->origin_airport</span></span></div>\n"; 
echo "               <div class=\"stops\" id=\"result_detail_id_DIV_13\">\n"; 
echo "                  <span class=\"duration\" id=\"result_detail_id_SPAN_14\">$stop_flight_duration (stop)</span>\n"; 
echo "                  <ul class=\"stop-line\" id=\"result_detail_id_UL_15\">\n"; 
echo "                     <li class=\"stop-line\" id=\"result_detail_id_LI_16\"></li>\n"; 
echo "                    <li class=\"stop-dot\"></li>";
echo "                  </ul>\n"; 
echo "                   <span id='SPAN_20' style='color:red'>"."1 Stop "."</span><span id='SPAN_21'></span>";
                            echo "<span class=\"leg-stops-station\" style=\"color: #524c61;\"><span class=\"stop-station\" data-id=\"12071\" style=\"cursor: help;line-height: 1.125rem;\" aria-describedby=\"int2\">$secondHalfFlight->origin_airport</span></span>";
echo "               </div>\n"; 
echo "               <div class=\"arrive\" id=\"result_detail_id_DIV_20\"><span class=\"station-tooltip\" data-id=\"11036\" id=\"result_detail_id_SPAN_21\"><span class=\"times\" id=\"result_detail_id_SPAN_22\">$first_arrive_time</span><span class=\"stop-station\" data-id=\"11036\" id=\"result_detail_id_SPAN_23\">$secondHalfFlight->destination_airport</span></span></div>\n"; 
echo "               <div class=\"clearfix\" id=\"result_detail_id_DIV_24\"></div>\n"; 
echo "            </div>\n"; 
echo "            <div class=\"leg-operator\" id=\"result_detail_id_DIV_25\">Operated by $airline->name Airlines</div>\n"; 
echo "         </section>\n"; 
echo "         <div class=\"show-btn   opened\" data-id=\"0\" data-hide-text=\"Ẩn\" data-show-text=\"Chi tiết\" id=\"result_detail_id_DIV_26\"><span class=\"details-chevron\" id=\"result_detail_id_SPAN_27\"></span></div>\n"; 
echo "      </div>\n"; 
echo "      <div data-id=\"0\" class=\"expanded-details leg-details leg-0 collapsible\" id=\"result_detail_id_DIV_28\">\n"; 
echo "         <div class=\"segment-airline segment-row\" id=\"result_detail_id_DIV_29\"><img class=\"small-logo\" src=\"http://pics.avs.io/70/24/$firstHalfFlight->marketing_airline.png\" alt=\"Jetstar\" onerror=\"__imgErrRemove__(this)\" id=\"result_detail_id_IMG_30\"><span class=\"operated-by text-sm\" id=\"result_detail_id_SPAN_31\">$airline->name $firstHalfFlight->operating_airline$firstHalfFlight->flight_number </span></div>\n"; 
echo "         <div class=\"segment-row flight-row\" id=\"result_detail_id_DIV_32\">\n"; 
echo "            <div class=\" col duration text-sm modal-duration\" id=\"result_detail_id_DIV_33\">$first_flight_duration</div>\n"; 
echo "            <div class=\"segment-details\" id=\"result_detail_id_DIV_34\">\n"; 
echo "               <div class=\"departure segment-row\" id=\"result_detail_id_DIV_35\">\n"; 
echo "                  <div class=\"stop-line-vert depart-line col\" id=\"result_detail_id_DIV_36\"></div>\n"; 
echo "                  <div class=\"times fss-bold col\" id=\"result_detail_id_DIV_37\">$first_departs_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$firstHalfFlight->origin_airport </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$first_arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$firstHalfFlight->destination_airport </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"segment-row split-duration\" id=\"result_detail_id_DIV_43\">\n"; 
echo "                  <div class=\"col\" id=\"result_detail_id_DIV_44\"></div>\n"; 
echo "                  <div class=\"duration text-sm col\" id=\"result_detail_id_DIV_45\">$flight_duration</div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 

echo "<a href=\"$airline->website\" class=\"fss-bpk-button action-select\" title=\"Mở trong cửa sổ mới\" data-deeplink=\"direct\" data-agent-id=\"alow\" data-is-airline=\"false\" data-select-id=\"null\" target=\"_blank\" style=\"
    float: right;
     position: absolute;
    right: 2px;
    /* padding: 10px 16px; */
    display: inline-block;
    margin: px;
    padding: .375rem 1.125 rem;
    border: 0;
    border-radius: 1.125rem;
    background-color: #fed136;
    background-image: linear-gradient(-180deg,#fed136,#fed136);
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5rem;
    text-align: center;
    text-decoration: none;
    box-shadow: none;
    cursor: pointer;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    /* position: relative; */
    width: 20%;
    height: 50%;
\"><span class=\"cta-small-text has-cta-icon\" style=\"
    font-size: 10px;
\">$first_price</span><span class=\"bpk-icon-sm bpk-icon-pointer bpk-icon-sm--align-to-button\"></span></a>";

echo "         </div>\n"; 

echo "         <div class=\"arrival-info text-sm\" id=\"result_detail_id_DIV_46\">\n"; 
echo "            <div class=\"arrival\" id=\"result_detail_id_DIV_47\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_48\">Arrive:</strong> $first_arrive_date</div>\n"; 
echo "            <div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_50\">Flight Duration:</strong> $first_flight_duration</div>\n";
echo "<div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"
    width: 30%;
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px;display: inline; \">$first_aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n";

echo "      <div data-id=\"0\" class=\"expanded-details leg-details leg-0 collapsible\" id=\"result_detail_id_DIV_28\">\n"; 
echo "         <div class=\"segment-airline segment-row\" id=\"result_detail_id_DIV_29\"><img class=\"small-logo\" src=\"http://pics.avs.io/70/24/$secondHalfFlight->marketing_airline.png\" alt=\"Jetstar\" onerror=\"__imgErrRemove__(this)\" id=\"result_detail_id_IMG_30\"><span class=\"operated-by text-sm\" id=\"result_detail_id_SPAN_31\">$airline->name $secondHalfFlight->operating_airline$secondHalfFlight->flight_number </span></div>\n"; 
echo "         <div class=\"segment-row flight-row\" id=\"result_detail_id_DIV_32\">\n"; 
echo "            <div class=\" col duration text-sm modal-duration\" id=\"result_detail_id_DIV_33\">$second_flight_duration</div>\n"; 
echo "            <div class=\"segment-details\" id=\"result_detail_id_DIV_34\">\n"; 
echo "               <div class=\"departure segment-row\" id=\"result_detail_id_DIV_35\">\n"; 
echo "                  <div class=\"stop-line-vert depart-line col\" id=\"result_detail_id_DIV_36\"></div>\n"; 
echo "                  <div class=\"times fss-bold col\" id=\"result_detail_id_DIV_37\">$second_departs_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$secondHalfFlight->origin_airport  </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$second_arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$secondHalfFlight->destination_airport </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"segment-row split-duration\" id=\"result_detail_id_DIV_43\">\n"; 
echo "                  <div class=\"col\" id=\"result_detail_id_DIV_44\"></div>\n"; 
echo "                  <div class=\"duration text-sm col\" id=\"result_detail_id_DIV_45\">$second_flight_duration</div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 

echo "<a href=\"$airline->website2\" class=\"fss-bpk-button action-select\" title=\"Mở trong cửa sổ mới\" data-deeplink=\"direct\" data-agent-id=\"alow\" data-is-airline=\"false\" data-select-id=\"null\" target=\"_blank\" style=\"
    float: right;
     position: absolute;
    right: 2px;
    /* padding: 10px 16px; */
    display: inline-block;
    margin: px;
    padding: .375rem 1.125 rem;
    border: 0;
    border-radius: 1.125rem;
    background-color: #fed136;
    background-image: linear-gradient(-180deg,#fed136,#fed136);
    color: #fff;
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.5rem;
    text-align: center;
    text-decoration: none;
    box-shadow: none;
    cursor: pointer;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    /* position: relative; */
    width: 20%;
    height: 50%;
\"><span class=\"cta-small-text has-cta-icon\" style=\"
    font-size: 10px;
\">$second_price</span><span class=\"bpk-icon-sm bpk-icon-pointer bpk-icon-sm--align-to-button\"></span></a>";

echo "         </div>\n"; 

echo "         <div class=\"arrival-info text-sm\" id=\"result_detail_id_DIV_46\">\n"; 
echo "            <div class=\"arrival\" id=\"result_detail_id_DIV_47\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_48\">Arrive:</strong> $second_arrive_date</div>\n"; 
echo "            <div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_50\">Flight Duration:</strong> $second_flight_duration</div>\n";
echo "<div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"
    width: 30%;
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px;display: inline; \">$second_aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n"; 
echo "   </div>\n"; 

echo "   </div>\n"; 



 echo "</section>\n";
}

?>
