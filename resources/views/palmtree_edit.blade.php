<!doctype html>
<html>

<head>
    <title>Palmsy | Edit palm tree</title>

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
    <form method="POST" name="palmtree_edit_process" id="palmtree_edit_process" action="{{ URL::route ('palmtree_edit_process')}}" novalidate>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    @for ($i=0; $i < sizeof($edit_selected_palmtree); $i++)

        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> Palm Tree Info of {{$edit_selected_palmtree[$i]->general_name}}</h1>
        </div>
            <input type="hidden" name="edit_selected_palmtree[]" value="{{ $edit_selected_palmtree[$i]->id }}">
            <!-- FORM STARTS HERE -->
            <div class="form-group @if ($errors ->has ('general_name')) has-error @endif">
                <label for="name">General Name</label>
                <input type="text" id="general_name" class="form-control" name="general_name[]" placeholder="General Name" value="{{$edit_selected_palmtree[$i]->general_name}}">
                @if ($errors->has('general_name'))<p class="help-block">{{$errors ->first('general_name')}}</p>@endif
            </div>

              <label>Palm Tree Image</label>
<!-- <br><img src="<?php echo asset("public/img/portfolio/thumbnails/{{$edit_selected_palmtree[$i]->image_palmtree}}")?>">
  -->
@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
    </div>
    <img src="/image/{{ Session::get('path') }}">
    @endif
    <br>

   <!-- <form action="{{ url('image-upload') }}" enctype="multipart/form-data" method="POST"> -->
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <input type="file" name="image_palmtree[]" value="{{$edit_selected_palmtree[$i]->image_palmtree}}" />
        </div>
        <div class="col-md-12">
        <br>
        
        </div>
      </div>


            <div class="form-group @if ($errors ->has ('scientific_name')) has-error @endif">
                <label for="name">Scientific Name</label>
                <input type="text" id="scientific_name" class="form-control" name="scientific_name[]" placeholder="Scientific Name" value="{{$edit_selected_palmtree[$i]->scientific_name}}">
                @if ($errors->has('scientific_name'))<p class="help-block">{{$errors ->first('scientific_name')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('gene')) has-error @endif">
                <label for="gene">Gene</label>
                <input type="text" id="gene" class="form-control" name="gene[]" placeholder="Gene" value="{{$edit_selected_palmtree[$i]->gene}}">
                 @if ($errors->has('gene'))<p class="help-block">{{$errors ->first('gene')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('description')) has-error @endif">
                <label for="description">Description</label>
                <input type="text" id="description" class="form-control" name="description[]" placeholder="Description" value="{{$edit_selected_palmtree[$i]->description}}">
                 @if ($errors->has('description'))<p class="help-block">{{$errors ->first('description')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('product_type')) has-error @endif">
                <label for="product_type">Product Type</label><br>
                    <select name="product_type[]" value="{{$edit_selected_palmtree[$i]->product_type}}">
                        <option value="-"> - </option>
                        <option value="Palm oil"> Palm oil </option>
                        <option value="Food"> Food </option>
                        <option value="Decoration"> Decoration </option>
                    </select>
                 @if ($errors->has('product_type'))<p class="help-block">{{$errors ->first('product_type')}}</p>@endif
            </div>
            @endfor
            </form>
          

            <br>
            <button type="submit" class="btn btn-warning" form="palmtree_edit_process">Update</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-warning" href="{{ url('/palmtree_index') }}">Back</a>



    </div>
</div>
</div>

</body>
</html>