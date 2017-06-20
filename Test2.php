<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Travel.Easy</title>

    <!--momentjs-->
    <script src="js/moment.js" ></script>

    <script src='https://cdn.rawgit.com/LeaVerou/awesomplete/gh-pages/awesomplete.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="stylesheet" type="text/css" href="css/css1.css">
    <link rel="stylesheet" type="text/css" href="css/css2.css">
    <link rel="stylesheet" type="text/css" href="css/css3.css">
    <link rel="stylesheet" type="text/css" href="css/form.css">
    <!-- dependencies -->
    <script src="libs/moment.min.js"></script>
    <!-- <script src="libs/jquery-2.1.3.min.js"></script> -->
    <script src="libs/knockout-3.2.0.js"></script>
    <!-- /dependencies -->
    <script src="js/material.datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="css/material.datepicker.css">

    <script src="libs/datetimepicker.js"></script>

    <!--auto complete dependency-->
    <link rel="stylesheet" type="text/css" href="css/awesomplete.css" />
    <script src="js/awesomplete.js" ></script>


    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="css/agency.min.css">


    <!-- test meterial dialog -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel='stylesheet prefetch' href='https://cdn.gitcdn.xyz/cdn/angular/bower-material/v1.0.0-rc5-master-3d65dea/angular-material.css'>

     <!-- Buttons core css -->
  <link rel="stylesheet" href="css/buttons.css">

 <!-- animated csss -->
  <link rel="stylesheet" href="css/animate.css">
   <script src="js/animation.js" ></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
        <![endif]-->
        <style>

            .stylish-input-group .input-group-addon{
                background: white !important; 
            }
            .stylish-input-group .form-control{
                border-right:0; 
                box-shadow:0 0 0; 
                border-color:#ccc;
            }
            .stylish-input-group button{
                border:0;
                background:transparent;
            }
            #login-dp{
                min-width: 250px;
                padding: 14px 14px 0;
                overflow:hidden;
                background-color:rgba(255,255,255,.8);
            }
            #login-dp .help-block{
                font-size:12px    
            }
            #login-dp .bottom{
                background-color:rgba(255,255,255,.8);
                border-top:1px solid #ddd;
                clear:both;
                padding:14px;
            }
            #login-dp .social-buttons{
                margin:12px 0    
            }
            #login-dp .social-buttons a{
                width: 49%;
            }
            #login-dp .form-group {
                margin-bottom: 10px;
            }
            .btn-fb{
                color: #fff;
                background-color:#3b5998;
            }
            .btn-fb:hover{
                color: #fff;
                background-color:#496ebc 
            }
            .btn-tw{
                color: #fff;
                background-color:#55acee;
            }
            .btn-tw:hover{
                color: #fff;
                background-color:#59b5fa;
            }
            @media(max-width:768px){
                #login-dp{
                    background-color: inherit;
                    color: #fff;
                }
                #login-dp .bottom{
                    background-color: inherit;
                    border-top:0 none;
                }
            }

        </style>



<script src="js/wow.min.js"></script>

<script src="js/aos.js"></script>
  <link rel="stylesheet" href="css/aos.css">
  <script>
   AOS.init({
  duration: 1200,
})
  </script>


<script src="js/scrollspy.js"></script>  
            <!--   <script>
            
              new WOW().init();
              WOW.prototype.addBox = function(element){
                  this.boxes.push(element);
              };
              $('.wow').on('scrollSpy:exit',function(){
                  var element = $(this);
                  element.css({
                      'visibility' : 'hidden',
                      'animation-name' : 'none'
                  }).removeClass('animated');
                  wow.addBox(this);
              });
              </script> -->

        <script >
          $(document).ready(function(){
            $("#log-out").click(function(){
               $("#login").attr("href","#");
                    $("#login").attr("data-toggle","dropdown");
                    $("#login-text").text("Login");
                    <?php
                    // Unset all of the session variables.
                    $_SESSION = array();

                    // // If it's desired to kill the session, also delete the session cookie.
                    // // Note: This will destroy the session, and not just the session data!
                    // if (ini_get("session.use_cookies")) {
                    //     $params = session_get_cookie_params();
                    //     setcookie(session_name(), '', time() - 42000,
                    //         $params["path"], $params["domain"],
                    //         $params["secure"], $params["httponly"]
                    //     );
                    // }

                    // Finally, destroy the session.
                    session_destroy();
                    ?>
                    $(".close-modal").click();
            });


            $("#bkk").click(function(){

              $("#to-input").val($(this).attr("value"));
            });

            $("#facebook").click(function(){
              $str ="<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Error!!! This function is still in developing</strong> </div>";
              $("#notAvailable").html($str);
            })

            $("#twitter").click(function(){
              $str ="<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Error!!! This function is still in developing</strong> </div>";
              $("#notAvailable").html($str);
            })

            $("#log-in").click(function(){
              
              if($("#log-email").val()!="" && $("#log-pass").val() != ""){
                var email = $("#log-email").val();
                var pass =$("#log-pass").val();

                $.post("php/login.php",
                {
                        email:email,
                        pass:pass 
                },
                function(data,status){
                  if(status=="success"){
                    // alert(data);
                    if(data.substring(0,1)>0){
                      $logsuccesshtml = "  <div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Log in successfully!!!</strong> </div>  "
                      $("#log-result").html($logsuccesshtml);
                      setTimeout( myFunction, 1000);
                     function myFunction() {
                       $("#login").click(); 
                       $("#login").attr("href","#dangnhap");
                    $("#login").attr("data-toggle","modal");
                    $("#welcome").text("WELCOME" +data.substring(1,data.length));
                    }
                    $("#login-text").text(data.substring(1,data.length));


                     //pass email to session
                      // $("#login-dp").delay( 500 ).fadeOut(400);
                    }
                    else{
                      $logerrorhtml = " <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Email or Password is incorrect</strong> </div> "
                      $("#log-result").html($logerrorhtml);
                    }
                    
                   
                  }
                });
              }else{

                $logerrorhtml = " <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Error!!! Please fill out Email and Password to continue</strong> </div> "
                      $("#log-result").html($logerrorhtml);
              }
            });

            $(".register").click(function() {
              
              if($("#res-email").val()!="" && $("#res-first-name").val() != "" && $("#res-last-name").val() != "" && $("#res-pass").val() !=""){
                var lastName = $("#res-last-name").val();
                var firstName = $("#res-first-name").val();
                var address =$("#res-address").val();
                var city = $("#res-City").val();
                var state = $("#res-state").val();
                var zip = $("#res-zip").val();
                var title = $("#res-title").val();
                var company = $("#res-company").val();
                var phoneNumber= $("#res-phone-number").val();
                var email = $("#res-email").val();
                var pass=$("#res-pass").val();

                $.post("php/register.php",
                {
                  lastname:lastName,
                        firstname:firstName,
                        address:address,
                        city:city,
                        state:state,
                        zip:zip,
                        title:title,
                        company:company,
                        phone:phoneNumber,
                        email:email,
                        pass:pass 
                        
                },
                function(data,status){
                  if(status=="success"){
                  // alert(data);
                    if(data>0){
                      $successhtml = "  <div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Hoorayy!!!! Congratulation, your registation is successfully completed. Please sign in to continue</strong> </div>  "
                      $("#res-result").html($successhtml);
                       setTimeout( myFunction, 1000);
                     function myFunction() {
                        $(".close-modal").click();
                         $("#login").click();
                    }
                     
                    }
                    else{
                      $errorhtml = " <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Oops!!! Something had gone wrong.Please try again later</strong> </div> "
                      $("#res-result").html($errorhtml);
                    }
                    
                   
                  }
                });
              }else{
               $errorhtml = " <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>  <strong>Error!!! Please fill out First Name, Last Name, Email and Password to continue</strong> </div> "
                      $("#res-result").html($errorhtml);
              }
            });


            $("#one-way").click(function(){
                 $("#end_date").val("");
                  $("#one-way").addClass('animated jello');
                  $('#one-way').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $("#one-way").removeClass('animated jello')
                  });

                 $("#end_date").hide();
                 $("#end_date").addClass('animated fadeIn');
                  $('#end_date').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $("#end_date").removeClass('animated fadeIn')
                  });

                 $("#start_date").css('width', '270');
                 $("#one-way").removeClass("flight-type-unselected");
                 $("#one-way").addClass("flight-type");
                 $("#return").removeClass("flight-type");
                  $("#return").addClass("flight-type-unselected");
            });

             $("#return").click(function(){

                  $("#return").addClass('animated jello');
                  $('#return').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $("#return").removeClass('animated jello')
                  });

                 


                 $("#end_date").show();
                 $("#start_date").css('width', '135');
                  $("#return").removeClass("flight-type-unselected");
                 $("#return").addClass("flight-type");
                 $("#one-way").removeClass("flight-type");
                  $("#one-way").addClass("flight-type-unselected");
            });

            $("#from-input").on("click",function(){
                //visible logic
               
              $("#from-check").css('visibility', 'visible');
              $("#from-check").addClass('animated bounceIn');
              $('#from-check').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $("#from-check").removeClass('animated bounceIn');
            });

              if ( $('#to-check').css('visibility') == 'visible' ){
                 $("#to-check").css('visibility', 'hidden');
            //       $("#to-check").addClass('animated bounceOut');
            //     $('#to-check').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            //     $("#to-check").removeClass('animated bounceOut');
            // });
             }

             if ( $('#option_container').css('visibility') == 'visible' ){
                 $("#option_container").css('visibility', 'hidden');
             }

         });

            $("#to-input").on("click",function(){

              $("#to-check").css('visibility', 'visible');
              $("#to-check").css('visibility', 'visible');
              $("#to-check").addClass('animated bounceIn');
              $('#to-check').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $("#to-check").removeClass('animated bounceIn');
            });

              if ( $('#from-check').css('visibility') == 'visible' ){
                 $("#from-check").css('visibility', 'hidden');
             } 
             if ( $('#option_container').css('visibility') == 'visible' ){
                 $("#option_container").css('visibility', 'hidden');
             }
         });

                
            $("#to-check").click(function () { 
              $("#from-input").focus();
          });
            $(window).scroll(function(){
                $(".intro-text").css("opacity", 1.2 - $(window).scrollTop() / 250);
                $("#arrow-down").css("opacity", 1.2 - $(window).scrollTop() / 50);
            });
            $("#input_img").hover(function(){
                $("#input_img").attr('src', 'image/location_focus.png');
            });
            $("#input_img").mouseleave(function(){
                $("#input_img").attr('src', 'image/location2.png');
            });

            $("#flight-option").click(function () { 
                  // $("#flight-option").off("mouseleave");
                   if ( $('#option_container').css('visibility') == 'visible' ){
                 $("#option_container").css('visibility', 'hidden');
                 $("#option_container").addClass('animated fadeOutDown');
                  $('#option_container').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    $("#option_container").removeClass('animated fadeOutDown')
                  });
             }else{
                $("#option_container").css('visibility', 'visible');
            }
            });
           
            $("#start_date").click(function () { 
               if ( $('#option_container').css('visibility') == 'visible' ){
                 $("#option_container").css('visibility', 'hidden');
             }
          });
               $("#end_date").click(function () { 
               if ( $('#option_container').css('visibility') == 'visible' ){
                 $("#option_container").css('visibility', 'hidden');
             }
          });

            //get from airport autocomplete
            // $("#from-input").ossn('input',function(){
            //     from = $(this).val();
            //     // alert(from);
            //     $.get("php/airport-autocomplete.php?from-location="+from, function(data,status){

            //            // if (status =="success"){

            //              $(".airport-holder").html(data);

            //              $("#from-input").attr("list","airport");

            //              $("#from-input:first-child").addClass('awesomplete');
            //         // }
            //     });
            // });

             //get nearby airport
             var input2 = document.getElementById("from-input");
             var awesomplete = new Awesomplete(input2, {
              minChars: 0,
              autoFirst: true,
              maxItems:5
          });
             $("#input_img").click(function () { 
              $("#input_img").off("mouseleave");
              $("#input_img").attr('src', 'image/poi.gif');
            //user clicks button

    if ("geolocation" in navigator){ //check geolocation available 
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function(position){ 
                // $("#demo").html("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                // alert(latitude+","+longitude);
                // $.get("php/nearby-airport.php?latitude="+latitude+"&longtitude="+longitude,function (data,status) {
                //     // body...
                //     if(data == null){
                //         alert("null");
                //     }
                //     $(".airport-holder").html(data);
                //     $("#from-input").attr("list","airport");

                //     $("#from-input").addClass('awesomplete');
                //     $("#from-input").focus();

                // });
                $("#from-input").focus();
                $("#from-input").focusin(function() {
    


    var searchTerm;
    searchTerm = this.value;
    if(this.value== "đà lạt" || this.value== "da lat"){
     searchTerm = "dli";

 }

 $.ajax({
    url: 'https://api.sandbox.amadeus.com/v1.2/airports/nearest-relevant?apikey=6NwaGnAUxDUPV2MEFhAW0cR9uhGAQ4ol&latitude=' + latitude +'&longitude=' + longitude,
    type: 'GET',
    dataType: 'json'
})
 .success(function(data) {
    var list = [];
    $.each(data, function(key, value) {

      var value2 = value.city_name + "(" + value.airport +")";
      var airport_name = value.airport_name +"( " +value.distance + " km)";
      // alert(value.airport_name);

      list.push([airport_name,value2]);
        // alert(list);
    });
    awesomplete.list = list;
    $("#input_img").attr('src', 'image/location2.png');

});
});
            });

    }else{
      alert("Browser doesn't support geolocation!");
  }
} );


         });

     </script>
 </head>

 <body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top" ">
    <!-- <div class="nav-background"></div> --> <!--blur background-->
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a id="logo"  style="-webkit-animation-delay: 1.5s" class="navbar-brand page-scroll" href="#page-top">Travel.easy</a>
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
                        <a class="page-scroll" href="#International">International</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#Domestic">Domestic</a>
                    </li>
                   <!--  <li>
                        <a class="page-scroll" href="#Top">Top </a>
                    </li> -->
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        <li class="dropdown" style="margin-left: 400px;">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="login" style="border-radius: 3px;">
                                <span class="glyphicon glyphicon-user"></span><span id="login-text">  Login </span><span class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                Login with
                                                <div class="social-buttons">
                                                    <a href="#" id="facebook" class="btn btn-fb"> Facebook</a>
                                                    <a href="#" id="twitter" class="btn btn-tw">Twitter</a>
                                                    <div id="notAvailable">
                                                      
                                                    </div>
                                                </div>
                                                or
                                                <form class="form" role="form" accept-charset="UTF-8" id="login-nav">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                                        <input type="email" id="log-email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                                                        <input type="password" id="log-pass" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                                        <div class="help-block text-right"><a href="" style="
                                                            color: #428bca;">Forget the password ?</a></div>
                                                        </div>
                                                         <div id="log-result">
                                                    
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="button" id="log-in" class="btn btn-primary btn-block">Sign in</button>
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

            <!-- Header -->
            <header style="position: relative;">
                <div class="background"></div>
                <div class="container" >
                    <div id="input-container"  style="-webkit-animation-delay: 1s" class="intro-text" style="    position: relative">
                        <script src="js/typed.js"></script>
                        <script>
                          $(function(){
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
                        <div style="display: flex;">
                        <div id="fixed_txt" class="fixed-text text-typed-defaut">Compare Prices  </div><br>
                        <span class="typed-text text-typed-defaut"> </span>
                        </div>

                        <div class="return-txt" style="text-align:justify">
                        
                        <label  id="return" class="flight-type" style=" margin-left: 56px;" >Return</label>&nbsp;
                        
                        <label id="one-way" class="flight-type-unselected">One-way</label>
                        </div>
                        
                        <form action="php/result-handling.php" method="get">
                        <div id="input_container" >

                            <input id="from-input" name="from_airport" data-minchars="0" class=" input Location-input "  placeholder="From"  required>
                            <img id="input_img" src="image/location2.png " />
                            <div id="loader" style="display: none;"></div>

                            <input id="to-input" name="to_airport" class="  input Location-input  " placeholder="To" required>



                            <!--  <div class="airport-holder-to" style="display: none; overflow: scroll;  height:200px">     -->            


                            <input id="start_date"
                            type="text"  class="input dateinput " name="start_date" placeholder="Depart" value="" required>
                            <input id="end_date"
                            type="text" class="input dateinput" name="end_date" value="" placeholder="Return">



                            <input id="flight-option"  class="input  option-flight "  placeholder="Options" readonly>


                            <BUTTON type="submit" id="search-button" class="btn-search " value="Search">Search </BUTTON>
                             <!-- <script src="js/search_handling.js"></script> -->

                        </div> 
                 
                                 <div id="option_container" style="visibility: hidden;" >
                                <!-- <img src="image/triangle.png" style="align-content:right "> -->
                                <div class="option_container-margin">
                                    <!--- count -->
      <script src="js/people_count.js"></script>
                                    <table>
                                        <tr >

                                            <td colspan="2" style="
                                            border-top-width: 10px;
                                            padding-top: 15px;"">
                                            <label class="option-label">Class</label>
                                            <select id="class-select" name="classes" class="option-input-select  " placeholder="To" >
                                              <option value="ECONOMY"> Economy</option>
                                              <option value="PREMIUM_ECONOMY"> Premium Economy</option>
                                              <option value="BUSINESS">Bussiness</option>
                                              <option value="FIRST">First</option>
                                          </select>
                                          <div class="divider"></div>
                                      </td>
                                  </tr>

                                  <tr>
                                    <td>
                                       <label class="option-label">Adults</label>
                                       
                                        <button id="adults-minus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-minus"></i></button>
                                      
                                       <input id="adults-count" name="adults" class="option-label option-number count-size" style="padding-right: 0px;" readonly value="1">
                                         <button id="adults-plus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-plus"></i></button>
                                      
                                   </td>
                                   <td>
                                      <label class="option-label ">Currency</label>
                                      <select  id="currency-select" name="currency" class="option-input-select" style="width: 100px; height: 35px" >
                                        <option value="VND">VND</option>
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td    style="padding-left: 20px;" >
                                   <label class="option-label">Children</label>
                                  
                                    <button id="children-minus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-minus"></i></button>
                                   <input id="children-count" name="children" class="option-label option-number count-size" style="padding-right: 0px;" readonly value="0">
                                   <button id="children-plus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-plus"></i></button>
                               </td>
                               <td>    
                                <label class="option-label">Max Price</label>
                                <input type="number" name="maxPrice" id="maxPrice-input" class="maxPrice" placeholder="500,000" style="color: black">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 28px;">
                               <label class="option-label">Infants</label>
                               <button id="infants-minus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-minus"></i></button>
                               <input id="infants-count" name="infants" class="option-label option-number count-size" style="padding-right: 0px;" readonly value="0">
                            <button id="infants-plus"  type="button" class="button button-primary button-circle button-small"><i class="fa fa-plus"></i></button>
                           </td>
                           <td>
                            <input id="nonstop-cb" name="nonstop" type="checkbox" class="styled-checkbox" value="true" >
                            <label for="nonstop-cb"  id="nonstop-label" class="domestic-cb-text" style=" color: black;">Non-stop Flights</label>

                        </td>
                    </tr>


                </table>
                
            </div> 
        </div>
    
    <div class="check-container" style="padding-top: 5px">
        <input id="from-domestic" type="checkbox" class="styled-checkbox">
        <label for="from-domestic" id="from-check" class="domestic-cb-text" style="margin-right: 35px; visibility: hidden;">Domestic Airport Only</label> 
        <input id="to-domestic" type="checkbox" class="styled-checkbox">
        <label for="to-domestic" id="to-check" class="domestic-cb-text" style=" visibility: hidden;">Domestic Airport Only</label>
    </div>

    <!-- data handle for input -->
    <script src="js/awesomplete_new.js"></script>
  

</div>

</form>
  <div id="arrow-down" class="arrow-bounce" style="    position: absolute;
    bottom: 35%;
    left: 50%;">
    <a class="page-scroll" href="#portfolio"><span></span></a>
    </div>
</div>




</header>
    <!-- Services Section 
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">E-Commerce</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Responsive Design</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Web Security</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    

    

    <!-- About Section 
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="image/1.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>2009-2011</h4>
                                    <h4 class="subheading">Our Humble Beginnings</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="image/2.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>March 2011</h4>
                                    <h4 class="subheading">An Agency is Born</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="image/3.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>December 2012</h4>
                                    <h4 class="subheading">Transition to Full Service</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="image/4.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4>July 2014</h4>
                                    <h4 class="subheading">Phase Two Expansion</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>-->
    <section id="International" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Start your travel planning here</h2>
                    <h3 class="section-subheading text-muted">Discover our top destinations in International</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#Top" id="bkk" class="portfolio-link" value="Bangkok(BKK)">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/bangkok.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Bangkok</h4>
                        <p class="text-muted">ThaiLand</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/London.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>London</h4>
                        <p class="text-muted">England</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/newyork.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Newyork</h4>
                        <p class="text-muted">The USA</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/PARIS.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Paris</h4>
                        <p class="text-muted">France</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/singapo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Singapo</h4>
                        <p class="text-muted">Singapo</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/Tokyo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tokyo</h4>
                        <p class="text-muted">Japan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    
    <section id="Domestic" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Start your travel planning here</h2>
                    <h3 class="section-subheading text-muted">Discover our top destinations in Viet Nam</h3>
                </div>
            </div>
            <div class="row">
                <div data-aos="zoom-out"  class="col-md-4 col-sm-6 portfolio-item aos-init aos-animate">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/bangkok.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Bangkok</h4>
                        <p class="text-muted">ThaiLand</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/London.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>London</h4>
                        <p class="text-muted">England</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/newyork.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Newyork</h4>
                        <p class="text-muted">The USA</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/PARIS.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Paris</h4>
                        <p class="text-muted">France</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/singapo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Singapo</h4>
                        <p class="text-muted">Singapo</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/Tokyo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tokyo</h4>
                        <p class="text-muted">Japan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

     <!-- Team Section - -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="image/an.jpg" class="img-responsive img-circle" alt="">
                        <h4>Hoang An</h4>
                        <p class="text-muted">Lead Designer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="image/ta.jpg" class="img-responsive img-circle" alt="">
                        <h4>Tuan Anh</h4>
                        <p class="text-muted">Lead Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="image/3a.jpg" class="img-responsive img-circle" alt="">
                        <h4>Diana Pertersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>

    </section>

    <!-- Clients Aside 
    <aside class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="image/envato.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="image/designmodo.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="image/themeforest.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6">
                    <a href="#">
                        <img src="image/creative-market.jpg" class="img-responsive img-centered" alt="">
                    </a>
                </div>
            </div>
        </div>
    </aside>
    <section id="Top" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Start your travel planning here</h2>
                    <h3 class="section-subheading text-muted">Discover our top destinations </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/bangkok.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Bangkok</h4>
                        <p class="text-muted">ThaiLand</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/London.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>London</h4>
                        <p class="text-muted">England</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/newyork.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Newyork</h4>
                        <p class="text-muted">The USA</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/PARIS.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Paris</h4>
                        <p class="text-muted">France</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/singapo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Singapo</h4>
                        <p class="text-muted">Singapo</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">

                            </div>
                        </div>
                        <img src="image/Tokyo.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Tokyo</h4>
                        <p class="text-muted">Japan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Contact Section -->
    <section id="contact">
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

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Project Details Go Here -->
                                <h2>Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-responsive img-centered" src="image/roundicons-free.png" alt="">
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <p>
                                    <strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">RoundIcons.com</a>, or you can purchase the 1500 icon set <a href="https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc">here</a>.</p>
                                    <ul class="list-inline">
                                        <li>Date: July 2014</li>
                                        <li>Client: Round Icons</li>
                                        <li>Category: Graphic Design</li>
                                    </ul>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 2 -->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <h2>Project Heading</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-responsive img-centered" src="image/startup-framework-preview.png" alt="">
                                    <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                    <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 3 -->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-responsive img-centered" src="image/treehouse-preview.png" alt="">
                                    <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                                    <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 4 -->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-responsive img-centered" src="image/golden-preview.png" alt="">
                                    <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                    <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 5 -->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-responsive img-centered" src="image/escape-preview.png" alt="">
                                    <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                    <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Modal 6 -->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <div class="modal-body">
                                    <!-- Project Details Go Here -->
                                    <h2>Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-responsive img-centered" src="image/dreams-preview.png" alt="">
                                    <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                    <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------->
        <div class="portfolio-modal modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h1 class="well">Registration Form</h1>
                        <div class="col-lg-12 well">
                            <div class="row">
                                <form >
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>First Name</label>
                                                <input type="text" id="res-first-name" placeholder="Enter First Name Here.." class="form-control" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Last Name</label>
                                                <input type="text" id="res-last-name"  placeholder="Enter Last Name Here.." class="form-control" required>
                                            </div>
                                        </div>                  
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea placeholder="Enter Address Here.." id="res-address" rows="3" class="form-control"></textarea>
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>City</label>
                                                <input type="text" id="res-City" placeholder="Enter City Name Here.." class="form-control">
                                            </div>  
                                            <div class="col-sm-4 form-group">
                                                <label>State</label>
                                                <input type="text" id="res-state" placeholder="Enter State Name Here.." class="form-control">
                                            </div>  
                                            <div class="col-sm-4 form-group">
                                                <label>Zip</label>
                                                <input type="text" id="res-zip" placeholder="Enter Zip Code Here.." class="form-control">
                                            </div>      
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Title</label>
                                                <input type="text" id="res-title" placeholder="Enter Designation Here.." class="form-control">
                                            </div>      
                                            <div class="col-sm-6 form-group">
                                                <label>Company</label>
                                                <input type="text" id="res-company" placeholder="Enter Company Name Here.." class="form-control">
                                            </div>  
                                        </div>                      
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" id="res-phone-number" placeholder="Enter Phone Number Here.." class="form-control">
                                        </div>      
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" id="res-email" placeholder="Enter Email Address Here.." class="form-control" required>
                                        </div> 
                                          <div class="form-group">
                                          <label>Password</label>
                                            <input type="password" id="res-pass" placeholder="Enter Password Here.." class="form-control" required>
                                        </div> 
                                        <div id="res-result">
                                                     
                                        </div>
                                        <button type="button" class="register" class="btn btn-lg btn-info">Submit</button>
                                    </div>
                                </form> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

<!---------------->
        <div class="portfolio-modal modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div class="lr">
                            <div class="rl">
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h1 class="well" id="welcome">WELCOME</h1>
                        <div class="col-lg-12 well">
                            <div class="row">
                                <form >
                                    <div class="col-sm-12">
                                        <div class="row">
                                          <!--   <div class="col-sm-6 form-group">
                                                <label>First Name</label>
                                                <input type="text" id="res-first-name" placeholder="Enter First Name Here.." class="form-control" required>
                                            </div>
                                            <div class="col-sm-6 form-group">
                                                <label>Last Name</label>
                                                <input type="text" id="res-last-name"  placeholder="Enter Last Name Here.." class="form-control" required>
                                            </div>
                                        </div>                  
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea placeholder="Enter Address Here.." id="res-address" rows="3" class="form-control"></textarea>
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-4 form-group">
                                                <label>City</label>
                                                <input type="text" id="res-City" placeholder="Enter City Name Here.." class="form-control">
                                            </div>  
                                            <div class="col-sm-4 form-group">
                                                <label>State</label>
                                                <input type="text" id="res-state" placeholder="Enter State Name Here.." class="form-control">
                                            </div>  
                                            <div class="col-sm-4 form-group">
                                                <label>Zip</label>
                                                <input type="text" id="res-zip" placeholder="Enter Zip Code Here.." class="form-control">
                                            </div>      
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 form-group">
                                                <label>Title</label>
                                                <input type="text" id="res-title" placeholder="Enter Designation Here.." class="form-control">
                                            </div>      
                                            <div class="col-sm-6 form-group">
                                                <label>Company</label>
                                                <input type="text" id="res-company" placeholder="Enter Company Name Here.." class="form-control">
                                            </div>  
                                        </div>                      
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="number" id="res-phone-number" placeholder="Enter Phone Number Here.." class="form-control">
                                        </div>      
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" id="res-email" placeholder="Enter Email Address Here.." class="form-control" required>
                                        </div> 
                                          <div class="form-group">
                                          <label>Password</label>
                                            <input type="password" id="res-pass" placeholder="Enter Password Here.." class="form-control" required>
                                        </div> 
                                        <div id="res-result"> -->
                                                     
                                        <!-- </div> -->
                                        <button id="log-out" type="button" class="register" class="btn btn-lg btn-info">Log out</button>
                                    </div>
                                </form> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <!-- <script src="js/jquery-3.2.1.js"></script> -->

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="js/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>

        <!-- Theme JavaScript -->
        <script src="js/agency.min.js"></script>

        <!--pickaday-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.5.1/pikaday.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.5.1/css/pikaday.min.css" rel="stylesheet"/>

        
        <script>
         var start_date = new Pikaday({
           numberOfMonths: 2,
           format: 'YYYY-MM-DD',
           minDate: new Date(),
           field: document.getElementById('start_date'),
           onSelect: function() {
            end_date.setMinDate(this.getDate());
        }
    });
         var end_date = new Pikaday({
           numberOfMonths: 2,
           format: 'YYYY-MM-DD',
           minDate: new Date(),
           field: document.getElementById('end_date'),
           onSelect: function() {
            start_date.setMaxDate(this.getDate());

        }
    });
       
         jQuery(document).on('change', '.pika-select-month', function() {
            pika_modif_date('month', this.value);
        });

         jQuery(document).on('change', '.pika-select-year', function() {
            pika_modif_date('year', this.value);
        });


         function pika_modif_date(type, value_change){
            var pik_obj;
    // identifying object
    if( start_date.isVisible() ){
        pik_obj = 'start_date';
    }
    else{
        pik_obj = 'end_date';
    }
    var actual_date;
    // Date of the object
    eval('actual_date = '+pik_obj+'.getDate();');
    // If date not exist
    if (actual_date == null){
        return;
    }
    // Modify month or yeah
    if( 'month' == type ){
        actual_date.setMonth(value_change);
    }
    else{
        actual_date.setFullYear(value_change);
    }
    // Format for set to pikaday
    year = 1900 + actual_date.getYear();
    eval(pik_obj+'.setDate(new Date(' + year +','+ actual_date.getMonth() +','+ actual_date.getDate() +'), 1);');
}
</script>


        <!-- <script>

         $('.checkin').on('focus', function (){

          var picker= new Pikaday({
           numberOfMonths: 2,
           field: this,
           format :'YYYY/MM/DD' ,
           minDate: new Date(),
           firstDay: 1,
           maxDate: new Date(2017, 12, 31),
           onSelect: function() {
            e = this.getDate();    
        }
    });

          return picker;
          picker.destroy();
      });
         $('.checkout').on('focus', function (){

             var picker2= new Pikaday({
               numberOfMonths: 2,
               field: this,
               format :'YYYY/MM/DD' ,
               minDate: new Date(),
               firstDay: 1,
               maxDate: new Date(2020, 12, 31),
               onSelect: function() {
                e = this.getDate();    
            }
        });

             return picker2;
         });

// function getMaxDate(element){
//   if(element.className=='checkout' && $('.checkin').value)
//     return new Date(new Date($('.checkin').value).getTime()+(15*24*60*60*1000));
// else
//   return new Date(2020, 12, 31);
// }
// function getMinDate(element){
//   if(element.className=='checkout' && $('.checkin').value)
//     return new Date($('.checkin').value);
// else
//   return new Date();
// }
</script> -->
</body>

</html>
