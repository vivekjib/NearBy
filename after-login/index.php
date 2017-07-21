<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password']))
{

?>

    <!DOCTYPE html>
    <html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>NearBy | Logged In</title>

        <link rel="icon" href="../images/favicon.ico">
        <link href="../Carousel Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
        <link href="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="../Carousel Template for Bootstrap_files/carousel.css" rel="stylesheet">
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCMHP6kF10yjmlZe8TR6-U7990hQIm72L4" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>
        <style>
            body{
                /*background-color: #ededed;*/
            }
            #map-canvas{

            }
            pre {
                border:1px solid #D6E0F5;
                padding:5px;
                margin:5px;
                background:#EBF0FA;
            }

            /* fix for unwanted scroll bar in InfoWindow */
            .scrollFix {
                line-height: 1.35;
                overflow: hidden;
                white-space: nowrap;
            }
        </style>

        <script>
            var workerLocations=new Array();
            $(document).ready(function () {
                ///Disabling Scrolling the Page
//          $('html, body').css({
//              overflow: 'hidden',
//              height: '100%'
//          });

                //handeling size if window everytime window is resized
                $( window ).resize(function() {
                    var width = jQuery(window).width();
                    var height = jQuery(window).height();
                    adjustMapSize(height,width);
                });

                //
//          Handeling the back to top button
                $("#to-top").click(function(e) {
                    e.preventDefault();
                    //var aid = $(this).attr("href");
                    $('html,body').animate({scrollTop: $("#top_anchor").offset().top},'slow');
                });
                //
                //For getting user's choice
                var option1=0,option2=0,option3=0;


                var checkOptions=function () {
                    var opt1,opt2,opt3;
                    //Carpenter
                    if($('#inlineCheckbox1  ').is(":checked"))
                        option1='1';
                    else
                        option1='0';
                    //plumber
                    if($('#inlineCheckbox2').is(":checked"))
                        option2='1';
                    else
                        option2='0';
                    ///washerman
                    if($('#inlineCheckbox3').is(":checked"))
                        option3='1';
                    else
                        option3='0';
                }
                ///
                //Checking functions immediately starting
                var onStart=function () {
                    //Checking the wize of window and adjusting map size
                    var width = jQuery(window).width();
                    var height = jQuery(window).height();
                    adjustMapSize(height,width);
                    //Checking which options are selected
                    checkOptions();

//                console.log(option);
                }
                ///
                //Getting the city selected by user
                var getPlace=function () {
                    if($('#city').val() != '')
                    {
                        //clear the markers every time a new city is selected
                        workerLocations=[];
                        placeMarkers();
                        return $('#city').val();
                    }
                    else
                        return "nagpur"; //REturn nagpur as city by default
                }

                //Making ajax call to get the markers from the db
                var callUserResponse=function (option1,option2,option3) {
                    $.ajax({
                        type:'GET',
                        url:'UserResponse.php?opt1='+option1+'&opt2='+option2+'&opt3='+option3+"&city="+getPlace(),
                        success:function (data) {
                            try{

                                var info = JSON.parse(data);
                                //no data will be found if wrong city is seleted
                                if(info.length ==0)
                                {
                                    workerLocations=[];
                                    placeMarkers();
                                    //since worng city was selected
                                    //selecting the default city
//                                $('#city').val('nagpur');
//                                alert("Wrong City Entered,Please Enter a valid city");
                                }
                                else
                                {
                                    for(var i=0;i<info.length;i++)
                                    {
                                        var position=new Object();
                                        position.name=info[i][0].worker_name;
                                        position.type=info[i][0].worker_type;
                                        position.address=info[i][0].address;
                                        position.lat=info[i][0].lat;
                                        position.lng=info[i][0].lng;
                                        position.contact=info[i][0].mobile;
                                        workerLocations.push(position);
                                    }
//                          Clearing Array after the work is done
                                    console.log(workerLocations);
                                    placeMarkers();
                                    workerLocations=[];
                                }
                            }
                            catch (err)
                            {
                                alert("Wrong City Entered,Please Enter a valid city");
                            }
                        },
                        error:function (data) {
                            console.log('Error Occured');
                        }
                    });
                }

                //Handeling the clicks on the choices
                $('#city').click(function () {
                    checkOptions();
                    callUserResponse(option1,option2,option3);
                });
                $('#inlineCheckbox1').click(function () {
                    checkOptions();
                    //                console.log(option);
                    callUserResponse(option1,option2,option3);
                });
                $('#inlineCheckbox2').click(function () {
                    checkOptions();
                    //                  console.log(option);
                    callUserResponse(option1,option2,option3);
                });
                $('#inlineCheckbox3').click(function () {
                    checkOptions();
                    //                  console.log(option);
                    callUserResponse(option1,option2,option3);
                });
                //If Logout button is pressed
                $('#user-logout').click(function () {

                });

                //
                ///CAll to onstart function just after document is ready
                onStart();
            });
            function adjustMapSize(height,width) {
                $('#map-canvas').css({
                    'height': (height-200),
                    'width':(width-250),
                    'border':'1px solid #333'
                });
            }
        </script>
        <!--Script for map api-->
        <script type="text/javascript">

            "use strict";

            // variable to hold a map
            var map;

            // variable to hold current active InfoWindow
            var activeInfoWindow ;

            // ------------------------------------------------------------------------------- //
            // initialize function
            // ------------------------------------------------------------------------------- //
            function initialize() {

                placeMarkers();
            }
            function placeMarkers() {
                // map options - lots of options available here
                var mapOptions = {
                    zoom : 12,
                    draggable: true,
                    center : new google.maps.LatLng(21.14528, 79.0671),
                    mapTypeId : google.maps.MapTypeId.ROADMAP
                };

                // create map in div called map-canvas using map options defined above
                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                // define three Google Map LatLng objects representing geographic points
                // place markers
                for(var i=0;i<workerLocations.length;i++)
                {
                    var lanlng= new google.maps.LatLng(workerLocations[i].lat , workerLocations[i].lng);
                    fnPlaceMarkers(lanlng,workerLocations[i]);
                }
            }
            // ------------------------------------------------------------------------------- //
            // create markers on the map
            // ------------------------------------------------------------------------------- //
            function fnPlaceMarkers(myLocation,worker_info){
                var icn_color='';
                if(worker_info.type == "carpenter")
                {
                    icn_color='#32ad38';
                }
                else if(worker_info.type == "plumber"){
                    icn_color='#5b548e';
                }
                else if(worker_info.type == "washerman"){
                    icn_color='#ad4631';
                }
                var marker = new google.maps.Marker({
                    position : myLocation,
                    icon    :  {
                        path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                        strokeColor: icn_color,
                        scale: 3
                    }
                });

                // Renders the marker on the specified map
                marker.setMap(map);

                // create an InfoWindow - for mouseover
                var infoWnd = new google.maps.InfoWindow();

                // create an InfoWindow -  for mouseclick
                var infoWnd2 = new google.maps.InfoWindow();

                // -----------------------
                // ON MOUSEOVER
                // -----------------------

                // add content to your InfoWindow
                infoWnd.setContent('<div class="scrollFix"><b>' + 'Worker Type :</b><br>' +  worker_info.type + '<br><small>(click for info)</small></div>');

                // add listener on InfoWindow for mouseover event
                google.maps.event.addListener(marker, 'mouseover', function() {

                    // Close active window if exists - [one might expect this to be default behaviour no?]
                    if(activeInfoWindow != null) activeInfoWindow.close();

                    // Close info Window on mouseclick if already opened
                    infoWnd2.close();

                    // Open new InfoWindow for mouseover event
                    infoWnd.open(map, marker);

                    // Store new open InfoWindow in global variable
                    activeInfoWindow = infoWnd;
                });

                // on mouseout (moved mouse off marker) make infoWindow disappear
                google.maps.event.addListener(marker, 'mouseout', function() {
                    infoWnd.close();
                });

                // --------------------------------
                // ON MARKER CLICK - (Mouse click)
                // --------------------------------

                // add content to InfoWindow for click event
                infoWnd2.setContent('<div class="scrollFix">' + '<b>Worker type :</b>' +worker_info.type
                    + ' <br/>'
                    + '<b>Name :</b>'+worker_info.name+'<br>'
                    +'<b>Address :</b>'+worker_info.address+'<br>'
                    +'<b>Contact :</b>'+worker_info.contact
                    +'</div>');

                // add listener on InfoWindow for click event
                google.maps.event.addListener(marker, 'click', function() {

                    //Close active window if exists - [one might expect this to be default behaviour no?]
                    if(activeInfoWindow != null) activeInfoWindow.close();

                    // Open InfoWindow - on click
                    infoWnd2.open(map, marker);

                    // Close "mouseover" infoWindow
                    infoWnd.close();

                    // Store new open InfoWindow in global variable
                    activeInfoWindow = infoWnd2;
                });

            }

            // ------------------------------------------------------------------------------- //
            // initial load
            // ------------------------------------------------------------------------------- //
            google.maps.event.addDomListener(window, 'load', initialize);


        </script>
    </head>





    <body data-gr-c-s-loaded="true">







    <div class="navbar-wrapper">
        <div class="container" id="top_anchor">

            <nav class="navbar navbar-inverse navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <b>NearBy</b>
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#about"><b>About</b></a></li>
                            <li><a href="#contact"><b>Contact</b></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-user"></span>
                                    <strong>User</strong>
                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="navbar-login">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <p class="text-center">
                                                        <span class="glyphicon glyphicon-user icon-size"></span>
                                                    </p>
                                                </div>
                                                <div class="col-lg-8">
                                                    <h3 class="text-left"><strong>User name</strong></h3>
                                                    <h5 class="text-left small">user@email.com</h5>
                                                    <p class="text-left">
                                                        <!--<a href="#" class="btn btn-primary btn-block btn-sm">Update profile</a>-->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="navbar-login navbar-login-session">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p>
                                                        <form method="post">
                                                            <input type="submit" value="Logout" class="btn btn-danger col-sm-12" name="logout">
                                                        </form>
<!--                                                        <a href="../" class="btn btn-danger btn-block" id="user-logout">Log out</a>-->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-inline">
                        <div class="form-group col-md-5">
                            <label for="city">Select your city  </label>
                            <select class="form-control" id="city">
                                <option value="">Select a City of your choice</option>
                                <option value="nagpur">Nagpur</option>
                                <option value="delhi">Delhi</option>
                                <option value="mumbai">Mumbai</option>
                                <option value="banglore">Banglore</option>
                                <option value="Pune">Pune</option>
                            </select>
                        </div>
                        <div class="form-group col-md-7 pull-right">
                            <div class="checkbox checkbox-inline checkbox-success col-md-4">
                                <input type="checkbox" id="inlineCheckbox1" class="option" value="carpainter">
                                <label for="inlineCheckbox1"> Carpenter </label>
                            </div>
                            <div class="checkbox checkbox-success checkbox-inline col-md-4">
                                <input type="checkbox" id="inlineCheckbox2" class="option" value="plumber">
                                <label for="inlineCheckbox2"> Plumber </label>
                            </div>
                            <div class="checkbox checkbox-inline checkbox-success col-md-3">
                                <input type="checkbox" id="inlineCheckbox3" class="option" value="washerman">
                                <label for="inlineCheckbox3"> Washerman </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="container">
                <!--Canvas for our map-->
                <div class="map-responsive container">
                    <center>
                        <div class="col-lg-12 col-md-12 col-sm-12" id="map-canvas"></div>
                    </center>
                </div>
            </div>

            <div class="container">
                <div class="container marketing">
                    <!-- columns of text below the map -->
                    <!-- START THE FEATURETTES -->
                    <a name="about"></a>
                    <div class="row featurette">
                        <div class="col-md-7 col-md-push-5">
                            <h2 class="featurette-heading">About us. <span class="text-muted">Working to help.</span></h2>
                            <p class="lead">We are new aspirants in web development. We build and provide service in welfare of society. We care both sides of our site users. We help them and make a fluid transaction of work and money between workers and needies of workers.</p>
                        </div>
                        <div class="col-md-5 col-md-pull-7">
                            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="About image" src="../images/about.png" data-holder-rendered="false">
                        </div>
                    </div>

                    <a name="contact"></a>
                    <hr class="featurette-divider">

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading">Contact us. <span class="text-muted">Get in touch.</span></h2>
                            <p class="lead">We are happy to get in touch with you. Please, contact us for any queries. </p>
                            <address>
                                <strong>Some Company, Inc.</strong><br>
                                007 street<br>
                                Some City, State XXXXX<br>
                                <abbr title = "Phone">P:</abbr> (123) 456-7890
                            </address>
                            <address>
                                <strong>Full Name</strong><br>
                                <a href = "mailto:#">mailto@somedomain.com</a>
                            </address>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Contact image" src="../images/contact.png" data-holder-rendered="false">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <!-- /END THE FEATURETTES -->


                    <!-- FOOTER -->
                    <footer>
                        <p class="pull-right"><a href="" id="to-top">Back to top</a></p>
                        <p>© 2017 Company, Inc.</p>
                    </footer>

                </div>
            </div> <!-- /.container -->
        </div>
    </div>






    <script src="../Carousel Template for Bootstrap_files/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../Carousel Template for Bootstrap_files/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


    <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg><span style="border-radius: 3px; text-indent: 20px; width: auto; padding: 0px 4px 0px 0px; text-align: center; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 11px; line-height: 20px; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; color: rgb(255, 255, 255); background: url(&quot;data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMzBweCIgd2lkdGg9IjMwcHgiIHZpZXdCb3g9Ii0xIC0xIDMxIDMxIj48Zz48cGF0aCBkPSJNMjkuNDQ5LDE0LjY2MiBDMjkuNDQ5LDIyLjcyMiAyMi44NjgsMjkuMjU2IDE0Ljc1LDI5LjI1NiBDNi42MzIsMjkuMjU2IDAuMDUxLDIyLjcyMiAwLjA1MSwxNC42NjIgQzAuMDUxLDYuNjAxIDYuNjMyLDAuMDY3IDE0Ljc1LDAuMDY3IEMyMi44NjgsMC4wNjcgMjkuNDQ5LDYuNjAxIDI5LjQ0OSwxNC42NjIiIGZpbGw9IiNmZmYiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIxIj48L3BhdGg+PHBhdGggZD0iTTE0LjczMywxLjY4NiBDNy41MTYsMS42ODYgMS42NjUsNy40OTUgMS42NjUsMTQuNjYyIEMxLjY2NSwyMC4xNTkgNS4xMDksMjQuODU0IDkuOTcsMjYuNzQ0IEM5Ljg1NiwyNS43MTggOS43NTMsMjQuMTQzIDEwLjAxNiwyMy4wMjIgQzEwLjI1MywyMi4wMSAxMS41NDgsMTYuNTcyIDExLjU0OCwxNi41NzIgQzExLjU0OCwxNi41NzIgMTEuMTU3LDE1Ljc5NSAxMS4xNTcsMTQuNjQ2IEMxMS4xNTcsMTIuODQyIDEyLjIxMSwxMS40OTUgMTMuNTIyLDExLjQ5NSBDMTQuNjM3LDExLjQ5NSAxNS4xNzUsMTIuMzI2IDE1LjE3NSwxMy4zMjMgQzE1LjE3NSwxNC40MzYgMTQuNDYyLDE2LjEgMTQuMDkzLDE3LjY0MyBDMTMuNzg1LDE4LjkzNSAxNC43NDUsMTkuOTg4IDE2LjAyOCwxOS45ODggQzE4LjM1MSwxOS45ODggMjAuMTM2LDE3LjU1NiAyMC4xMzYsMTQuMDQ2IEMyMC4xMzYsMTAuOTM5IDE3Ljg4OCw4Ljc2NyAxNC42NzgsOC43NjcgQzEwLjk1OSw4Ljc2NyA4Ljc3NywxMS41MzYgOC43NzcsMTQuMzk4IEM4Ljc3NywxNS41MTMgOS4yMSwxNi43MDkgOS43NDksMTcuMzU5IEM5Ljg1NiwxNy40ODggOS44NzIsMTcuNiA5Ljg0LDE3LjczMSBDOS43NDEsMTguMTQxIDkuNTIsMTkuMDIzIDkuNDc3LDE5LjIwMyBDOS40MiwxOS40NCA5LjI4OCwxOS40OTEgOS4wNCwxOS4zNzYgQzcuNDA4LDE4LjYyMiA2LjM4NywxNi4yNTIgNi4zODcsMTQuMzQ5IEM2LjM4NywxMC4yNTYgOS4zODMsNi40OTcgMTUuMDIyLDYuNDk3IEMxOS41NTUsNi40OTcgMjMuMDc4LDkuNzA1IDIzLjA3OCwxMy45OTEgQzIzLjA3OCwxOC40NjMgMjAuMjM5LDIyLjA2MiAxNi4yOTcsMjIuMDYyIEMxNC45NzMsMjIuMDYyIDEzLjcyOCwyMS4zNzkgMTMuMzAyLDIwLjU3MiBDMTMuMzAyLDIwLjU3MiAxMi42NDcsMjMuMDUgMTIuNDg4LDIzLjY1NyBDMTIuMTkzLDI0Ljc4NCAxMS4zOTYsMjYuMTk2IDEwLjg2MywyNy4wNTggQzEyLjA4NiwyNy40MzQgMTMuMzg2LDI3LjYzNyAxNC43MzMsMjcuNjM3IEMyMS45NSwyNy42MzcgMjcuODAxLDIxLjgyOCAyNy44MDEsMTQuNjYyIEMyNy44MDEsNy40OTUgMjEuOTUsMS42ODYgMTQuNzMzLDEuNjg2IiBmaWxsPSIjYmQwODFjIj48L3BhdGg+PC9nPjwvc3ZnPg==&quot;) 3px 50% / 14px 14px no-repeat rgb(189, 8, 28); position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; -webkit-font-smoothing: antialiased; top: 1727px; left: 116px;">Save</span><span style="border-radius: 3px; text-indent: 20px; width: 20px; height: 20px; background: url(&quot;data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHdpZHRoPSIzMHB4IiBoZWlnaHQ9IjMwcHgiIHZpZXdCb3g9IjAgMCAzMCAzMCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPGc+CjxwYXRoIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSI0IiBkPSJNMTcsMTcgTDIyLDIyIFogIi8+CjxjaXJjbGUgc3Ryb2tlPSIjZmZmIiBjeD0iMTMiIGN5PSIxMyIgcj0iNiIgZmlsbD0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIzLjUiLz4KPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAsMCBMOCwwIEw4LDMgTDMsMyBMMyw4IEwwLDggWiIvPgo8cGF0aCBmaWxsPSIjZmZmIiBkPSJNMzAsMjIgTDMwLDMwIEwyMiwzMCBMMjIsMjcgTDI3LDI3IEwyNywyMiBaIi8+CjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0zMCwwIEwzMCw4IEwyNyw4IEwyNywzIEwyMiwzIEwyMiwwIFoiLz4KPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAsMjIgTDMsMjIgTDMsMjcgTDgsMjcgTDgsMzAgTDAsMzBaIi8+CjwvZz4KPC9zdmc+Cg==&quot;) 50% 50% / 14px 14px no-repeat rgba(0, 0, 0, 0.4); position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; top: 1727px; left: 171px;"></span></body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>




    <?php
    if(isset($_REQUEST['logout']))
    {   session_destroy();

        //REdidecting via js because we cannot use too many headers in php
        ?>
            <script>
                location.replace('../');
            </script>
        <?php
    }
}
else
{

    session_destroy();
    ?>
    <script>
        location.replace('../login/');
    </script>
    <?php
}
?>