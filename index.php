<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Find workers near by</title>

    <link rel="icon" href="/images/favicon.ico">
    <link href="./Carousel Template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
    <link href="./Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="./Carousel Template for Bootstrap_files/carousel.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./Carousel Template for Bootstrap_files/ie-emulation-modes-warning.js"></script>

    <style>
        @media print {#ghostery-purple-box {display:none !important}}
    </style>
    <script>
        $(document).ready(function () {
            $("#to-top").click(function(e) {
                e.preventDefault();
                //var aid = $(this).attr("href");
                $('html,body').animate({scrollTop: $("#top_anchor").offset().top},'slow');
            });
        });
    </script>
</head>
<!-- NAVBAR
================================================== -->
<body data-gr-c-s-loaded="true">
<div class="navbar-wrapper">
    <div class="container" id="top_anchor">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <b>NearBy</b>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php"><b>Home</b></a></li>
                        <li><a href="#about"><b>About</b></a></li>
                        <li><a href="#contact"><b>Contact</b></a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="first-slide" src="./images/carpenter.jpg" alt="First slide" data-pin-nopin="true">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Need a quick fix to your bed ?</h1>
                    <p>Can't go outside as you come home very tired. We are here to help.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="login/user_register.php" role="button">
                            <b>Sign up today</b>
                        </a>
                        <a class="btn btn-lg btn-success" href="login/" role="button">
                            <b>Log in Now</b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="./images/plumber.jpg" alt="Second slide" data-pin-nopin="true">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Tap is broken. Alas!!</h1>
                    <p>Guests are coming and don't know any plumber in your area. Use our service to find a quick plumber.</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="login/user_register.php" role="button">
                            <b>Sign up today</b>
                        </a>
                        <a class="btn btn-lg btn-success" href="login/" role="button">
                            <b>Log in Now</b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="item ">
            <img class="third-slide" src="./images/washerman.jpg" alt="Third slide" data-pin-nopin="true">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Clothes need to wash and pressed ?</h1>
                    <p>Get washerman at your doorstep. </p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="login/user_register.php" role="button">
                            <b>Sign up today</b>
                        </a>
                        <a class="btn btn-lg btn-success" href="login/" role="button">
                            <b>Log in Now</b>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->


<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <!-- START THE FEATURETTES -->

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Try the search. <span class="text-muted">We will get worker for you.</span></h2>
            <p class="lead">This is the place where you can search local workers. All the results will be pointed on map. You will see details of worker by selecting.</p>
        </div>
        <div class="col-md-5">
            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Map image" src="./images/map.png" data-holder-rendered="false">
        </div>
    </div>

    <a name="about"></a>
    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
            <h2 class="featurette-heading">About us. <span class="text-muted">Working to help.</span></h2>
            <p class="lead">
                We are new aspirants in web development. We build and provide service in welfare of society. We care both sides of our site users. We help them and make a fluid transaction of work and money between workers and needies of workers.
            </p>
            <p>
                <h3><a href="./about-us">Our Team</a></h3>
            </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="About image" src="./images/about.png" data-holder-rendered="false">
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
            <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="Contact image" src="./images/contact.png" data-holder-rendered="false">
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="" id="to-top">Back to top</a></p>
        <p>© 2017 Company, Inc.</p>
    </footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="./Carousel Template for Bootstrap_files/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="./Carousel Template for Bootstrap_files/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="./Carousel Template for Bootstrap_files/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="./Carousel Template for Bootstrap_files/ie10-viewport-bug-workaround.js"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg><span style="border-radius: 3px; text-indent: 20px; width: auto; padding: 0px 4px 0px 0px; text-align: center; font-style: normal; font-variant: normal; font-weight: bold; font-stretch: normal; font-size: 11px; line-height: 20px; font-family: &quot;Helvetica Neue&quot;, Helvetica, sans-serif; color: rgb(255, 255, 255); background: url(&quot;data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGhlaWdodD0iMzBweCIgd2lkdGg9IjMwcHgiIHZpZXdCb3g9Ii0xIC0xIDMxIDMxIj48Zz48cGF0aCBkPSJNMjkuNDQ5LDE0LjY2MiBDMjkuNDQ5LDIyLjcyMiAyMi44NjgsMjkuMjU2IDE0Ljc1LDI5LjI1NiBDNi42MzIsMjkuMjU2IDAuMDUxLDIyLjcyMiAwLjA1MSwxNC42NjIgQzAuMDUxLDYuNjAxIDYuNjMyLDAuMDY3IDE0Ljc1LDAuMDY3IEMyMi44NjgsMC4wNjcgMjkuNDQ5LDYuNjAxIDI5LjQ0OSwxNC42NjIiIGZpbGw9IiNmZmYiIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSIxIj48L3BhdGg+PHBhdGggZD0iTTE0LjczMywxLjY4NiBDNy41MTYsMS42ODYgMS42NjUsNy40OTUgMS42NjUsMTQuNjYyIEMxLjY2NSwyMC4xNTkgNS4xMDksMjQuODU0IDkuOTcsMjYuNzQ0IEM5Ljg1NiwyNS43MTggOS43NTMsMjQuMTQzIDEwLjAxNiwyMy4wMjIgQzEwLjI1MywyMi4wMSAxMS41NDgsMTYuNTcyIDExLjU0OCwxNi41NzIgQzExLjU0OCwxNi41NzIgMTEuMTU3LDE1Ljc5NSAxMS4xNTcsMTQuNjQ2IEMxMS4xNTcsMTIuODQyIDEyLjIxMSwxMS40OTUgMTMuNTIyLDExLjQ5NSBDMTQuNjM3LDExLjQ5NSAxNS4xNzUsMTIuMzI2IDE1LjE3NSwxMy4zMjMgQzE1LjE3NSwxNC40MzYgMTQuNDYyLDE2LjEgMTQuMDkzLDE3LjY0MyBDMTMuNzg1LDE4LjkzNSAxNC43NDUsMTkuOTg4IDE2LjAyOCwxOS45ODggQzE4LjM1MSwxOS45ODggMjAuMTM2LDE3LjU1NiAyMC4xMzYsMTQuMDQ2IEMyMC4xMzYsMTAuOTM5IDE3Ljg4OCw4Ljc2NyAxNC42NzgsOC43NjcgQzEwLjk1OSw4Ljc2NyA4Ljc3NywxMS41MzYgOC43NzcsMTQuMzk4IEM4Ljc3NywxNS41MTMgOS4yMSwxNi43MDkgOS43NDksMTcuMzU5IEM5Ljg1NiwxNy40ODggOS44NzIsMTcuNiA5Ljg0LDE3LjczMSBDOS43NDEsMTguMTQxIDkuNTIsMTkuMDIzIDkuNDc3LDE5LjIwMyBDOS40MiwxOS40NCA5LjI4OCwxOS40OTEgOS4wNCwxOS4zNzYgQzcuNDA4LDE4LjYyMiA2LjM4NywxNi4yNTIgNi4zODcsMTQuMzQ5IEM2LjM4NywxMC4yNTYgOS4zODMsNi40OTcgMTUuMDIyLDYuNDk3IEMxOS41NTUsNi40OTcgMjMuMDc4LDkuNzA1IDIzLjA3OCwxMy45OTEgQzIzLjA3OCwxOC40NjMgMjAuMjM5LDIyLjA2MiAxNi4yOTcsMjIuMDYyIEMxNC45NzMsMjIuMDYyIDEzLjcyOCwyMS4zNzkgMTMuMzAyLDIwLjU3MiBDMTMuMzAyLDIwLjU3MiAxMi42NDcsMjMuMDUgMTIuNDg4LDIzLjY1NyBDMTIuMTkzLDI0Ljc4NCAxMS4zOTYsMjYuMTk2IDEwLjg2MywyNy4wNTggQzEyLjA4NiwyNy40MzQgMTMuMzg2LDI3LjYzNyAxNC43MzMsMjcuNjM3IEMyMS45NSwyNy42MzcgMjcuODAxLDIxLjgyOCAyNy44MDEsMTQuNjYyIEMyNy44MDEsNy40OTUgMjEuOTUsMS42ODYgMTQuNzMzLDEuNjg2IiBmaWxsPSIjYmQwODFjIj48L3BhdGg+PC9nPjwvc3ZnPg==&quot;) 3px 50% / 14px 14px no-repeat rgb(189, 8, 28); position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; -webkit-font-smoothing: antialiased; top: 1727px; left: 116px;">Save</span><span style="border-radius: 3px; text-indent: 20px; width: 20px; height: 20px; background: url(&quot;data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHdpZHRoPSIzMHB4IiBoZWlnaHQ9IjMwcHgiIHZpZXdCb3g9IjAgMCAzMCAzMCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPGc+CjxwYXRoIHN0cm9rZT0iI2ZmZiIgc3Ryb2tlLXdpZHRoPSI0IiBkPSJNMTcsMTcgTDIyLDIyIFogIi8+CjxjaXJjbGUgc3Ryb2tlPSIjZmZmIiBjeD0iMTMiIGN5PSIxMyIgcj0iNiIgZmlsbD0ibm9uZSIgc3Ryb2tlLXdpZHRoPSIzLjUiLz4KPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAsMCBMOCwwIEw4LDMgTDMsMyBMMyw4IEwwLDggWiIvPgo8cGF0aCBmaWxsPSIjZmZmIiBkPSJNMzAsMjIgTDMwLDMwIEwyMiwzMCBMMjIsMjcgTDI3LDI3IEwyNywyMiBaIi8+CjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0zMCwwIEwzMCw4IEwyNyw4IEwyNywzIEwyMiwzIEwyMiwwIFoiLz4KPHBhdGggZmlsbD0iI2ZmZiIgZD0iTTAsMjIgTDMsMjIgTDMsMjcgTDgsMjcgTDgsMzAgTDAsMzBaIi8+CjwvZz4KPC9zdmc+Cg==&quot;) 50% 50% / 14px 14px no-repeat rgba(0, 0, 0, 0.4); position: absolute; opacity: 1; z-index: 8675309; display: none; cursor: pointer; border: none; top: 1727px; left: 171px;"></span></body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
