<?php
include 'simple_html_dom.php';
class Airline{
  public $name;
  public $country;
  public $website;
  // public $website2;
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
        // $airline->website2 =$element2->href;
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

function noStopFlightDetail($overall_txt,$departs_date,$departs_time,$arrive_date,$arrive_time,$from_airport,$to_airport,$airline,$allFlights,$flight_duration,$aircraft,$total_money,$from_airport_name,$to_airport_name){
  echo "<section class=\"panel-content\" id=\"result_detail_id_SECTION_1\">\n"; 
echo "   <div class=\"leg-heading\" id=\"result_detail_id_DIV_2\">\n"; 
echo "      <h4 class=\"new-leg-title leg-0 \" id=\"result_detail_id_H4_3\">$overall_txt</h4>\n"; 
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
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$from_airport- $from_airport_name  </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$to_airport- $to_airport_name </div>\n"; 
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
    font-size: 10px;    position: relative;top: 7px;
\">$total_money</span><span class=\"bpk-icon-sm bpk-icon-pointer bpk-icon-sm--align-to-button\"></span></a>";

echo "         </div>\n"; 

echo "         <div class=\"arrival-info text-sm\" id=\"result_detail_id_DIV_46\">\n"; 
echo "            <div class=\"arrival\" id=\"result_detail_id_DIV_47\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_48\">Arrive:</strong> $arrive_date</div>\n"; 
echo "            <div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"width: 30%;\"><strong id=\"result_detail_id_STRONG_50\">Flight Duration:</strong> $flight_duration</div>\n";
echo "<div class=\"total-duration\" id=\"result_detail_id_DIV_49\" style=\"
    width: 30%;
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px !important;display: inline; \">$aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n"; 
echo "   </div>\n"; 
// echo "</section>\n";
}


function hasStopFlightDetail($fight_type,$first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$second_airline,$allFlights,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration,$from_airport_name,$to_airport_name,$stop_airport){

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
echo "      <h4 class=\"new-leg-title leg-0 \" id=\"result_detail_id_H4_3\">$fight_type</h4>\n"; 
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
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$firstHalfFlight->origin_airport- $from_airport_name </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$first_arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$firstHalfFlight->destination_airport- $stop_airport->name </div>\n"; 
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
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px !important;display: inline; \">$first_aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n";



echo "      <div data-id=\"0\" class=\"expanded-details leg-details leg-0 collapsible\" id=\"result_detail_id_DIV_28\">\n"; 
echo "         <div class=\"segment-airline segment-row\" id=\"result_detail_id_DIV_29\"><img class=\"small-logo\" src=\"http://pics.avs.io/70/24/$secondHalfFlight->marketing_airline.png\" alt=\"Jetstar\" onerror=\"__imgErrRemove__(this)\" id=\"result_detail_id_IMG_30\"><span class=\"operated-by text-sm\" id=\"result_detail_id_SPAN_31\">$second_airline->name $secondHalfFlight->operating_airline$secondHalfFlight->flight_number </span></div>\n"; 
echo "         <div class=\"segment-row flight-row\" id=\"result_detail_id_DIV_32\">\n"; 
echo "            <div class=\" col duration text-sm modal-duration\" id=\"result_detail_id_DIV_33\">$second_flight_duration</div>\n"; 
echo "            <div class=\"segment-details\" id=\"result_detail_id_DIV_34\">\n"; 
echo "               <div class=\"departure segment-row\" id=\"result_detail_id_DIV_35\">\n"; 
echo "                  <div class=\"stop-line-vert depart-line col\" id=\"result_detail_id_DIV_36\"></div>\n"; 
echo "                  <div class=\"times fss-bold col\" id=\"result_detail_id_DIV_37\">$second_departs_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_38\">$secondHalfFlight->origin_airport- $stop_airport->name </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"destination segment-row\" id=\"result_detail_id_DIV_39\">\n"; 
echo "                  <div class=\"stop-line-vert arrival-line col\" id=\"result_detail_id_DIV_40\"></div>\n"; 
echo "                  <div class=\"times col\" id=\"result_detail_id_DIV_41\">$second_arrive_time</div>\n"; 
echo "                  <div class=\"route col\" id=\"result_detail_id_DIV_42\">$secondHalfFlight->destination_airport- $to_airport_name </div>\n"; 
echo "               </div>\n"; 
echo "               <div class=\"segment-row split-duration\" id=\"result_detail_id_DIV_43\">\n"; 
echo "                  <div class=\"col\" id=\"result_detail_id_DIV_44\"></div>\n"; 
echo "                  <div class=\"duration text-sm col\" id=\"result_detail_id_DIV_45\">$second_flight_duration</div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 

echo "<a href=\"$second_airline->website\" class=\"fss-bpk-button action-select\" title=\"Mở trong cửa sổ mới\" data-deeplink=\"direct\" data-agent-id=\"alow\" data-is-airline=\"false\" data-select-id=\"null\" target=\"_blank\" style=\"
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
\"><strong id=\"result_detail_id_STRONG_50\">Aircraft:</strong><p style=\"font-size: 10px !important;display: inline; \">$second_aircraft</p></div>"; 
echo "         </div>\n"; 
echo "      </div>\n"; 
echo "   </div>\n"; 

// echo "   </div>\n"; 

 echo "</section>\n";
 // echo "<div style=\"clear:both\"></div>";
}


function displaySearchInfo(){
  echo "<div class=\"boarding-pass\">\n"; 
echo "  <header>\n"; 
echo "    <svg class=\"logo\">\n"; 
echo "      <use xlink:href=\"#alitalia\"></use>\n"; 
echo "    </svg>\n"; 
echo "    <div class=\"flight\">\n"; 
echo "      <small>flight</small>\n"; 
echo "      <strong>AL 101</strong>\n"; 
echo "    </div>\n"; 
echo "  </header>\n"; 
echo "  <section class=\"cities\">\n"; 
echo "    <div class=\"city\">\n"; 
echo "      <small>Roma</small>\n"; 
echo "\n"; 
echo "      <strong>FCO</strong>\n"; 
echo "    </div>\n"; 
echo "    <div class=\"city\">\n"; 
echo "      <small>Napoli</small>\n"; 
echo "\n"; 
echo "      <strong>NAP</strong>\n"; 
echo "    </div>\n"; 
echo "    <svg class=\"airplane\">\n"; 
echo "      <use xlink:href=\"#airplane\"></use>\n"; 
echo "    </svg>\n"; 
echo "  </section>\n"; 
echo "  <section class=\"infos\">\n"; 
echo "    <div class=\"places\">\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Terminal</small>\n"; 
echo "        <strong><em>W</em></strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Gate</small>\n"; 
echo "        <strong><em>C3</em></strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Seat</small>\n"; 
echo "        <strong>14B</strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Class</small>\n"; 
echo "        <strong>E</strong>\n"; 
echo "      </div>\n"; 
echo "    </div>\n"; 
echo "    <div class=\"times\">\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Boarding</small>\n"; 
echo "        <strong>11:05</strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Departure</small>\n"; 
echo "        <strong>11:35</strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Duration</small>\n"; 
echo "        <strong>2:15</strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"box\">\n"; 
echo "        <small>Arrival</small>\n"; 
echo "        <strong>13:50</strong>\n"; 
echo "      </div>\n"; 
echo "    </div>\n"; 
echo "  </section>\n"; 
echo "  <section class=\"strap\">\n"; 
echo "    <div class=\"box\">\n"; 
echo "      <div class=\"passenger\">\n"; 
echo "        <small>passenger</small>\n"; 
echo "        <strong>Sander Nizni</strong>\n"; 
echo "      </div>\n"; 
echo "      <div class=\"date\">\n"; 
echo "        <small>Date</small>\n"; 
echo "        <strong>Mon, 1 Jan 2015</strong>\n"; 
echo "      </div>\n"; 
echo "    </div>\n"; 
echo "    <svg class=\"qrcode\">\n"; 
echo "      <use xlink:href=\"#qrcode\"></use>\n"; 
echo "    </svg>\n"; 
echo "  </section>\n"; 
echo "</div>\n"; 
echo "\n"; 
echo "\n"; 
echo "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"0\" height=\"0\" display=\"none\">\n"; 
echo "  <symbol id=\"alitalia\" viewBox=\"0 0 80 17\">\n"; 
echo "    <g>\n"; 
echo "      <path fill=\"#FFFFFF\" d=\"M10.297,2.333L0.5,16.135h4.434l9.107-12.7v12.717l3.867,0.009V1.5h-5.654\n"; 
echo "                              C10.83,1.5,10.297,2.333,10.297,2.333z M12.769,16.146v-8.62l-6.153,8.62H12.769z M20.367,16.186h3.745V2.102h-3.745V16.186z\n"; 
echo "                              M26.555,16.186h3.746V5.571h-3.746V16.186z M26.555,4.67h3.746V2.102h-3.746V4.67z M55.084,16.119h3.747V2.033h-3.747V16.119z\n"; 
echo "                              M61.271,16.119h3.75V5.505h-3.75V16.119z M61.271,4.604h3.75v-2.57h-3.75V4.604z M36.593,12.35V8.276h3.745V5.47h-3.885V3.336\n"; 
echo "                              h-3.539v10.163c0,2.839,3.041,2.653,3.041,2.653h4.502v-2.836h-2.715C36.558,13.316,36.593,12.35,36.593,12.35z M50.445,5.439\n"; 
echo "                              c0,0-2.854-0.719-5.774,0.016c0,0-3.078,0.469-2.889,3.323h3.766c0,0-0.019-1.484,1.857-1.469c0,0,1.646-0.117,1.786,0.968\n"; 
echo "                              c0,0,0.24,0.617-0.791,0.952l-4.968,0.901c0,0-2.253,0.401-2.253,2.905c0,0-0.067,1.65,1.066,2.533c0,0,1.271,0.904,3.748,0.904\n"; 
echo "                              c0,0,4.586,0.149,7.062-0.219V8.543C53.056,8.543,53.298,5.957,50.445,5.439z M49.225,14.134c0,0-2.286,0.216-3.317-0.114\n"; 
echo "                              c0,0-0.791-0.237-0.791-1.202c0,0,0-0.833,0.878-1.087l3.23-0.652V14.134z M75.891,5.439c0,0-2.853-0.719-5.774,0.016\n"; 
echo "                              c0,0-3.075,0.469-2.887,3.323h3.764c0,0-0.018-1.484,1.854-1.469c0,0,1.651-0.117,1.787,0.968c0,0,0.241,0.617-0.79,0.952\n"; 
echo "                              L68.88,10.13c0,0-2.254,0.401-2.254,2.905c0,0-0.067,1.65,1.065,2.533c0,0,1.271,0.904,3.747,0.904c0,0,4.589,0.149,7.063-0.219\n"; 
echo "                              V8.543C78.501,8.543,78.741,5.957,75.891,5.439z M74.672,14.134c0,0-2.288,0.216-3.318-0.114c0,0-0.787-0.237-0.787-1.202\n"; 
echo "                              c0,0,0-0.833,0.872-1.087l3.233-0.652V14.134z\"/>\n"; 
echo "    </g>\n"; 
echo "  </symbol>\n"; 
echo "  <symbol  id=\"airplane\" viewBox=\"243.5 245.183 25 21.633\">\n"; 
echo "    <g>\n"; 
echo "      <path fill=\"#336699\" d=\"M251.966,266.816h1.242l6.11-8.784l5.711,0.2c2.995-0.102,3.472-2.027,3.472-2.308\n"; 
echo "                              c0-0.281-0.63-2.184-3.472-2.157l-5.711,0.2l-6.11-8.785h-1.242l1.67,8.983l-6.535,0.229l-2.281-3.28h-0.561v3.566\n"; 
echo "                              c-0.437,0.257-0.738,0.724-0.757,1.266c-0.02,0.583,0.288,1.101,0.757,1.376v3.563h0.561l2.281-3.279l6.535,0.229L251.966,266.816z\n"; 
echo "                              \"/>\n"; 
echo "    </g>\n"; 
echo "  </symbol>\n"; 
echo "  <symbol id=\"qrcode\" viewBox=\"0 0 130 130\">\n"; 
echo "   <g>\n"; 
echo "     <path fill=\"#334158\" d=\"M123,3h-5h-5h-5h-5h-5h-5v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5V8V3H123z M123,13v5v5v5v5h-5h-5h-5\n"; 
echo "          h-5h-5v-5v-5v-5v-5V8h5h5h5h5h5V13z\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"88,13 88,8 88,3 83,3 78,3 78,8 78,13 83,13      \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"63,13 68,13 73,13 73,8 73,3 68,3 68,8 63,8 58,8 58,13 53,13 53,8 53,3 48,3 48,8 43,8 43,13 \n"; 
echo "          48,13 48,18 43,18 43,23 48,23 53,23 53,18 58,18 58,23 63,23 63,18     \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"108,13 103,13 103,18 103,23 103,28 108,28 113,28 118,28 118,23 118,18 118,13 113,13     \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"78,18 73,18 73,23 78,23 83,23 83,18   \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"23,28 28,28 28,23 28,18 28,13 23,13 18,13 13,13 13,18 13,23 13,28 18,28  \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"53,28 53,33 53,38 58,38 58,33 58,28 58,23 53,23      \"/>\n"; 
echo "     <rect x=\"63\" y=\"23\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"68\" y=\"28\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <path fill=\"#334158\" d=\"M13,38h5h5h5h5h5v-5v-5v-5v-5v-5V8V3h-5h-5h-5h-5h-5H8H3v5v5v5v5v5v5v5h5H13z M8,28v-5v-5v-5V8h5h5h5h5h5v5\n"; 
echo "          v5v5v5v5h-5h-5h-5h-5H8V28z\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"48,33 48,28 43,28 43,33 43,38 48,38   \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"83,38 88,38 88,33 88,28 88,23 83,23 83,28 78,28 78,33 83,33    \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"23,43 18,43 13,43 8,43 3,43 3,48 8,48 13,48 18,48 23,48 28,48 28,43      \"/>\n"; 
echo "     <rect x=\"108\" y=\"43\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"28\" y=\"48\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"88,53 93,53 93,48 93,43 88,43 88,48 83,48 83,53      \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"123,48 123,43 118,43 118,48 118,53 118,58 123,58 123,63 118,63 113,63 113,68 118,68 118,73 \n"; 
echo "          118,78 123,78 123,83 128,83 128,78 128,73 123,73 123,68 128,68 128,63 128,58 128,53 123,53     \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"98,58 98,63 103,63 103,68 108,68 108,63 108,58 103,58 103,53 103,48 103,43 98,43 98,48 98,53 \n"; 
echo "          93,53 93,58    \"/>\n"; 
echo "     <rect x=\"108\" y=\"53\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"78\" y=\"63\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"93\" y=\"63\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"53\" y=\"68\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"108,73 108,78 108,83 113,83 113,78 113,73 113,68 108,68   \"/>\n"; 
echo "     <rect x=\"13\" y=\"73\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"98\" y=\"73\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"18,83 18,88 23,88 28,88 28,83 23,83 23,78 18,78      \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"8,83 8,78 8,73 8,68 13,68 13,63 13,58 13,53 8,53 3,53 3,58 3,63 3,68 3,73 3,78 3,83 3,88 8,88     \n"; 
echo "          \"/>\n"; 
echo "     <rect x=\"53\" y=\"83\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <rect x=\"73\" y=\"83\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <path fill=\"#334158\" d=\"M108,88v-5h-5h-5h-5h-5v-5h5v-5h-5v-5h-5v5h-5h-5v-5h-5h-5v5h5v5h-5v5v5h5v-5h5v-5h5h5v5v5h-5v5h5v5h-5h-5\n"; 
echo "          v5h5v5h5v5v5h-5v5h5h5h5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5h-5v-5v-5h-5v5H108z M98,118h-5v-5h5V118z M98,103h-5h-5v-5v-5v-5\n"; 
echo "          h5h5h5v5v5v5H98z M123,118v5h-5h-5v-5h-5h-5v-5h5v-5h5v5v5h5v-5h5V118z M118,98h5v5h-5h-5v-5H118z\"/>\n"; 
echo "     <path fill=\"#334158\" d=\"M28,93h-5h-5h-5H8H3v5v5v5v5v5v5v5h5h5h5h5h5h5h5v-5v-5v-5v-5v-5v-5v-5h-5H28z M33,103v5v5v5v5h-5h-5h-5h-5\n"; 
echo "          H8v-5v-5v-5v-5v-5h5h5h5h5h5V103z\"/>\n"; 
echo "     <rect x=\"93\" y=\"93\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"63,98 68,98 68,93 63,93 58,93 53,93 53,88 48,88 48,83 43,83 43,78 48,78 48,73 43,73 43,68 \n"; 
echo "          48,68 53,68 53,63 58,63 58,68 63,68 63,63 63,58 68,58 73,58 73,63 78,63 78,58 83,58 83,53 78,53 78,48 83,48 83,43 83,38 78,38 \n"; 
echo "          78,33 73,33 73,38 73,43 68,43 68,38 68,33 63,33 63,38 63,43 63,48 68,48 73,48 73,53 68,53 63,53 58,53 58,58 53,58 53,53 53,48 \n"; 
echo "          58,48 58,43 53,43 48,43 43,43 38,43 33,43 33,48 38,48 38,53 33,53 33,58 38,58 43,58 43,63 38,63 33,63 33,68 38,68 38,73 33,73 \n"; 
echo "          28,73 28,68 28,63 33,63 33,58 28,58 23,58 18,58 18,63 23,63 23,68 18,68 18,73 23,73 23,78 28,78 33,78 38,78 38,83 33,83 33,88 \n"; 
echo "          38,88 43,88 43,93 43,98 48,98 48,103 53,103 53,98 58,98 58,103 58,108 63,108 63,103  \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"18,103 13,103 13,108 13,113 13,118 18,118 23,118 28,118 28,113 28,108 28,103 23,103     \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"48,108 48,103 43,103 43,108 43,113 43,118 43,123 43,128 48,128 53,128 53,123 48,123 48,118 \n"; 
echo "          48,113 53,113 58,113 58,108 53,108      \"/>\n"; 
echo "     <polygon fill=\"#334158\" points=\"78,118 78,113 78,108 73,108 68,108 63,108 63,113 68,113 68,118 63,118 63,123 63,128 68,128 \n"; 
echo "          68,123 73,123 73,118     \"/>\n"; 
echo "     <rect x=\"73\" y=\"123\" fill=\"#334158\" width=\"5\" height=\"5\"/>\n"; 
echo "</g>\n"; 
echo "  </symbol>\n"; 
echo "</svg>\n"; 
echo "  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>\n"; 
echo "\n"; 
echo "    <script src=\"../js/index.js\"></script>\n";
}
?>




