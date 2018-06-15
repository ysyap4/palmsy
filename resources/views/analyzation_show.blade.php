<!DOCTYPE html>
<html>
<head>
    <title>Palmsy | Display analyzation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
</head>

<body style="background:#AFEAAA;">
    <header id="top" class="header">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background:rgba(65,146,75,0.75);">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="{{ url('/home') }}" style="color:#FFCC66;"><b>Home</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::route('user_index') }}" style="color:#FFCC66;"><b>Administration</b></a>
                </li> 
                <li>
                    <a class="page-scroll" href="indexList.html" style="color:#FFCC66;"><b>Detail Of Palm Tree</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="modification.html" style="color:#FFCC66;"><b>Modification</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="analyzation.html" style="color:#FFCC66;"><b>Analyzation</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="Login_Report/report_palmsy.html" style="color:#FFCC66;"><b>Report</b></a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ url('/logout') }}" style="color:#FFCC66;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><b>Logout</b></a>
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

<div class="container">
<br><br>
    
    @for ($i=0; $i < sizeof($show_selected_analyzation); $i++)
    <div class="jumbotron text-center">
    <h2>Displaying analyzation ID {{$show_selected_analyzation[$i] -> id}}'s information</h2>
        <p>
            <strong>ID : </strong>{{$show_selected_analyzation[$i] ->id}}<br>
            <strong>Modification ID : </strong>{{$show_selected_analyzation[$i] ->mod_id}}<br>
            <strong>Scientific Name : </strong>{{$show_selected_analyzation[$i] ->scientific_name}}<br>
            <strong>Modification Type : </strong>{{$show_selected_analyzation[$i] ->mod_type}}<br>
            <strong>Relative Growth Rate : </strong>{{$show_selected_analyzation[$i] ->rgr_value}}<br>
            <strong>RGR description : </strong>{{$show_selected_analyzation[$i] ->rgr_description}}<br>
            <strong>Water potential : </strong>{{$show_selected_analyzation[$i] ->wp_value}}<br>
            <strong>Water potential description : </strong>{{$show_selected_analyzation[$i] ->wp_description}}<br>
            <strong>Seeds Number : </strong>{{$show_selected_analyzation[$i] ->sn_value}}<br>
            <strong>Seeds number description : </strong>{{$show_selected_analyzation[$i] ->sn_description}}<br>
        </p>
        </div>
    @endfor

<div class="form-group col-md-12">
    <a style="color:yellow" class="btn btn-small btn-success" href="{{ url('/analyzation_index') }}">Back</a>
</div>


</div>
</body>
</html>