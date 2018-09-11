<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titre')</title>
    <base href="{{URL::asset('/public')}}" target="_blank">


    <!-- Bootstrap Styles-->
    <link href={{url('/assets/css/bootstrap.css')}} rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href={{url('assets/css/font-awesome.css')}} rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href={{url('assets/js/morris/morr is-0.4.3.min.css')}} rel="stylesheet" />
    <!-- Custom Styles-->
    <link href={{url('assets/css/custom-styles.css')}} rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <style type="text/css">

      .hoveredLink:hover{
         color: #1CC09F;
         background-color: rgb(43, 46, 51);
      }
    </style>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"  href="index.html">

                	<img src="sonatrach.jpg" height="28" width="24" style=" float: left;">
                	  &nbsp<span style="color: #f6821f;">Flight</span> System  <i class="fa fa-plane" ></i>
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                <li><h3 style="color: white; font-weight: bold; margin-top: 14px;">&nbsp&nbsp&nbsp @yield('titre')</h3></li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">


                <li style="color: white;"><strong>@yield('userName')</strong></li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Paramètre</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>

        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">


		<!-- <div id="sideNav" href=""><i class="fa fa-caret-left"></i></div> -->

            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">



                    <li class="hoveredLink">
                        <a class="active-menu " href=""><i class="fa fa-dashboard"></i> Tableau de bord</a>
                    </li>
                    <li class="hoveredLink">
                        <a href=""><i class="fa fa-edit "></i> Modification / Mise à jour</a>
                    </li>
					<li class="hoveredLink">
                        <a href=""><i class="fa fa-fw fa-file "></i> Extraction des listes</a>
                    </li>

                    <li class="hoveredLink">
                        <a href="#"><i class="fa fa-calendar"></i> Historique<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="hoveredLink">
                                <a href="#" >Par employé</a>
                            </li>
                            <li class="hoveredLink">
                                <a href="#" >Par vol</a>
                            </li>
                        </ul>
                    </li>

                    <li class="hoveredLink">
                        <a href=""><i class="fa fa fa-sign-out"></i> Déconnexion</a>
                    </li>
                </ul>

                  <img src="sonatrach2.jpg" height="125.75" width="225" style="margin-left: 16px; margin-top: 40px;">

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">@yield('titre') <small> sub-title</small></h1>
                        <ol class="breadcrumb">
                          <li><a href="#">Title1</a></li>
                          <li><a href="#">Title2</a></li>
                          <li class="active">Title3</li>
                        </ol>
                    </div>
                </div>


               <div class="row">
			    <div class="col-md-12">
			      <div class="panel panel-default">
				    <div class="panel-heading"> @yield('header')</div>
				        <div class="panel-body">

				            @yield('content')
				        </div>

				  </div>
				</div>
			   </div>



            </div>
            <!-- /. PAGE INNER  -->

             <footer><p><em style="float: right;">All right reserved. Designed by: <a href="">Imad & Messaoud</a></em></p></footer>


        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src={{url('assets/js/jquery-1.10.2.js')}}></script>
    <!-- Bootstrap Js -->
    <script src={{url('assets/js/bootstrap.min.js')}}></script>

    <!-- Metis Menu Js -->
    <script src={{url('assets/js/jquery.metisMenu.js')}}></script>
    <!-- Morris Chart Js -->
    <script src={{url('assets/js/morris/raphael-2.1.0.min.js')}}></script>
    <script src={{url('assets/js/morris/morris.js')}}></script>


	  <script src={{url('assets/js/easypiechart.js')}}></script>
	  <script src={{url('assets/js/easypiechart-data.js')}}></script>

    <!-- Custom Js -->
    <script src={{url('assets/js/custom-scripts.js')}}></script>


</body>

</html>
