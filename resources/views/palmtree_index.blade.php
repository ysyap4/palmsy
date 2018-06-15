<!DOCTYPE html>
<html>

<head>
    <title>Palmsy | Displaying all users</title>
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

<a style="color:#2F4F4F; background:#FFFF66; border: none;" class="btn btn-warning" href="{{URL::route('user_index')}}">User Info</a>
<a style="color:#2F4F4F; background:#FFFF66; border: none;" class="btn btn-warning" href="{{URL::route('palmtree_index')}}">Palm Tree Info</a>
<a style="color:#2F4F4F; background:#FFFF66; border: none;" class="btn btn-warning" href="{{URL::route('modification_index')}}">Modification Info</a>
<a style="color:#2F4F4F; background:#FFFF66; border: none;" class="btn btn-warning" href="{{URL::route('analyzation_index')}}">Analyzation Info</a>

<br><br>
<h1>Palmsy | Displaying all palm trees</h1>
<div class="col-md-12">
    <form class='navbar-form navbar-right' role="form" method="GET" action="{{ url('palmtree_index') }}">

<div class="input-group custom-search-form">
<!-- <div class="form-action pull-right ">
        <a href="{{URL::to('cetak_ListOfUser')}}" class="btn btn-info tooltips" data-original-title="PRINT"  target="_blank">PRINT</a>
    </div>
     -->
    <!-- <a style="color:white; float:right;" class="btn btn-warning" href="{{URL::route('palmtree_create')}}">ADD</a> -->
    
</div>
</form>

<form class='navbar-form navbar-right' action="cetak_ListOfPalmTree" method="get" target="_blank">
  <!-- <div class="col-md-6 col-sm-12 nopadding" style="display: inline-block; vertical-align:middle">
    <label class="col-md-1 col-sm-2 nopadding"></label> -->
   <!--  <div class="col-md-8 col-sm-8 nopadding pull-right btn-toolbar"> -->
   <a style="color:white; float:right;" class="btn btn-warning" href="{{URL::route('palmtree_create')}}">ADD</a>
       <input type="submit" name="btnpdf" value="PRINT PDF" class="btn btn-small btn-info  pull-right text-right">
      <input type="submit" name="btnxls" value="PRINT XLS" class="btn btn-small btn-info pull-right text-right"> 
      
    <!-- </div> -->
  <!-- </div> -->
</form>

<!-- <form role="form" action="cetak_ListOfPalmTree" method="get" target="_blank">
  <div class="col-md-6 col-sm-12 nopadding" style="display: inline-block; vertical-align:middle">
    <label class="col-md-1 col-sm-2 nopadding"></label>
    <div class="col-md-8 col-sm-8 nopadding pull-right btn-toolbar">
       <input type="submit" name="btnpdf" value="PDF" class="btn btn-sm purple-seance pull-right text-right">
      <input type="submit" name="btnxls" value="XLS" class="btn btn-sm purple-seance pull-right text-right"> 
    </div>
  </div>
</form> -->
 <!--  </div>
</form> -->
</div>


<!-- will be used to show any messages
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<!--<div>
  
<form action"" method="GET" id="filterForm" style="width:99px;margin:20px;">
  <label style="font-size: 20px;">Sort By:
    <input type="hidden" name="filter" id="filter">
    <select id="fp" name="category" onchange="filterResults();" class="form-control">
        <option value="0">ID</option>
        <option value="1">General Name</option>
        <option value="2">Scientific Name</option>
        <option value="3">Product Type</option>
        <option value="4">Gene</option>
    </select>
  </label>
</form>
</div>-->

<button type="submit" id="palmtree_show" style="color:yellow;" class="btn btn-small btn-success" onClick="palmtree_show()";> Show</button> 
<button type="submit" id="palmtree_edit" class="btn btn-small btn-info" onClick="palmtree_edit()";> Edit</button> 
<button type="submit" id="palmtree_delete" style="color:#FFF0AA;" class="btn btn-small btn-danger" onClick="palmtree_delete()";> Delete</button> 
<br><br>
<form method="GET" name="get_checkbox">
<table id="allBlogs" class="table table-striped table-bordered">
    <thead>
        <tr style="background:#B4D8E7; text-align: center;">
            <td></td>
            <td>No</td>
            <td>Image</td>
            <td>General Name</td>
            <td>Specific Name</td>
            <td>Product Type</td>
            <td>Gene</td>
            <td>Description</td>
            <td>Action</td>
            

        </tr>
    </thead>
<tbody>
    <?php $no = 1; ?>
    @foreach($palmtree as $value)
    <tr>
        <td><input type="checkbox" name="selected_palmtree[]" value="{{ $value->id }}" id="selected_palmtree"></td>
        <td><?php echo $no ?></td>
        <!--td>{{ $value->id }}</td-->
        <td style="img"> <img src="public/img/portfolio/thumbnails/{{$value->image_palmtree}}" class="img-portfolio img-responsive" height="300" width="300"> </td>
        <td>{{ $value->general_name }}</td>
        <td>{{ $value->scientific_name }}</td>
        <td>{{ $value->product_type }}</td>
        <td>{{ $value->gene }}</td>
        <td>{{ $value->description }}</td>
        <td><a style="color:yellow;" class="btn btn-small btn-success" href="{{URL::route('palmtree_print',array($value->id))}}" target="_blank">Print</a></td>
    </tr>
    <?php $no++; ?>
    @endforeach
</tbody>
</table>

</div>



</script>
    
    <script type="text/javascript">
    function palmtree_show()
    {
        var x =[];

        if (this.checked)
        {
          $('#selected_palmtree').removeAttr('disabled');
          $('#allBlogs :checked').each(function()
          {
            x.push($(this).val());
          });
        }

        x = document.getElementById("selected_palmtree").value;
        document.get_checkbox.action = "{{URL::route('palmtree_show')}}";
        document.get_checkbox.submit();
    }
    </script>

    <script type="text/javascript">
    function palmtree_edit()
    {
        var x =[];

        if (this.checked)
        {
          $('#selected_palmtree').removeAttr('disabled');
          $('#allBlogs :checked').each(function()
          {
            x.push($(this).val());
          });
        }

        x = document.getElementById("selected_palmtree").value;
        document.get_checkbox.action = "{{URL::route('palmtree_edit')}}";
        document.get_checkbox.submit();
    }
    </script>

    <script>
    $('#allBlogs').dataTable( {
    "lengthMenu" : [[5,10,15,-1],[5,10,15,"All"]]
    } );
    </script>

       </script>

    <script type="text/javascript">
    function palmtree_delete()
    {
        var x =[];

          $('button#palmtree_delete').on('click',
    function(){
      swal({
       title: "Are you sure?",
       text: "You will not be able to recover this user!",
       type: "warning",
       html:true,
       showCancelButton: true,
       confirmButtonColor: '#3ebf8f',
       confirmButtonText: 'Yes,delete it!',
       closeOnConfirm: true,
       showLoaderOnConfirm:false
      },
      function(){
        $.ajax({
             success: function (userRows) {
                 swal({
                       title: "Data Removed!",
                       type: "success",
                       html:true,
                       showCancelButton: false,
                       confirmButtonColor: '#3ebf8f',
                       confirmButtonText: 'OK',
                       closeOnConfirm: true
                       },
                       function(){

                         if (this.checked)
        {
          $('#selected_palmtree').removeAttr('disabled');
          $('#allBlogs :checked').each(function()
          {
            x.push($(this).val());
          });
        }

        x = document.getElementById("selected_palmtree").value;
        document.get_checkbox.action = "{{URL::route('palmtree_delete')}}";
        document.get_checkbox.submit();
                         
                       });
          }
        });
      });
    })
       
    }
    </script>

</body>
</html>