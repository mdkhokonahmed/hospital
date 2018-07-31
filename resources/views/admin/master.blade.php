<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/pages/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
<link href="{{asset('public/datepicker/')}}/css/datepicker.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/pages/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/pages/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('public/pages/')}}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/pages/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>    
   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.includes.header')
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
              @include('admin.includes.sidebar')
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
           
           
            @yield('homecontent') 
            <!-- /.row -->
            
            <!-- /.row -->
            
                <!-- /.col-lg-8 -->
                
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <script src="{{asset('public/pages/')}}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/pages/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

     <script src="{{asset('public/datepicker/')}}/js/bootstrap-datepicker.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/pages/')}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/pages/')}}/vendor/raphael/raphael.min.js"></script>
    <script src="{{asset('public/pages/')}}/vendor/morrisjs/morris.min.js"></script>
    <script src="{{asset('public/pages/')}}/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/pages/')}}/dist/js/sb-admin-2.js"></script>

  


 </body>

 </html>