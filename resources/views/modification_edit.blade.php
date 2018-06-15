<!doctype html>
<html>

<head>
    <title>Palmsy | Edit modification info</title>

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
                        <a class="page-scroll" href="{{ URL::route('home') }}" style="color:#FFCC66;">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::route('user_index') }}" style="color:#FFCC66;">Administration</a>
                    </li> 
                    <li>
                        <a class="page-scroll" href="{{ URL::route('palmtree_list') }}" style="color:#FFCC66;">Detail Of Palm Tree</a>
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

<div class="container">

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <form method="POST" name="modification_edit_process" id="modification_edit_process" action="{{ URL::route ('modification_edit_process')}}" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @for ($i=0; $i < sizeof($edit_selected_modification); $i++)
        <div class="page-header">
            <h1><span class="glyphicon glyphicon-user"></span> Modification Info of ID {{$edit_selected_modification[$i]->id}}</h1>
        </div>
            <input type="hidden" name="edit_selected_modification[]" value="{{ $edit_selected_modification[$i]->id }}">
        <!-- FORM STARTS HERE -->
            <div class="form-group @if($errors->has('scientific_name')) has-error @endif">
                <label for="scientific_name">Scientific Name</label>
                <input type="text" id="scientific_name" class="form-control" name="scientific_name[]" placeholder="Scientific Name" value="{{$edit_selected_modification[$i]->scientific_name}}">
                @if ($errors->has('scientific_name')) <p class="help-block">{{ $errors->first('scientific_name') }}</p> @endif
            </div>

            <div class="form-group @if($errors->has('ori_seq')) has-error @endif">
                <label for="ori_seq">Original Sequence</label>
                <input type="text" id="ori_seq" class="form-control" name="ori_seq[]" placeholder="Original Sequence" value="{{$edit_selected_modification[$i]->ori_seq}}">
                @if ($errors->has('ori_seq')) <p class="help-block">{{ $errors->first('ori_seq') }}</p> @endif
            </div>

            <div class="form-group @if ($errors ->has ('mod_seq')) has-error @endif">
                <label for="mod_seq">Modified Sequence</label>
                <input type="text" id="mod_seq" class="form-control" name="mod_seq[]" placeholder="Modified sequence" value="{{$edit_selected_modification[$i]->mod_seq}}">
                 @if ($errors->has('mod_seq'))<p class="help-block">{{$errors ->first('mod_seq')}}</p>@endif
            </div>

            <div class="form-group @if ($errors ->has ('mod_type')) has-error @endif">
                <label for="mod_type">Type Of Modification </label>
                <input type="text" id="mod_type" class="form-control" name="mod_type[]" placeholder="Type Of Modification" value="{{$edit_selected_modification[$i]->mod_type}}">
                 @if ($errors->has('mod_type'))<p class="help-block">{{$errors ->first('mod_type')}}</p>@endif
            </div>

            @endfor
            </form>
            
            <br>
            <button type="submit" class="btn btn-small btn-info">Update</button> &nbsp;&nbsp;
            <a style="color:white" class="btn btn-small btn-info" href="{{ url('/modification_index') }}">Back</a>


    </div>
</div>


</body>
</html>