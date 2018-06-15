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
            <h1><span class="glyphicon glyphicon-user"></span> Palm Tree Info</h1>
        </div>

        <!-- FORM STARTS HERE -->
        <form method="POST" action="{{ URL::route ('palmtree_create_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group @if ($errors ->has ('general_name')) has-error @endif">
                <label for="name">General Name</label>
                <input type="text" id="general_name" class="form-control" name="general_name" placeholder="General Name" value="{{ Input::old('general_name')}}">
                @if ($errors->has('general_name'))<p class="help-block">{{$errors ->first('general_name')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('specific_name')) has-error @endif">
                <label for="name">Scientific Name</label>
                <input type="text" id="scientific_name" class="form-control" name="scientific_name" placeholder="Scientific Name" value="{{ Input::old('scientific_name')}}">
                @if ($errors->has('specific_name'))<p class="help-block">{{$errors ->first('specific_name')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('gene')) has-error @endif">
                <label for="gene">Gene</label>
                <input type="text" id="gene" class="form-control" name="gene" placeholder="Gene" value="{{ Input::old('gene')}}">
                 @if ($errors->has('gene'))<p class="help-block">{{$errors ->first('gene')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('description')) has-error @endif">
                <label for="description">Description</label>
                <input type="text" id="description" class="form-control" name="description" placeholder="Description" value="{{ Input::old('description')}}">
                 @if ($errors->has('description'))<p class="help-block">{{$errors ->first('description')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('product_type')) has-error @endif">
                <label for="product_type">Product Type</label><br>
                    <select name="product_type">
                        <option value="-"> - </option>
                        <option value="Palm oil"> Palm oil </option>
                        <option value="Food"> Food </option>
                        <option value="Decoration"> Decoration </option>
                    </select>
                 @if ($errors->has('product_type'))<p class="help-block">{{$errors ->first('product_type')}}</p>@endif
            </div>
          

            <br>
            <button type="submit" class="btn btn-warning">Register</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ url('/palmtree_index') }}">Cancel</a>

        </form>

    </div>
</div>

</div>
</body>
</html>