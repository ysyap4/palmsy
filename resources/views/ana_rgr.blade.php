<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Palmsy | Relative growth rate of modification ID {{$modification->id}}</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('public/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('public/css/stylish-portfolio.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
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

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:rgba(65,146,75, 0.75);">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="{{ url('/home') }}" style="color:#FFCC66; font-size: 20px;"><b>Home</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::route('user_index') }}" style="color:#FFCC66; font-size: 20px;"><b>Administration</b></a>
                </li> 
                <li>
                    <a class="page-scroll" href="{{ URL::route('palmtree_list') }}" style="color:#FFCC66; font-size: 20px;"><b>Detail Of Palm Tree</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::route('mod_index') }}" style="color:#FFCC66; font-size: 20px;"><b>Modification</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::route('ana_index') }}" style="color:#FFCC66; font-size: 20px;"><b>Analyzation</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="Login_Report/report_palmsy.html" style="color:#FFCC66; font-size: 20px;"><b>Report</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/logout') }}" style="color:#FFCC66; font-size: 20px;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Logout</b></a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a class="page-scroll" href=""></a>
                </li>
                <li>
                    <a class="page-scroll" href=""></a>
                </li>
            </ul>
    </div>

    <!-- Callout -->
    <aside class="calloutana">
        <div class="text-vertical-center">
            <h1>Analyzation</h1>
        </div>
    </aside>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio" style="background:linear-gradient(to right, rgba(81, 165, 186,0.75), rgba(65,146,75, 1));">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Calculate relative growth rate (RGR)</h2>
                    <h3>for modification ID {{$modification->id}}</h3>
                    <hr class="small">
                    <div class="row">

                        <br><br><br>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                            <br><br>
                                <math xmlns="http://www.w3.org/1998/Math/MathML" display="block" style="font-size: 45px;">
                                    <mrow>
                                        <mi>RGR</mi>
                                        <mo>=</mo>
                                        <mfrac>
                                            <mrow>
                                                <mi>ln</mi>
                                                <msub>
                                                    <mrow>
                                                        <mi>W</mi>
                                                    </mrow>
                                                    <mrow>
                                                        <mi>2</mi>
                                                    </mrow>
                                                </msub>
                                                <mo>&#x2212;</mo>
                                                <mi>ln</mi>
                                                <msub>
                                                    <mrow>
                                                        <mi>W</mi>
                                                    </mrow>
                                                    <mrow>
                                                        <mi>1</mi>
                                                    </mrow>
                                                </msub>
                                            </mrow>
                                            <mrow>
                                                <msub>
                                                    <mrow>
                                                        <mi>t</mi>
                                                    </mrow>
                                                    <mrow>
                                                        <mi>2</mi>
                                                    </mrow>
                                                </msub>
                                                <mo>&#x2212;</mo>
                                                <msub>
                                                    <mrow>
                                                        <mi>t</mi>
                                                    </mrow>
                                                    <mrow>
                                                        <mi>1</mi>
                                                    </mrow>
                                                </msub>
                                            </mrow>
                                        </mfrac>
                                    </mrow>
                                </math>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <h3> W2 = weight of plant at time 2 (kg) </h3>
                                <h3> W1 = weight of plant at time 1 (kg) </h3>
                                <h3> t2 = time 2 (days) </h3>
                                <h3> t1 = time 1 (days) </h3>
                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="row"> 
                            <div class="portfolio-item">
                                <form method="POST" action="{{ URL::route('ana_rgr_show', array($modification->id))}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <h3>Enter the following data:</h3>
                                    <br>
                                    <h4> W2 = &nbsp;&nbsp;&nbsp;
								        <input type="number" name="w2">
                                    <br> W1 = &nbsp;&nbsp;&nbsp;
								    	<input type="number" name="w1">
                                    <br> t2 = &nbsp;&nbsp;&nbsp;&nbsp;
								    	<input type="number" name="t2">
                                    <br> t1 = &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="number" name="t1">
                                    </h4>
                                    <br>
						  		  <button type="submit" class="btn btn-primary">Analyze</button>
                                  <a button type="button" style="background-color: #006666; color: white; border: none;" class="btn btn-primary" href="{{ URL::route('ana_select_analyze', array($modification->id))}}">
                                    Back
                                </a>
								</form>
                            </div>
                        

                        <div class="col-md-6">
                            <div class="portfolio-item">
                               <br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="portfolio-item">
                                
                            </div>
                        </div>

                    </div>
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
    <script src="{{ URL::asset('public/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('public/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML"></script>

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

</html>
