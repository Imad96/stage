<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titre')</title>
    <base href="{{URL::asset('/public/')}}">


    <!-- Bootstrap Styles-->
    <link href={{url('css/bootstrap.css')}} rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href={{url('css/font-awesome.css')}} rel="stylesheet" />
    <!-- Custom Styles-->
    <link href={{url('css/custom-styles.css')}} rel="stylesheet" />

    <link href={{url('js/dataTables/dataTables.bootstrap.css')}} rel="stylesheet" />

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

                <a class="navbar-brand"  href="{{route('accueil.admin')}}">
                	<img src="img/sonatrach.jpg" height="28" width="24" style=" float: left;">
                	  &nbsp<span style="color: #f6821f;">Flight</span> System  <i class="fa fa-plane" ></i>
                </a>
            </div>

            <ul class="nav navbar-top-links navbar-left">
                <li><h3 style="color: white; font-weight: bold; margin-top: 14px;">&nbsp&nbsp&nbsp @yield('title_page')  </h3></li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">


                <li style="color: white;"><strong>@yield('user_name')</strong></li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('accueil.admin')}}"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li><a href="{{route('accueil.admin')}}"><i class="fa fa-gear fa-fw"></i> Paramètre</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
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
                        <a class="@yield('admin_accueil_classe')"  href={{route('accueil.admin')}}><i class="fa fa-dashboard"></i> Tableau de bord</a>
                    </li>
                    <li class="hoveredLink">
                        <a class="@yield('ajouter_compte_classe')" href={{route('add.account')}}><i class="fa fa-plus "></i> Ajouter un compte</a>
                    </li>
                    <li class="hoveredLink">
                        <a href="{{route('logout')}}"><i class="fa fa fa-sign-out"></i> Déconnexion</a>
                    </li>
                </ul>

                  <img src="img/sonatrach2.jpg" height="125.75" width="225" style="margin-left: 16px; margin-top: 40px;">

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">@yield('title') <small> @yield('sub_title') </small> </h1>
                    </div>
                </div>


               <div class="row">
			    <div class="col-md-12">
			      <div class="panel panel-default">
				    <div class="panel-heading"> @yield('pannel_head')</div>
				        <div class="panel-body">

                            @yield('content')


				        </div>

				  </div>
				</div>
			   </div>



            </div>
            <!-- /. PAGE INNER  -->

            <footer style="margin-top:5px;"><p><em style="float: right;">All right reserved. Designed by: <a href="">Imad & Messaoud</a></em></p></footer>


        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->
      <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src={{url('js/jquery-1.10.2.js')}}></script>
    <!-- Bootstrap Js -->
    <script src={{url('js/bootstrap.min.js')}}></script>

    <!-- Metis Menu Js -->
    <script src={{url('js/jquery.metisMenu.js')}}></script>



    <script src={{url('js/dataTables/jquery.dataTables.js')}}></script>
    <script src={{url('js/dataTables/dataTables.bootstrap.js')}}></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <script src={{url('js/custom-scripts.js')}}></script>

    @yield('scripts')


</body>

</html>
