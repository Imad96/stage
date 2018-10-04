<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titre')</title>
    <base href="{{URL::asset('/public/')}}">

    @yield('include_css')


    <style type="text/css">

      .hoveredLink:hover{
         color: #1CC09F;
         background-color: rgb(43, 46, 51);
      }
    </style>

</head>

@yield('body_tag')

  <nav class="navbar-default top-navbar" role="navigation">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href={{ route('main')}}>

            <img src="img/sonatrach.jpg" height="28" width="24" style=" float: left;">
              &nbsp<span style="color: #f6821f;">Flight</span> System  <i class="fa fa-plane" ></i>
          </a>
      </div>

      <ul class="nav navbar-top-links navbar-left">
          <li><h3 style="color: white; font-weight: bold; margin-top: 14px;">&nbsp&nbsp&nbsp @yield('titre')</h3></li>
      </ul>

      <ul class="nav navbar-top-links navbar-right ">


          <li style="color: white;"><strong>@yield('userName')</strong></li>
          <!-- /.dropdown -->
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                  <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                  <li><a href="{{route('main')}}"><i class="fa fa-user fa-fw"></i> Profile</a>
                  </li>
                  <li><a href="{{route('main')}}"><i class="fa fa-gear fa-fw"></i> Paramètre</a>
                  </li>
                  <li class="divider"></li>
                  <li><a href="{{route('logout')}}" ><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
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
                  <a class="@yield('tableau_de_bord_class')" href="{{route('main')}}">
                    <i class="fa fa-dashboard"></i> Tableau de bord
                  </a>
              </li>
              <li class="hoveredLink">
                  <a class="@yield('modification_class')" href="{{route('modif.get')}}">
                    <i class="fa fa-edit "></i> Modification / Mise à jour
                  </a>
              </li>
              <li class="hoveredLink">
                  <a class="@yield('extraction_class')" href="{{route('list')}}">
                    <i class="fa fa-fw fa-file "></i> Extraction des listes
                  </a>
              </li>

              <li class="hoveredLink">
                  <a class="@yield('his_emp_class')" href="{{route('his.employe')}}" >
                    <i class="fa fa-user"></i>Historique par employé
                  </a>
              </li>
              <li class="hoveredLink">
                  <a class="@yield('his_vol_class')" href="{{route('his.vol')}}" >
                    <i class="fa fa-plane"></i>Historique par vol
                  </a>
              </li>


              <li class="hoveredLink">
                  <a href="{{route('logout')}}"><i class="fa fa fa-sign-out"></i> Déconnexion</a>
              </li>
          </ul>

            <img src="img/sonatrach2.jpg" height="125.75" width="225" style="margin-left: 16px; margin-top: 40px;">

      </div>

  </nav>

  <!-- /. NAV SIDE  -->

    <div id="wrapper">

        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">@yield('titre') <small> @yield('sous-titre')</small></h1>
                    </div>
                </div>

                				       @yield('contenu')

            </div>
            <!-- /. PAGE INNER  -->

             <footer><p><em style="float: right;">All right reserved. Designed by: <a href="">Imad & Messaoud</a></em></p></footer>


        </div>
        <!-- /. PAGE WRAPPER  -->


    </div>
    <!-- /. WRAPPER  -->

   @yield('include_js')

</body>

</html>
