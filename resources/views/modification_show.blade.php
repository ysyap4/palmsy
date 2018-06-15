<!DOCTYPE html>
<html>
<head>
    <title>Palmsy | Display modification</title>
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
                    <a class="page-scroll" href="{{ URL::route('modification_index') }}" style="color:#FFCC66;"><b>Administration</b></a>
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
    @for ($i=0; $i < sizeof($show_selected_modification); $i++)
    <div class="jumbotron text-center">
    <h2>Displaying modification ID {{$show_selected_modification[$i] -> id}}'s information</h2>
        <p>
            <strong>ID : </strong>{{$show_selected_modification[$i] ->id}}<br>
            <strong>Scientific Name : </strong>{{$show_selected_modification[$i] ->scientific_name}}<br>
            <strong>Original Sequence : </strong>{{$show_selected_modification[$i] ->ori_seq}}<br>
            <strong>Modified Sequence : </strong>{{$show_selected_modification[$i] ->mod_seq}}<br>
            <strong>Type Of Modification: </strong>{{$show_selected_modification[$i] ->mod_type}}<br>
        </p>
        </div>
    @endfor

<div class="form-group col-md-12">
    <a style="color:yellow" class="btn btn-small btn-success" href="{{ url('/modification_index') }}">Back</a>
</div>


</div>
</body>
</html>