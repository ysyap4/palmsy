<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Palmsy | Select analyzation</title>

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
	
<style type="text/css">

.hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
}

.hovereffect .overlay {
  position: absolute;
  overflow: hidden;
  width: 80%;
  height: 80%;
  left: 10%;
  top: 10%;
  border-bottom: 1px solid #FFF;
  border-top: 1px solid #FFF;
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: scale(0,1);
  -ms-transform: scale(0,1);
  transform: scale(0,1);
}

.hovereffect:hover .overlay {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
}

.hovereffect img {
  display: block;
  position: relative;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}

.hovereffect:hover img {
  filter: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg"><filter id="filter"><feComponentTransfer color-interpolation-filters="sRGB"><feFuncR type="linear" slope="0.6" /><feFuncG type="linear" slope="0.6" /><feFuncB type="linear" slope="0.6" /></feComponentTransfer></filter></svg>#filter');
  filter: brightness(0.6);
  -webkit-filter: brightness(0.6);
}

.hovereffect h2 {
  text-transform: uppercase;
  text-align: center;
  position: relative;
  font-size: 17px;
  background-color: transparent;
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,-100%,0);
  transform: translate3d(0,-100%,0);
}

.hovereffect a, hovereffect p {
  color: #FFF;
  padding: 1em 0;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
  transition: opacity 0.35s, transform 0.35s;
  -webkit-transform: translate3d(0,100%,0);
  transform: translate3d(0,100%,0);
  font-size:25px;
  font-family: Arial, Helvetica, sans-serif;
}

.hovereffect:hover a, .hovereffect:hover p, .hovereffect:hover h2 {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}
</style>
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
            <h2>The modification info for analysis</h2>
              <hr class="small">
                <div class="row">

                  
                    <div class="portfolio-item">
                      <h4> Modification ID: {{$modification->id}}</h4>
                      <h4> Scientific name: {{$modification->scientific_name}}</h4>
                      <h4> Modified gene sequence: {{$modification->mod_seq}}</h4>
                      <h4> Modification type: {{$modification->mod_type}}</h4>
                      <h4> Modification time: {{$modification->created_at}}</h4>
                      <br><br>
                      Wrong? click &nbsp;
                      <a button type="button" style="background-color: #006666; color: #CCCCCC; border: none;" class="btn btn-primary" href="{{ URL::route('ana_index')}}">
                        here
                      </a>
                      &nbsp; to select again
                      <br><br><br>
                    </div>
                  </div>
            
            <h2>Calculate and Interpret</h2>
            <h3> Select the type of analysis </h3>
              <hr class="small">
                <div class="row">
                  <div class="col-md-6">
                    <div class="portfolio-item">
                      <div class="hovereffect">
                        <img class="img-portfolio img-responsive" src="{{ URL::asset('public/img/rgr_cover.jpg') }}">
                        <div class="overlay">
										      <br><br><br><br><br>
										      <p> <a href="{{ URL::route('ana_rgr', array($modification->id))}}">RELATIVE GROWTH RATE</a> </p>
                        </div>
								      </div>
                      <h3> Relative growth rate (RGR) is a measure used to quantify the speed of plant growth. It is measured as the mass increase per aboveground biomass per day. </h3>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="portfolio-item">
                      <div class="hovereffect">
                        <img class="img-portfolio img-responsive" src="{{ URL::asset('public/img/wp_cover.jpg') }}">
                        <div class="overlay">
                          <br><br><br><br><br>
										      <p> <a href="{{ URL::route('ana_wp', array($modification->id))}}">WATER POTENTIAL</a> </p> 
                        </div>
								      </div>
                      <h3> Water potential is the potential energy of water per unit volume relative to pure water in reference conditions. It is typically expressed in potential energy per unit volume. </h3>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="portfolio-item">
                      <div class="hovereffect">
                        <img class="img-portfolio img-responsive" src="{{ URL::asset('public/img/sn_cover.jpg') }}">
                        <div class="overlay">
                          <br><br><br><br><br>
                          <p> <a href="{{ URL::route('ana_sn', array($modification->id))}}">SEEDS NUMBER</a> </p> 
                        </div>
                      </div>
                      <h3> Seeds number is the total quantity of seeds produced by palm tree. It is calculated by using Mendel's second law formula. </h3>
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
