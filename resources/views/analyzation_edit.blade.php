<!doctype html>
<html>

<head>
    <title>Palmsy | Edit user</title>

    <!-- load bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">
    <style>
        
    </style>
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

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <form method="POST" name="analyzation_edit_process" id="analyzation_edit_process" action="{{ URL::route ('analyzation_edit_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @for ($i=0; $i < sizeof($edit_selected_analyzation); $i++)
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> Analyzation Info of ID {{$edit_selected_analyzation[$i]->id}}</h1>
        </div>
            <input type="hidden" name="edit_selected_analyzation[]" value="{{ $edit_selected_analyzation[$i]->id }}">
        <!-- FORM STARTS HERE -->
            <div class="form-group @if($errors->has('mod_id')) has-error @endif">
                <label for="mod_id">Modification ID</label>
                <input type="text" id="mod_id" class="form-control" name="mod_id[]" placeholder="Modification ID" value="{{$edit_selected_analyzation[$i]->mod_id}}">
                @if ($errors->has('mod_id')) <p class="help-block">{{ $errors->first('mod_id') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('scientific_name')) has-error @endif">
                <label for="scientific_name">Scientific Name</label>
                <input type="text" id="scientific_name" class="form-control" name="scientific_name[]" placeholder="Scientific Name" value="{{$edit_selected_analyzation[$i]->scientific_name}}">
                @if ($errors->has('scientific_name')) <p class="help-block">{{ $errors->first('scientific_name') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('mod_type')) has-error @endif">
                <label for="mod_type">Modification Type</label>
                <input type="text" id="mod_type" class="form-control" name="mod_type[]" placeholder="Modification Type" value="{{$edit_selected_analyzation[$i]->mod_type}}">
                @if ($errors->has('mod_type')) <p class="help-block">{{ $errors->first('mod_type') }}</p> @endif
            </div>
            
            <div class="form-group @if ($errors ->has('rgr_value')) has-error @endif">
                <label for="rgr_value">Relative growth rate</label>
                <input type="text" id="rgr_value" class="form-control" name="rgr_value[]" placeholder="Relative growth rate value" value="{{$edit_selected_analyzation[$i]->rgr_value}}">
                 @if ($errors->has('rgr_value'))<p class="help-block">{{$errors ->first('rgr_value')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has('rgr_value')) has-error @endif">
                <label for="wp_value">Water potential</label>
                <input type="text" id="wp_value" class="form-control" name="wp_value[]" placeholder="Water potential value" value="{{$edit_selected_analyzation[$i]->wp_value}}">
                 @if ($errors->has('wp_value'))<p class="help-block">{{$errors ->first('wp_value')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has('sn_value')) has-error @endif">
                <label for="sn_value">Relative growth rate</label>
                <input type="text" id="sn_value" class="form-control" name="sn_value[]" placeholder="Seeds number value" value="{{$edit_selected_analyzation[$i]->sn_value}}">
                 @if ($errors->has('sn_value'))<p class="help-block">{{$errors ->first('sn_value')}}</p>@endif
            </div>
            @endfor
            </form>
            
            <br>
            <button type="submit" class="btn btn-small btn-info" form="modification_edit_process"> Update </button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-small btn-info" href="{{ url('/modification_index') }}">Back</a>




        </div>
    </div>



</body>
</html>