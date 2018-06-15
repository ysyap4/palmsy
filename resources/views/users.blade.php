<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Palmsy | Main Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="signup.css">
    <link href="{{ URL::asset('public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/animated.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/business-casual.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/creative.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/creative.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/login.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/signup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('public/css/stylish-portfolio.css') }}" rel="stylesheet" type="text/css">
 </head>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-light btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Start Bootstrap</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>
                <a href="#services" onclick=$("#menu-close").click();>Services</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Portfolio</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">

        <div class="text-vertical-center">

            <h1 style="color:#453823;">Palmsy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
            <h3 style="color:#2C2416;">Palm Tree Production System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h3>
            <br>
            <a href="#about" class="btn btn-light btn-lg">Find Out More</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:linear-gradient(to right, rgba(81, 165, 186,0.60), rgba(65,146,75, 0.75));">
                <ul class="nav navbar-nav navbar-right">
                    <li><br>Welcome ,{{Auth::user()->name}}</li>
                    <li>
                        <a class="page-scroll" href="{{ URL::route('users') }}" style="color:#FFCC66;">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::route('user_palmtreelist') }}" style="color:#FFCC66;">Detail Of Palm Tree</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::route('mod_index') }}" style="color:#FFCC66;">Modification</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::route('ana_index') }}" style="color:#FFCC66;">Analyzation</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="Login_Report/report_palmsy.html" style="color:#FFCC66;">Report</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ url('/logout') }}" style="color:#FFCC66;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
						{{ csrf_field() }}
						</form>
                    </li>
                    <li>
                        <a class="page-scroll" href=""></a>
                    </li>
                </ul>
            </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
         <div id="tfheader">
          <form id="tfnewsearch" method="get" action="https://www.google.com.my/">
             <input type="text" class="tftextinput" name="q" size="21" maxlength="120">
             <input type="submit" value="search" class="btn btn-warning" style="position:relative; left:50%;">
          </form>
    <div class="tfclear"></div>
            <div class="row">
                <div class="col-lg-12 text-center">
                	<br>
                    <h2 style="color:#336699;">Palmsy is the best system that help you to increase the production of palm tree !</h2>
                    <br>
                    <p class="lead">This system is applying bioinfomatics knowledge from <a target="_blank" href="https://www.ncbi.nlm.nih.gov//">National Center for Biotechnology Information (NCBI)</a></p>

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2 style="color:#41924B;"><strong>Our Services</strong></h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-certificate fa-stack-1x text-primary"></i>
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Administration</strong>
                                </h4>
                                <p>Management including create, read, update and delete the information of user.</p>
                                <br><br><br><br><br><br><br><br>
                                <a href="{{ URL::route('user_index') }}" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Modification</strong>
                                </h4>
                                <p>Modify the gene sequence by mutation technique insertion, deletion, substitution, duplication to enchance the palm tree production.</p>
                                <br><br><br><br>
                                <a href="modification.html" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-tasks fa-stack-1x text-primary"></i>
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Analyzation</strong>
                                </h4>
                                <p>Calculate the factors that affecting the production of palm tree such as growth rate, water potential and number of seeds produced by inheritance.</p>
                                <br><br><br><br>
                                <a href="analyzation.html" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                    <!--
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Detail Of Palm Tree</strong>
                                </h4>
                                <p>Show the detail on palm tree in  insert spcientific name, type of product, gene sequence and also the description of each palm tree..</p>
                                <a href="#" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                    -->
                    </div>
                        <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-leaf fa-stack-1x text-primary"></i>
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Detail Of Palm Tree</strong>
                                </h4>
                                <p>Display the details of palm tree such as specific name, function, genes.  </p>
                                <br><br><br><br>
                                <a href="indexList.html" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-folder-open fa-stack-1x text-primary"></i>
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Report</strong>
                                </h4>
                                <p>Print the overall report in way to make the finalze details that need to request.</p>
                                <br><br><br><br>
                                <a href="Login_Report/report_palmsy.html" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-phone fa-stack-1x text-primary"></i> 
                            </span>
                                <h4 style="color:#336699;">
                                    <strong>Contact Us</strong>
                                </h4>
                                <p>Please contact us for any suggestion or question via email or phone, and we will help you.</p>
                                <br><br>
                                <a href="#" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                    <!--
                     <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Administration</strong>
                                </h4>
                                <p>Create, read, update and delete the palm tree database, as well as edit the information.</p>
                                <a href="#" class="btn btn-light">Click Here!</a>
                            </div>
                        </div>
                    -->

                </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1 style="color:#AFEAAA;">Palmsy | Palm Tree Production System </h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <!--
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Click each for details</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-1.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-2.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-3.jpg">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="img/portfolio-4.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
    -->
    
                    <!-- /.row (nested) -->
    <!--
                    <a href="#" class="btn btn-dark">View More Palm Tree</a>
                </div>

                <!-- /.col-lg-10 -->
    <!--
            </div>
    -->
            <!-- /.row -->
    <!--
        </div>
    -->
        <!-- /.container -->
    <!--
    </section>
    -->



    <!-- Call to Action -->
    <!--
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>The buttons below are impossible to resist.</h3>
                    <a href="#" class="btn btn-lg btn-light">Click Me!</a>
                    <a href="#" class="btn btn-lg btn-dark">Look at Me!</a>
                </div>
            </div>
        </div>
    </aside>
    -->
   
     <!-- Map -->
      <!--
    <section id="contact" class="map">
        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        <br />
        <small>
            <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
        </small>
        </iframe>
    </section>
    -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">

                    <p>Johor Bharu, Johor
                        <br>81300, Johor Darul Takzim</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> 08-2957864</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="https://accounts.google.com/">palmsy@jdt.gmail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://www.facebook.com/logout.php"><i class="fa fa-facebook fa-fw fa-3x" style="color:#51A5BA;"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x" style="color:#51A5BA;"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x" style="color:#51A5BA;"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; Palmsy 2016</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>


<link href="{{ URL::asset('public/js/app.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/bootstrap.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/bootstrap.min.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.appear.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.fancybox.pack.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.mixitup.min.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.nav.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/parallax-1.1.3..js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/jquery.countTo.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/main.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/owl.carousel.min.js') }}" rel="stylesheet" type="text/js">
<link href="{{ URL::asset('public/js/wow.min.js') }}" rel="stylesheet" type="text/js">

