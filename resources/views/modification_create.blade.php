<?php
    use Illuminate\Support\Facades\Input;
    ?>
<html>
<head>
    <title>Palmsy | Register</title>

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

    @if (Session::has('message'))
    <div class = "alert alert-info">{{Session::get('message')}}</div>
    @endif

<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> Modification Info</h1>
        </div>

        <!-- FORM STARTS HERE -->
        <form method="POST" action="{{ URL::route ('modification_create_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if ($errors ->has ('scientific_name')) has-error @endif">
                <label for="scientific_name">Scientific Name</label>
                <input type="text" id="scientific_name" class="form-control" name="scientific_name" placeholder="Scientific Name" value="{{ Input::old('scientific_name')}}">
                @if ($errors->has('scientific_name'))<p class="help-block">{{$errors ->first('scientific_name')}}</p>@endif
            </div>

         <div class="form-group @if ($errors ->has ('ori_seq')) has-error @endif">
                <label for="ori_seq">Original Sequence</label>
                <input type="text" id="ori_seq" class="form-control" name="ori_seq" placeholder="Original Sequence" value="{{ Input::old('ori_seq')}}">
                 @if ($errors->has('ori_seq'))<p class="help-block">{{$errors ->first('ori_seq')}}</p>@endif
            </div>

             <div class="form-group @if ($errors ->has ('mod_seq')) has-error @endif">
                <label for="mod_seq">Modified Sequence</label>
                <input type="text" id="mod_seq" class="form-control" name="mod_seq" placeholder="Modified Sequence" value="{{ Input::old('mod_seq')}}">
                 @if ($errors->has('mod_seq'))<p class="help-block">{{$errors ->first('mod_seq')}}</p>@endif
            </div>

          <div class="form-group @if ($errors ->has ('mod_type')) has-error @endif">
                <label for="mod_type">Type Of Modification</label>
                <input type="text" id="mod_type" class="form-control" name="mod_type" placeholder="Modified Sequence" value="{{ Input::old('mod_type')}}">
                 @if ($errors->has('mod_type'))<p class="help-block">{{$errors ->first('mod_type')}}</p>@endif
            </div>

            <br>
            <button type="submit" class="btn btn-warning">Register</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ url('/modification_index') }}">Back</a>

        </form>

    </div>
</div>

</div>
</body>
</html>