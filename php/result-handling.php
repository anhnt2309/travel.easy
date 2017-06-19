<!DOCTYPE html>
<html>
<head>
	<title>Flight's Results</title>
	<meta charset="utf-8">
 <!-- Theme CSS -->
 <!-- <link rel="stylesheet" type="text/css" href="../css/agency.min.css"> -->
 <!-- Bootstrap Core CSS -->
<!--     <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-iso.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
-->
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400'>

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/filter_aside.css">

<link rel="stylesheet" media="all" type="text/css" href="../css/result-holder.css">
<link rel="stylesheet" media="all" type="text/css" href="../css/preloader.css">
<link rel="stylesheet" media="all" type="text/css" href="../css/result_detail.css">

<!--     <link rel="stylesheet" media="all" type="text/css" href="../css/font-awesome.min.css">
 <!-- Bootstrap Core CSS -->
 <link href="../css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom Fonts -->
 <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="../css/css.css">
 <link rel="stylesheet" type="text/css" href="../css/css1.css">
 <link rel="stylesheet" type="text/css" href="../css/css2.css">
 <link rel="stylesheet" type="text/css" href="../css/css3.css">
 <!-- <link rel="stylesheet" type="text/css" href="../css/form.css"> -->

 <!-- Theme CSS -->
 <link rel="stylesheet" type="text/css" href="../css/agency.min.css">

 <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->



 <!-- Contact Form JavaScript -->
 <script src="../js/jqBootstrapValidation.js"></script>
 <script src="../js/contact_me.js"></script>

 <script type="text/javascript">
	//Wait for window load
	$(window).on('load', function () {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
	$(document).ready(function(){
          $("#previous a").addClass("disable-button");
          var pageSize = 10;
          //show page
          showPage = function(page) {
            $(".content").hide();
            $(".content").each(function(n) {
               // alert($(this).attr("class"));  if($(this).arrt("class") == "content"){
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();

          });        
       }

       showPageFilter = function(page) {
            $('*>[class=content]').hide();
            $('*>[class=content]').each(function(n) {
               // alert($(this).attr("class"));  if($(this).arrt("class") == "content"){
                if (n >= pageSize * (page - 1) && n < pageSize * page)
                    $(this).show();

          });        
       }

       //intial 
       showPage(1);

       $("#pagin li .pagination-item-filter").on('click',function(){

          alert("ânnna");
     });


       //show when click pagination number
       $("#pagin li").click(function() {
          alert("a");
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
//previous click
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
                               if(!$("#filter_idINPUT_21").is(":checked")){
                                   alert($(this).text());
                                   showPageFilter(parseInt($(this).text()));
                              }else{
                               showPage(pre_Active) ;

                          }
                     }

                });
     }

}
//next click 
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
                               if(!$("#filter_idINPUT_21").is(":checked")){
                                   alert($(this).text());
                                   showPageFilter(parseInt($(this).text()));
                              }else{
                               showPage(next_Active) ;
                          }




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
   if(!$("#filter_idINPUT_21").is(":checked")){
     alert($(this).text());
     showPageFilter(parseInt($(this).text()));
}else{
   showPage(parseInt($(this).text())) ;
}
}
});



//filter

$("#filter_idINPUT_21").on('click', function() {

     // alert("abc");content
     var isStop = 0;
     var nonstop=0;
     $(".content #DIV_2 #SECTION_7 #DIV_10 #DIV_15 #DIV_19  #SPAN_20").each(function(n){
      if($(this).text().replace(/^\s+|\s+$/g,'')  !="1 Stop"){
               // alert("is 1 stop");
               if($("#filter_idINPUT_21").is(":checked")){
                    nonstop = 1;
                    $('.pagination-item-filter').remove();
                    $('.pagination-item').show();
                    $(this).parents("#ARTICLE_1").removeClass("filter_disabled");
                    // $(".pagination-item").show();
                    $(this).parents("#ARTICLE_1").show();
                    showPage(1);
               }else{

                    $(this).parents("#ARTICLE_1").addClass("filter_disabled");

                    $(this).parents("#ARTICLE_1").hide();
                    

               }
                 // if(!$(this).parents("#ARTICLE_1").hasClass(".filter_disabled")){
                 //    isStop = isStop +1;
          // }


     }
});


     alert("is non stop:"+ $(".filter_disabled").size());

     if($('*>[class=content]').size() >0){

          $('*>[class=pagination-item]').hide();
          $('.is-active').hide();
          $('#first').hide();
          var filteredSize = $('*>[class=content]').size();
          var numberOfItem =10;
          var numOfPage = Math.ceil(filteredSize / numberOfItem);
          alert(numOfPage);
          if(nonstop == 0){
               for(var i=1;i <=numOfPage;i++){
                    if(i ==1){
                         $("#next").before("<li id='first' class='pagination-item-filter first-number is-active'> <a class='pagination-link' href='#''>" +i+"</a> </li>");
                    }else{
                         $("#next").before("<li class='pagination-item-filter '> <a class='pagination-link' href='#''>" +i+"</a> </li>");
                    } 
               }
               showPageFilter(1);
          }
          
     }

});



$("#filter_idINPUT_26").on('click', function() {

     // alert("abc");content
     var isStop = 0;
     var nonstop=0;
     $(".content #DIV_2 #SECTION_7 #DIV_10 #DIV_15 #DIV_19  #SPAN_20").each(function(n){
      if($(this).text().replace(/^\s+|\s+$/g,'')  =="1 Stop"){
               // alert("is 1 stop");
               if($("#filter_idINPUT_26").is(":checked")){
                    nonstop = 1;
                    $('.pagination-item-filter').remove();
                    $('.pagination-item').show();
                    $(this).parents("#ARTICLE_1").removeClass("filter_disabled");
                    // $(".pagination-item").show();
                    $(this).parents("#ARTICLE_1").show();
                    showPage(1);
               }else{

                    $(this).parents("#ARTICLE_1").addClass("filter_disabled");

                    $(this).parents("#ARTICLE_1").hide();
                    

               }
                 // if(!$(this).parents("#ARTICLE_1").hasClass(".filter_disabled")){
                 //    isStop = isStop +1;
          // }


     }
});


     alert("is non stop:"+ $(".filter_disabled").size());

     if($('*>[class=content]').size() >0){

          $('*>[class=pagination-item]').hide();
          $('.is-active').hide();
          $('#first').hide();
          var filteredSize = $('*>[class=content]').size();
          var numberOfItem =10;
          var numOfPage = Math.ceil(filteredSize / numberOfItem);
          alert(numOfPage);
          if(nonstop == 0){
               for(var i=1;i <=numOfPage;i++){
                    if(i ==1){
                         $("#next").before("<li id='first' class='pagination-item-filter first-number is-active'> <a class='pagination-link' href='#''>" +i+"</a> </li>");
                    }else{
                         $("#next").before("<li class='pagination-item-filter '> <a class='pagination-link' href='#''>" +i+"</a> </li>");
                    } 
               }
               showPageFilter(1);
          }
          
     }

});

});

</script>
</head>
<body>
	<div class="se-pre-con">
     <div id="logo" style="    position: absolute;
    padding-left: 40% !important;
    padding-top: 35%;
    animation-delay: 0s;
    color: #fff;
    text-transform: initial;
    font-size: 300%;
    font-family: 'Kaushan Script','Helvetica Neue',Helvetica,Arial,cursive;" href="#page-top">Travel.easy</div>
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

<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" style="background-color: #222; padding: 10px 0;" >

    <!-- <div class="nav-background"></div> --> <!--blur background-->
    <div class="container">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header page-scroll">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
          </button>
          <a id="logo"  style="-webkit-animation-delay: 1.5s;    font-size: 1.5em !important;" class="navbar-brand page-scroll" href="#page-top">Travel.easy</a>
     </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" id="nav_load" style="-webkit-animation-delay: 1.5s">
          <li class="hidden">
              <a href="#page-top"></a>
         </li>
                    <!--<li>
                        <a class="page-scroll" href="#services">Services</a>
                   </li>-->
                   <li>
                        <a class="page-scroll" href="#Top">Results </a>
                   </li>

                     <li>
                        <a class="page-scroll" href="#POI">City's POI </a>
                   </li>

                   <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                   </li>
                   <li>
                        <li class="dropdown" style="margin-left: 550px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="login" style="border-radius: 3px;">
                                <span class="glyphicon glyphicon-user"></span>  Login<span class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Login with
                                                <div class="social-buttons">
                                                    <a href="#" class="btn btn-fb"> Facebook</a>
                                                    <a href="#" class="btn btn-tw">Twitter</a>
                                               </div>
                                               or
                                               <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                   </div>
                                                   <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                        <div class="help-block text-right"><a href="" style="
                                                            color: #428bca;">Forget the password ?</a></div>
                                                       </div>
                                                       <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                                       </div>
                                                       <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> Keep me logged-in
                                                           </label>
                                                      </div>
                                                 </form>
                                            </div>
                                            <div class="bottom text-center">
                                               New here ? <a href="#dangky" class="portfolio-link" data-toggle="modal"  style=" 
                                               color: #428bca;"><b>Join Us</b></a>
                                          </div>
                                     </div>
                                </li>
                           </ul>
                      </li>

                 </li>
            </ul>
       </div>
       <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<div class='result-wrapper'>




     <?php 
     include 'result-model.php';
     include 'find-airline.php';
     include 'findCity.php';
     // include 'mapping.php';
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







	//get airport code only
    $from_airport_temp = $from_airport;
    $from_airport = substr($from_airport, strpos($from_airport, '(') +1);
    $from_airport = strtok($from_airport, ')');

    $from_airport_name = strtok($from_airport_temp, '(');

    $to_airport_temp = $to_airport;
    $to_airport = substr($to_airport, strpos($to_airport, '(') +1);
    $to_airport = strtok($to_airport, ')');

    $to_airport_name = strtok($to_airport_temp, '(');

//search detail
    echo "<div class=\"search-detail\" style=\"
    padding-bottom: 80px;\"> \n"; 
    echo "<div class=\"boarding-pass\">\n"; 
    echo "  <header>\n"; 
    echo "    <div class=\"logo\">\n"; 
    echo "      <a id=\"logo\" style=\"animation-delay: 0s; color: #fff;text-transform: initial;font-size: 150%;
    font-family: 'Kaushan Script','Helvetica Neue',Helvetica,Arial,cursive;\" href=\"#page-top\">Travel.easy</a>"; 
    echo "    </div>\n"; 
    echo "    <div class=\"flight\">\n"; 
    echo "      <strong>Search Details</strong>\n"; 
    echo "    </div>\n"; 
    echo "  </header>\n"; 
    echo "  <section class=\"cities\">\n"; 
    echo "    <div class=\"city\" style=\"padding-left: 10%;\">\n"; 
    echo "      <small>$from_airport_name</small>\n"; 
    echo "\n"; 
    echo "      <strong>$from_airport</strong>\n"; 
    echo "    </div>\n"; 
    echo "    <div class=\"city\" style=\"padding-right: 10%;\">\n"; 
    echo "      <small>$to_airport_name</small>\n"; 
    echo "\n"; 
    echo "      <strong>$to_airport</strong>\n"; 
    echo "    </div>\n"; 
    echo "    <svg class=\"airplane\">\n"; 
    echo "      <use xlink:href=\"#airplane\"></use>\n"; 
    echo "    </svg>\n"; 
    echo "  </section>\n"; 
    echo "  <section class=\"infos\"  style=\" height: 160px; \">\n"; 
    echo "    <div class=\"places\">\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Adults</small>\n"; 
    echo "        <strong><em>$adults</em></strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Childrens</small>\n"; 
    echo "        <strong><em>$children</em></strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Infants</small>\n"; 
    echo "        <strong>$infants</strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Non-stop only</small>\n"; 
    echo "        <strong>$nonstop</strong>\n"; 
    echo "      </div>\n"; 
    echo "    </div>\n"; 
    echo "    <div class=\"times\">\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Departure Date</small>\n"; 
    echo "        <strong>$start_date</strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Return Date</small>\n"; 
    echo "        <strong>$end_date</strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Class</small>\n"; 
    echo "        <strong>$classes</strong>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"box\">\n"; 
    echo "        <small>Currency</small>\n"; 
    echo "        <strong>$currency</strong>\n"; 
    echo "      </div>\n"; 
    echo "    </div>\n"; 
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
    echo "</div>\n";



//filter
    echo "<div class=\"day-filters\" id=\"filter_idDIV_1\">\n"; 
    echo "   <div class=\"price-alerts\" id=\"filter_idDIV_2\"><button id=\"filter_idBUTTON_3\" class=\"fss-alerts-button fss-secondary\" title=\"Nhận thông báo giá\"><span class=\"price-alerts-icon\" aria-hidden=\"true\" id=\"filter_idSPAN_4\"></span><span class=\"price-alerts-message\" id=\"filter_idSPAN_5\">Flights Filter</span></button></div>\n"; 
    echo "   <div id=\"filter_idDIV_6\" class=\"fss-flight-controls inline\">\n"; 
    echo "      <div class=\"flight-controls-cover hidden\" id=\"filter_idDIV_7\">\n"; 
    echo "         <div class=\"hot-spinner medium\" id=\"filter_idDIV_8\"></div>\n"; 
    echo "         <div id=\"filter_idDIV_9\">Loading...</div>\n"; 
    echo "      </div>\n"; 
    echo "      <div class=\"flight-controls-content\" id=\"filter_idDIV_10\">\n"; 
    echo "         <dl data-id=\"stops\" class=\"mobile-filters-stops\" id=\"filter_idDL_11\">\n"; 
    echo "            <dt id=\"filter_idDT_12\"><a href=\"#\" class=\"clearfix\" id=\"filter_idA_13\"><span id=\"filter_idSPAN_14\">Stops</span><span class=\"chevron\" aria-hidden=\"true\" id=\"filter_idSPAN_15\"></span></a></dt>\n"; 
    echo "            <dd class=\"filter-opts\" id=\"filter_idDD_16\">\n"; 
    echo "               <ol id=\"filter_idOL_17\">\n"; 
    echo "                  <li data-id=\"direct\" id=\"filter_idLI_18\"><label class=\"clearfix  two-line\" id=\"filter_idLABEL_19\"><span class=\"label-text\" id=\"filter_idSPAN_20\">Non-stop</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_21\"><span class=\"filter-sub\" id=\"filter_idSPAN_22\">1.010.000 ₫</span></label></li>\n"; 
    echo "                  <li data-id=\"one_stop\" id=\"filter_idLI_23\"><label class=\"clearfix  two-line\" id=\"filter_idLABEL_24\"><span class=\"label-text\" id=\"filter_idSPAN_25\">1 stop</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_26\"><span class=\"filter-sub\" id=\"filter_idSPAN_27\">3.378.885 ₫</span></label></li>\n"; 
 // echo "                  <li data-id=\"two_plus_stops\" id=\"filter_idLI_28\"><label class=\"clearfix disabled two-line\" id=\"filter_idLABEL_29\"><span class=\"label-text\" id=\"filter_idSPAN_30\">2+ chặng dừng</span><input type=\"checkbox\" checked=\"checked\" disabled=\"disabled\" id=\"filter_idINPUT_31\"><span class=\"filter-sub\" id=\"filter_idSPAN_32\">Không có</span></label></li>\n"; 
    echo "               </ol>\n"; 
    echo "            </dd>\n"; 
    echo "         </dl>\n"; 
    echo "         <dl data-id=\"departure_times\" class=\"mobile-filters-departure-times\" id=\"filter_idDL_33\">\n"; 
    echo "            <dt id=\"filter_idDT_34\"><a href=\"#\" class=\"clearfix\" id=\"filter_idA_35\"><span id=\"filter_idSPAN_36\">Departure Time</span><span class=\"chevron\" aria-hidden=\"true\" id=\"filter_idSPAN_37\"></span></a></dt>\n"; 
    echo "            <dd class=\"filter-opts slider-opts\" id=\"filter_idDD_38\">\n"; 
    echo "               <h4 id=\"filter_idH4_39\">Departure </h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_40\">00:00 – 23:59</div>\n"; 
    echo "               <div class=\"departure-times-slider noUi-target noUi-ltr noUi-horizontal noUi-background\" data-cid=\"model_280\" data-index=\"0\" id=\"filter_idDIV_41\">\n"; 
    echo "                  <div class=\"noUi-base\" id=\"filter_idDIV_42\">\n"; 
    echo "                     <div class=\"noUi-origin noUi-connect\" style=\"left: 0%;\" id=\"filter_idDIV_43\">\n"; 
    echo "                        <div class=\"noUi-handle noUi-handle-lower\" id=\"filter_idDIV_44\"></div>\n"; 
    echo "                     </div>\n"; 
    echo "                     <div class=\"noUi-origin noUi-background\" style=\"left: 100%;\" id=\"filter_idDIV_45\">\n"; 
    echo "                        <div class=\"noUi-handle noUi-handle-upper\" id=\"filter_idDIV_46\"></div>\n"; 
    echo "                     </div>\n"; 
    echo "                  </div>\n"; 
    echo "               </div>\n"; 
    echo "            </dd>\n"; 
    echo "            <dd class=\"filter-opts slider-opts hidden\" id=\"filter_idDD_47\">\n"; 
    echo "               <h4 id=\"filter_idH4_48\"></h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_49\"></div>\n"; 
    echo "               <div class=\"departure-times-slider\" id=\"filter_idDIV_50\"></div>\n"; 
    echo "            </dd>\n"; 
    echo "            <dd class=\"filter-opts slider-opts hidden\" id=\"filter_idDD_51\">\n"; 
    echo "               <h4 id=\"filter_idH4_52\"></h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_53\"></div>\n"; 
    echo "               <div class=\"departure-times-slider\" id=\"filter_idDIV_54\"></div>\n"; 
    echo "            </dd>\n"; 
    echo "            <dd class=\"filter-opts slider-opts hidden\" id=\"filter_idDD_55\">\n"; 
    echo "               <h4 id=\"filter_idH4_56\"></h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_57\"></div>\n"; 
    echo "               <div class=\"departure-times-slider\" id=\"filter_idDIV_58\"></div>\n"; 
    echo "            </dd>\n"; 
    echo "            <dd class=\"filter-opts slider-opts hidden\" id=\"filter_idDD_59\">\n"; 
    echo "               <h4 id=\"filter_idH4_60\"></h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_61\"></div>\n"; 
    echo "               <div class=\"departure-times-slider\" id=\"filter_idDIV_62\"></div>\n"; 
    echo "            </dd>\n"; 
    echo "            <dd class=\"filter-opts slider-opts hidden\" id=\"filter_idDD_63\">\n"; 
    echo "               <h4 id=\"filter_idH4_64\"></h4>\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_65\"></div>\n"; 
    echo "               <div class=\"departure-times-slider\" id=\"filter_idDIV_66\"></div>\n"; 
    echo "            </dd>\n"; 
    echo "         </dl>\n"; 
    echo "         <dl data-id=\"duration\" class=\"mobile-filters-journey-duration\" id=\"filter_idDL_67\">\n"; 
    echo "            <dt id=\"filter_idDT_68\"><a href=\"#\" class=\"clearfix\" id=\"filter_idA_69\"><span id=\"filter_idSPAN_70\">Flights Duration</span><span class=\"chevron\" aria-hidden=\"true\" id=\"filter_idSPAN_71\"></span></a></dt>\n"; 
    echo "            <dd class=\"filter-opts slider-opts\" id=\"filter_idDD_72\">\n"; 
    echo "               <div class=\"time-range\" id=\"filter_idDIV_73\">1 hours – 18.5 hours</div>\n"; 
    echo "               <div class=\"duration-slider noUi-target noUi-ltr noUi-horizontal noUi-connect\" id=\"filter_idDIV_74\">\n"; 
    echo "                  <div class=\"noUi-base\" id=\"filter_idDIV_75\">\n"; 
    echo "                     <div class=\"noUi-origin noUi-background noUi-stacking\" style=\"left: 100%;\" id=\"filter_idDIV_76\">\n"; 
    echo "                        <div class=\"noUi-handle noUi-handle-lower\" id=\"filter_idDIV_77\"></div>\n"; 
    echo "                     </div>\n"; 
    echo "                  </div>\n"; 
    echo "               </div>\n"; 
    echo "            </dd>\n"; 
    echo "         </dl>\n"; 
    echo "         <dl data-id=\"airlines\" class=\"mobile-filters-airlines\" id=\"filter_idDL_78\">\n"; 
    echo "            <dt id=\"filter_idDT_79\"><a href=\"#\" class=\"clearfix\" id=\"filter_idA_80\"><span id=\"filter_idSPAN_81\">Airlines</span><span class=\"chevron\" aria-hidden=\"true\" id=\"filter_idSPAN_82\"></span></a></dt>\n"; 
    echo "            <dd class=\"filter-opts\" id=\"filter_idDD_83\">\n"; 
 // echo "               <div class=\"secondary-options helper-nav\" id=\"filter_idDIV_84\"><button class=\"select-all\" disabled=\"\" id=\"filter_idBUTTON_85\">Chọn tất cả</button><button class=\"clear-all\" id=\"filter_idBUTTON_86\">Xóa tất cả</button></div>\n"; 
 // echo "               <ol class=\"alliances\" id=\"filter_idOL_87\">\n"; 
 // echo "                  <li data-id=\"-32000\" id=\"filter_idLI_88\"><input type=\"checkbox\" id=\"filter_idINPUT_89\" disabled=\"\"><label for=\"alliance-32000\" class=\"disabled\" id=\"filter_idLABEL_90\">oneworld (không)</label></li>\n"; 
 // echo "                  <li data-id=\"-31998\" id=\"filter_idLI_91\"><input type=\"checkbox\" id=\"filter_idINPUT_92\"><label for=\"alliance-31998\" id=\"filter_idLABEL_93\"> SkyTeam</label></li>\n"; 
 // echo "                  <li data-id=\"-31999\" id=\"filter_idLI_94\"><input type=\"checkbox\" id=\"filter_idINPUT_95\" disabled=\"\"><label for=\"alliance-31999\" class=\"disabled\" id=\"filter_idLABEL_96\">Star Alliance (không)</label></li>\n"; 
    echo "               </ol>\n"; 
    echo "               <ol class=\"airlines\" id=\"filter_idOL_97\">\n"; 
    echo "                  <li data-id=\"-31412\" id=\"filter_idLI_98\"><label class=\"clearfix two-line\" id=\"filter_idLABEL_99\"><span class=\"label-text\" id=\"filter_idSPAN_100\">Hahn Air Systems</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_101\"><span class=\"filter-sub\" id=\"filter_idSPAN_102\">2.481.459 ₫</span></label></li>\n"; 
    echo "                  <li data-id=\"-32166\" id=\"filter_idLI_103\"><label class=\"clearfix two-line\" id=\"filter_idLABEL_104\"><span class=\"label-text\" id=\"filter_idSPAN_105\">Jetstar</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_106\"><span class=\"filter-sub\" id=\"filter_idSPAN_107\">1.076.000 ₫</span></label></li>\n"; 
    echo "                  <li data-id=\"-31705\" id=\"filter_idLI_108\"><label class=\"clearfix two-line\" id=\"filter_idLABEL_109\"><span class=\"label-text\" id=\"filter_idSPAN_110\">VietJet Air</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_111\"><span class=\"filter-sub\" id=\"filter_idSPAN_112\">1.010.000 ₫</span></label></li>\n"; 
    echo "                  <li data-id=\"-31703\" id=\"filter_idLI_113\"><label class=\"clearfix two-line\" id=\"filter_idLABEL_114\"><span class=\"label-text\" id=\"filter_idSPAN_115\">Vietnam Airlines</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_116\"><span class=\"filter-sub\" id=\"filter_idSPAN_117\">1.471.000 ₫</span></label></li>\n"; 
    echo "                  <li data-id=\"multi\" id=\"filter_idLI_118\"><label class=\"clearfix two-line\" id=\"filter_idLABEL_119\"><span class=\"label-text\" id=\"filter_idSPAN_120\">Multiple Airlines</span><input type=\"checkbox\" checked=\"checked\" id=\"filter_idINPUT_121\"><span class=\"filter-sub\" id=\"filter_idSPAN_122\">3.658.342 ₫</span></label></li>\n"; 
    echo "               </ol>\n"; 
    echo "            </dd>\n"; 
    echo "         </dl>\n"; 
    echo "         <dl data-id=\"airports\" class=\"mobile-filters-airports hidden\" id=\"filter_idDL_123\"></dl>\n"; 
    echo "      </div>\n"; 
    echo "   </div>\n"; 
    echo "</div>\n";


    $url = "https://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&origin=".$from_airport."&destination=".$to_airport."&departure_date=".$start_date."&return_date=". $end_date."&adults=".$adults."&children=".$children."&infants=".$infants."&nonstop=".$nonstop."&max_price=".$maxPrice."&currency=".$currency."&travel_class=".$classes;
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
      // echo "<pre>";
      // print_r($response_array);
      // echo "<pre>";
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
	//create inbound flight object 
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
     echo "<article id='ARTICLE_1' class='content' style='height: 225px;'  data-toggle='modal' data-target='#myModal".$total_flight."' > ";
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

          $aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$return_info->aircraft);

          $date = new DateTime($start_date);
          $formatedDate = date_format($date,'d-m-Y');

          if(strcasecmp($return_info->operating_airline,"BL") == 0){
               $airline->website= $airline->website."//vn/vi/home?origin=".$from_airport."&destination=".$to_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
          }
          //  if(strcasecmp($return_info->operating_airline,"VN") == 0){
          //      $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=RT&origin=".$from_airport."&destination=".$to_airport."&departureDate=".$formatedDate."&returnDate="."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
          // }


          // https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?searchType=NORMAL&journeySpan=RT&origin=SGN&destination=DLI&departureDate=2017-06-29&returnDate=2017-07-30&numAdults=1&numChildren=0&numInfants=0&alternativeLandingPage=true&promoCode=&lang=en_US


// https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?searchType=NORMAL&journeySpan=OW&origin=SGN&destination=DLI&departureDate=2017-06-15&numAdults=1&numChildren=0&numInfants=0&alternativeLandingPage=true&promoCode=&lang=en_US
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

                // $aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->aircraft);

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
// echo '<br>';

echo '<!-- Modal -->';
echo "<div class='modal fade' id='myModal".$total_flight."' role='dialog'>";
echo '<div class="modal-dialog">';
echo '<!-- Modal content-->';
echo '<div class="modal-content" style="    height: 650px;overflow: auto;" >';
echo '<div class="modal-header">';
echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
echo '<h4 class="modal-title">Flight Details</h4>';
echo '</div>';
echo '<div class="modal-body">';

if(strcasecmp(get_class($allFlights->departFlight),"HasStopFlight") != 0)     {
     //depart non stop
    //get hour
    $arrive_date = strtok($allFlights->departFlight->departs_at, "T");
    $departs_date = strtok($allFlights->departFlight->arrives_at, "T");

    $arrive_time = substr($allFlights->departFlight->departs_at, strpos($allFlights->departFlight->departs_at, 'T') +1);
    $departs_time = substr($allFlights->departFlight->arrives_at, strpos($allFlights->departFlight->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));

                    //get flight duration
    $departs_datetime = new DateTime($departs_date." ".$departs_time);
    $flight_duration_object = $departs_datetime->diff(new DateTime($arrive_date." ".$arrive_time));

    $flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";

                    //get airline information
    if($index==0){
     $airline = getAirlines($allFlights->departFlight->operating_airline);
}

$aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->departFlight->aircraft);

$date = new DateTime($start_date);
$formatedDate = date_format($date,'d-m-Y');

$total_money_on_return = number_format($allFlights->departFlight->total_price).$currency;

if(strcasecmp($allFlights->departFlight->operating_airline,"BL") == 0){
     $airline->website= $airline->website."//vn/vi/home?origin=".$from_airport."&destination=".$to_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}
if(strcasecmp($allFlights->departFlight->operating_airline,"VN") == 0){
     $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$from_airport."&destination=".$to_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
}



// echo "<div style=\"padding-top:100px !important\"></div>";
noStopFlightDetail("Depart",$departs_date,$departs_time,$arrive_date,$arrive_time,$from_airport,$to_airport,$airline,$allFlights->departFlight,$flight_duration,$aircraft,$total_money_on_return,$from_airport_name,$to_airport_name);
}
else{
// depart has stop 
     $first_arrive_date = strtok($allFlights->departFlight->firstHalfFlight->arrives_at, "T");
     $first_departs_date = strtok($allFlights->departFlight->firstHalfFlight->departs_at, "T");

     $second_departs_date = strtok($allFlights->departFlight->secondHalfFlight->departs_at, "T");
     $second_arrive_date = strtok($allFlights->departFlight->secondHalfFlight->arrives_at, "T");


     $stop_airport = findCityName($allFlights->departFlight->firstHalfFlight->destination_airport);

     $first_arrive_time = substr($allFlights->departFlight->firstHalfFlight->arrives_at, strpos($allFlights->departFlight->firstHalfFlight->departs_at, 'T') +1);

     $first_departs_time = substr($allFlights->departFlight->firstHalfFlight->departs_at, strpos($allFlights->departFlight->firstHalfFlight->arrives_at, 'T') +1);

     $second_arrive_time = substr($allFlights->departFlight->secondHalfFlight->arrives_at, strpos($allFlights->departFlight->secondHalfFlight->departs_at, 'T') +1);


     $second_departs_time = substr($allFlights->departFlight->secondHalfFlight->departs_at, strpos($allFlights->departFlight->secondHalfFlight->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));
     $date = new DateTime($start_date);
     $formatedDate = date_format($date,'d-m-Y');

                    //get airline information
     // if($index==0){
          $airline = getAirlines($allFlights->departFlight->firstHalfFlight->operating_airline);
          $second_airline= getAirlines($allFlights->departFlight->secondHalfFlight->operating_airline);
     // }

     if(strcasecmp($allFlights->departFlight->firstHalfFlight->operating_airline,"BL") == 0){
          $airline->website= $airline->website."//vn/vi/home?origin=".$allFlights->departFlight->firstHalfFlight->origin_airport."&destination=".$allFlights->departFlight->firstHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
     }

     if(strcasecmp($allFlights->departFlight->secondHalfFlight->operating_airline,"BL") == 0){
          $second_airline->website= $second_airline->website."//vn/vi/home?origin=".$allFlights->departFlight->secondHalfFlight->origin_airport."&destination=".$allFlights->departFlight->secondHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
     }


     if(strcasecmp($allFlights->departFlight->firstHalfFlight->operating_airline,"VN") == 0){
          $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->departFlight->firstHalfFlight->origin_airport."&destination=".$allFlights->departFlight->firstHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
     }

     if(strcasecmp($allFlights->departFlight->secondHalfFlight->operating_airline,"VN") == 0){
          $second_airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->departFlight->secondHalfFlight->origin_airport."&destination=".$allFlights->departFlight->secondHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
     }    
     $first_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->departFlight->firstHalfFlight->aircraft);

     $second_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->departFlight->secondHalfFlight->aircraft);

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
// echo "";
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

     $total_hasstop_flight = $allFlights->departFlight->firstHalfFlight->total_price + $allFlights->departFlight->secondHalfFlight->total_price ;

// echo "<div style=\"padding-top:100px !important\"></div>";
hasStopFlightDetail("Depart",$first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$second_airline,$allFlights->departFlight,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration,$from_airport_name,$to_airport_name,$stop_airport);

}

if(strcasecmp(get_class($allFlights->returnFlight),"HasStopFlight") != 0)     {

 //get hour
    $arrive_date = strtok($allFlights->returnFlight->departs_at, "T");
    $departs_date = strtok($allFlights->returnFlight->arrives_at, "T");

    $arrive_time = substr($allFlights->returnFlight->departs_at, strpos($allFlights->returnFlight->departs_at, 'T') +1);
    $departs_time = substr($allFlights->returnFlight->arrives_at, strpos($allFlights->returnFlight->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));

                    //get flight duration
    $departs_datetime = new DateTime($departs_date." ".$departs_time);
    $flight_duration_object = $departs_datetime->diff(new DateTime($arrive_date." ".$arrive_time));

    $flight_duration = $flight_duration_object->h ."h ".$flight_duration_object->i."m";

                    //get airline information
    if($index==0){
     $airline = getAirlines($allFlights->returnFlight->operating_airline);
}

$aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$return_info->aircraft);

$date = new DateTime($start_date);
$formatedDate = date_format($date,'d-m-Y');

$total_money_on_return = number_format($allFlights->returnFlight->total_price).$currency;

if(strcasecmp($allFlights->returnFlight->operating_airline,"BL") == 0){
     $airline->website= $airline->website."//vn/vi/home?origin=".$from_airport."&destination=".$to_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}

if(strcasecmp($allFlights->returnFlight->operating_airline,"VN") == 0){
     $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$from_airport."&destination=".$to_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
}
if(strcasecmp(get_class($allFlights->departFlight),"HasStopFlight") == 0){ 
echo "<div style=\"padding-top:170px !important\"></div>";
}
noStopFlightDetail("Return",$departs_date,$departs_time,$arrive_date,$arrive_time,$allFlights->returnFlight->origin_airport,$allFlights->returnFlight->destination_airport,$airline,$allFlights->returnFlight,$flight_duration,$aircraft,$total_money_on_return,$to_airport_name,$from_airport_name);
}
else{
 $first_arrive_date = strtok($allFlights->returnFlight->firstHalfFlight->arrives_at, "T");
     $first_departs_date = strtok($allFlights->returnFlight->firstHalfFlight->departs_at, "T");

     $second_departs_date = strtok($allFlights->returnFlight->secondHalfFlight->departs_at, "T");
     $second_arrive_date = strtok($allFlights->returnFlight->secondHalfFlight->arrives_at, "T");


     $stop_airport = findCityName($allFlights->returnFlight->firstHalfFlight->destination_airport);

     $first_arrive_time = substr($allFlights->returnFlight->firstHalfFlight->arrives_at, strpos($allFlights->returnFlight->firstHalfFlight->departs_at, 'T') +1);

     $first_departs_time = substr($allFlights->returnFlight->firstHalfFlight->departs_at, strpos($allFlights->returnFlight->firstHalfFlight->arrives_at, 'T') +1);

     $second_arrive_time = substr($allFlights->returnFlight->secondHalfFlight->arrives_at, strpos($allFlights->returnFlight->secondHalfFlight->departs_at, 'T') +1);


     $second_departs_time = substr($allFlights->returnFlight->secondHalfFlight->departs_at, strpos($allFlights->returnFlight->secondHalfFlight->arrives_at, 'T') +1);
                    // $departs_time = date('h:i A', strtotime($departs_time));
     $date = new DateTime($start_date);
     $formatedDate = date_format($date,'d-m-Y');

                    //get airline information
     // if($index==0){
          $airline = getAirlines($allFlights->returnFlight->firstHalfFlight->operating_airline);
          $second_airline= getAirlines($allFlights->returnFlight->secondHalfFlight->operating_airline);
     // }

     if(strcasecmp($allFlights->returnFlight->firstHalfFlight->operating_airline,"BL") == 0){
          $airline->website= $airline->website."//vn/vi/home?origin=".$allFlights->returnFlight->firstHalfFlight->origin_airport."&destination=".$allFlights->returnFlight->firstHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
     }

     if(strcasecmp($allFlights->returnFlight->secondHalfFlight->operating_airline,"BL") == 0){
          $second_airline->website= $second_airline->website."//vn/vi/home?origin=".$allFlights->returnFlight->secondHalfFlight->origin_airport."&destination=".$allFlights->returnFlight->secondHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
     }


     if(strcasecmp($allFlights->returnFlight->firstHalfFlight->operating_airline,"VN") == 0){
          $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->returnFlight->firstHalfFlight->origin_airport."&destination=".$allFlights->returnFlight->firstHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
     }

     if(strcasecmp($allFlights->returnFlight->secondHalfFlight->operating_airline,"VN") == 0){
          $second_airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->returnFlight->secondHalfFlight->origin_airport."&destination=".$allFlights->returnFlight->secondHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
     }    
     $first_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->returnFlight->firstHalfFlight->aircraft);

     $second_aircraft = file_get_contents("https://ae.roplan.es/api/hex-type.php?hex=".$allFlights->returnFlight->secondHalfFlight->aircraft);

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
// echo "";
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

     $total_hasstop_flight = $allFlights->returnFlight->firstHalfFlight->total_price + $allFlights->returnFlight->secondHalfFlight->total_price ;
if(strcasecmp(get_class($allFlights->departFlight),"HasStopFlight") == 0){ 
echo "<div style=\"padding-top:170px !important\"></div>";
}
hasStopFlightDetail("Arrive",$first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$second_airline,$allFlights->returnFlight,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration,$from_airport_name,$to_airport_name,$stop_airport);



}
echo '</div>';
     // echo '<div class="modal-footer">';
     // echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
     // echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


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

if(strcasecmp($allFlights->operating_airline,"VN") == 0){
     $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$from_airport."&destination=".$to_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
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
// echo '<br class="content">';

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

noStopFlightDetail("Depart",$departs_date,$departs_time,$arrive_date,$arrive_time,$from_airport,$to_airport,$airline,$allFlights,$flight_duration,$aircraft,$total_money,$from_airport_name,$to_airport_name);

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


    $stop_airport = findCityName($allFlights->firstHalfFlight->destination_airport);

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
     $second_airline= getAirlines($allFlights->secondHalfFlight->operating_airline);
}

if(strcasecmp($allFlights->firstHalfFlight->operating_airline,"BL") == 0){
     $airline->website= $airline->website."//vn/vi/home?origin=".$allFlights->firstHalfFlight->origin_airport."&destination=".$allFlights->firstHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}

if(strcasecmp($allFlights->secondHalfFlight->operating_airline,"BL") == 0){
     $second_airline->website= $second_airline->website."//vn/vi/home?origin=".$allFlights->secondHalfFlight->origin_airport."&destination=".$allFlights->secondHalfFlight->destination_airport."&club-jetstar=0&adult=".$adults."&children=".$children."&infants=".$infants."&flexible=1&currency=VND&departure-date=".$formatedDate."";
}


if(strcasecmp($allFlights->firstHalfFlight->operating_airline,"VN") == 0){
     $airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->firstHalfFlight->origin_airport."&destination=".$allFlights->firstHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
}

if(strcasecmp($allFlights->secondHalfFlight->operating_airline,"VN") == 0){
     $second_airline->website= " https://wl-prod.sabresonicweb.com/SSW2010/VNVN/webqtrip.html?"."searchType=NORMAL&journeySpan=OW&origin=".$allFlights->secondHalfFlight->origin_airport."&destination=".$allFlights->secondHalfFlight->destination_airport."&departureDate=".$start_date."&numAdults=".$adults."&numChildren=".$children."&numInfants=".$infants."&alternativeLandingPage=true&promoCode=&lang=en_US";
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
// echo "";
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
echo '<br>';
echo '</article>';
// echo '<br class="content">';


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

hasStopFlightDetail("Depart",$first_arrive_date,$first_departs_date,$second_departs_date,$second_arrive_date,$first_arrive_time,$first_departs_time,$second_arrive_time,$second_departs_time,$from_airport,$to_airport,$airline,$second_airline,$allFlights,$first_flight_duration,$second_flight_duration,$first_aircraft,$second_aircraft,$currency,$stop_flight_duration,$from_airport_name,$to_airport_name,$stop_airport);

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
echo ' <ul id="pagin" class="pagination-custom" style="padding-right: 10%;adding-left: 10%;">';
echo ' <li id="previous" class="pagination-item--wide first"> <a class="pagination-link--wide first" href="#">Previous</a> </li>';
$numOfItem = 10;
                    	// echo $total_flight;
$numOfPage = ceil($total_flight/$numOfItem);
for ($i =1;$i <=$numOfPage;$i++){
  if($i ==1){
                    			// echo "<li><a class='current' href='#''>".$i."</a></li>";
     echo "<li id='first' class='pagination-item first-number is-active'> <a class='pagination-link' href='#''>".$i."</a> </li>";
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

</div>

<section id="POI" class="bg-light-gray " style="padding: 100px 0 !important;">
   <div class="container">
       <div class="row">
           <div class="col-lg-12 text-center wow rollIn">
               <h2 class="section-heading">City Points Of Interest</h2>
               <h3 class="section-subheading text-muted">Discover your destination city's famous places</h3>
          </div>
     </div>


     <div id="map_wrapper" style="height: 500px;">
          <div id="map_canvas" class="mapping" style=" width: 100%;height: 100%;"></div>
     </div>
</section>



<?php include '../php/mapping.php'  ?> 

<!-- Contact Section -->
<section id="contact" style="padding: 100px 0 !important;">
  <div class="container">
   <div class="row">
    <div class="col-lg-12 text-center">
     <h2 class="section-heading">Contact Us</h2>
     <h3 class="section-subheading text-muted">If you have any question or request, please feel free to contact with us.</h3>
</div>
</div>
<div class="row">
    <div class="col-lg-12">
     <form   id="contactForm"  novalidate>
      <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <input type="text" name="userName" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
         <p class="help-block text-danger"></p>
    </div>
    <div class="form-group">
         <input type="email" name="userEmail" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
         <p class="help-block text-danger"></p>
    </div>
    <div class="form-group">
         <input type="tel" name="userPhone" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
         <p class="help-block text-danger"></p>
    </div>
</div>
<div class="col-md-6">
   <div class="form-group">
    <textarea class="form-control" name="userMessage"  placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
    <p class="help-block text-danger"></p>
</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12 text-center">
   <div id="success"></div>
   <button   name="sendEmail" id="sendEmail" class="btn btn-xl">Send Message</button>
</div>
</div>
</form>
</div>
</div>
</div>
</section>

<footer>
   <div class="container">
       <div class="row">
           <div class="col-md-4">
               <span class="copyright">Copyright &copy; Travel.easy 2017</span>
          </div>
          <div class="col-md-4">
               <ul class="list-inline social-buttons">
                   <li><a href="#"><i class="fa fa-twitter"></i></a>
                   </li>
                   <li><a href="#"><i class="fa fa-facebook"></i></a>
                   </li>
                   <li><a href="#"><i class="fa fa-linkedin"></i></a>
                   </li>
              </ul>
         </div>
         <div class="col-md-4">
          <ul class="list-inline quicklinks">
              <li><a href="#">Privacy Policy</a>
              </li>
              <li><a href="#">Terms of Use</a>
              </li>
         </ul>
    </div>
</div>
</div>
</footer>
</body>
</html>