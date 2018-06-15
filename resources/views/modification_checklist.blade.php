<!DOCTYPE html>
<html>

<head>
    <title>Palmsy | Displaying all modification of sequences</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="public/js/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="node_modules/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="build/datatables/css/dataTables.bootstrap.min.css">
    <script src="build/datatables/js/jquery.dataTables.min.js"></script>
    <script src="build/datatables/js/dataTables.bootstrap.min.js"></script>
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

<br>

<div class="container">

<br><br>
<h1>Palmsy | Displaying all modification of sequences</h1>

<div class="form-group col-md-12">
    <a style="color:white; float:right;" class="btn btn-warning" href="{{URL::route('ana_index')}}">Back</a>
</div>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table id="allBlogs" class="table table-striped table-bordered">
    <thead>
        <tr style="background:#B4D8E7">
            <td>No</td>
            <td>ID</td>
            <td>Scientific Name</td>
            <!--td>Original Sequence</td>
            <td>Modified Sequence</td>
            <td>Type Of Modification</td-->
        </tr>
    </thead>
<tbody>
    <?php $no = 1; ?>
    @foreach($modification as $value)
    <tr>
        <td><?php echo $no ?></td>
        <td>{{ $value->id }}</td>
        <td>{{ $value->scientific_name }}</td>
        <!--td>{{ $value->ori_seq }}</td>
        <td>{{ $value->mod_seq }}</td>
        <td>{{ $value->mod_type }}</td-->
    </tr>
    <?php $no++; ?>
    @endforeach
</tbody>
</table>

 <script>
    $('#allBlogs').dataTable( {
    "lengthMenu" : [[5,10,15,-1],[5,10,15,"All"]]
    } );
    </script>

</div>
</body>
</html>