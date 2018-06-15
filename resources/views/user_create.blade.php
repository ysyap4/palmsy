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
            <h1><span class="glyphicon glyphicon-user"></span> User Info</h1>
        </div>

        <!-- FORM STARTS HERE -->
        <form method="POST" action="{{ URL::route ('user_create_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if ($errors ->has ('name')) has-error @endif">
                <label for="name">Name</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Your Name" value="{{ Input::old('name')}}">
                @if ($errors->has('name'))<p class="help-block">{{$errors ->first('name')}}</p>@endif
            </div>

         <div class="form-group @if ($errors ->has ('email')) has-error @endif">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" placeholder="Your Email" value="{{ Input::old('email')}}">
                 @if ($errors->has('email'))<p class="help-block">{{$errors ->first('email')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('phone')) has-error @endif">
                <label for="phone">Phone</label>
                <input type="text" id="phone" class="form-control" name="phone" placeholder="Your Phone" value="{{ Input::old('phone')}}">
                 @if ($errors->has('phone'))<p class="help-block">{{$errors ->first('phone')}}</p>@endif
            </div>

          <div class="form-group @if ($errors ->has ('password')) has-error @endif">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Your Password" value="">
                 @if ($errors->has('password'))<p class="help-block">{{$errors ->first('password')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('c_password')) has-error @endif">
                <label for="c_password">Confirm Password</label>
                <input type="password" id="c_password" class="form-control" name="c_password" placeholder="Confirm Your Password" value="">
                 @if ($errors->has('c_password'))<p class="help-block">{{$errors ->first('c_password')}}</p>@endif
            </div>

            <br>
            <button type="submit" class="btn btn-warning">Register</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ url('/user_index') }}">Back</a>

        </form>

    </div>
</div>

</div>
</body>
</html>