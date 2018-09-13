@extends('main_template')

@section('titre') Accueil @endsection
@section('sous-titre') -Consulter les informations des vols- @endsection
@section('userName') Haddad Imad @endsection
@section('tableau_de_bord_class')active-menu @endsection
@section('include_css')

<!-- Bootstrap Styles-->
<link href={{url('css/bootstrap.css')}} rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href={{url('css/font-awesome.css')}} rel="stylesheet" />
<!-- Custom Styles-->
<link href={{url('css/custom-styles.css')}} rel="stylesheet" />
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<!-- TABLE STYLES-->
<link href={{url('js/dataTables/dataTables.bootstrap.css')}} rel="stylesheet" />


@endsection

@section('contenu')


<div class="panel panel-default">
      <div class="panel-heading"> Statistique générales (Semaine courante) </div>
          <div class="panel-body">

            <div class="row">
                   <div class="col-md-3 col-sm-12 col-xs-12">
                       <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                           <div class="panel-left pull-left blue">
                               <i class="fa fa-level-up fa-5x"></i>
                           </div>
                           <div class="panel-right pull-right">
                             <h3>23</h3>
                              <strong> VOLS PARTANS </strong>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-3 col-sm-12 col-xs-12">
                       <div class="panel panel-primary text-center no-boder bg-color-green green">
                           <div class="panel-left pull-left green">
                               <i class="fa fa-level-down fa-5x"></i>
								           </div>
                           <div class="panel-right pull-right">
							               <h3>17 </h3>
                              <strong> Vols arrivants</strong>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-3 col-sm-12 col-xs-12">
                       <div class="panel panel-primary text-center no-boder" style="background-color:#ff9966;">
                           <div class="panel-left pull-left" style="background-color:#ff9966;">
                               <i class="fa fa-home fa-5x"></i>
                           </div>
                           <div class="panel-right pull-right">
                             <h3>127</h3>
                              <strong>Employés partants </strong>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-3 col-sm-12 col-xs-12">
                       <div class="panel panel-primary text-center no-boder bg-color-green green" >
                           <div class="panel-left pull-left green" >
                               <i class="fa fa-users fa-5x"></i>
								           </div>
                           <div class="panel-right pull-right">
							               <h3>160 </h3>
                              <strong> Employés arrivants</strong>
                           </div>
                       </div>
                   </div>

            </div>

          </div>
</div>


<div class="panel panel-default">
      <div class="panel-heading"> Liste des vols de la semaine </div>
          <div class="panel-body">
            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                   <thead>
                                       <tr>
                                           <th>Numéro du vol</th>
                                           <th>Date</th>
                                           <th>Départ</th>
                                           <th>Destination</th>
                                           <th>Heure</th>
                                           <th> </th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"
                                              data-toggle="modal" data-target="#myModal"> plus de détails
                                               </button>
                                           </td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>1133</td>
                                           <td>22-09-2018</td>
                                           <td>HME</td>
                                           <td class="center">BJA</td>
                                           <td class="center">11:05</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                       <tr class="odd gradeX">
                                           <td>2236</td>
                                           <td>11-10-2018</td>
                                           <td>HME</td>
                                           <td class="center">TEE</td>
                                           <td class="center">6:07</td>
                                           <td><button class="btn btn-info center-block"> plus de détails </button></td>
                                       </tr>
                                   </tbody>
                               </table>
                           </div>


          </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title text-center" id="myModalLabel">Détails du vol numéro 1133</h3>
                                        </div>
                                        <div class="modal-body">

                                    <div class="row">
                                        	<div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-danger">
                                                   <div class="panel-heading "> Heure départ</div>
                                                     <div class="panel-body text-center">
                                                      <strong>11:24</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-success">
                                                    <div class="panel-heading text-center"> Heure arrivé </div>
                                                     <div class="panel-body text-center">
                                                      <strong>12:45</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-info">
                                                   <div class="panel-heading text-center"> Date</div>
                                                     <div class="panel-body text-center">
                                                     <strong>11-02-2019</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-warning">
                                                    <div class="panel-heading text-center"> Type du vol </div>
                                                     <div class="panel-body text-center">
                                                      <strong>DPRG</strong>
                                                     </div>
                                                   </div>
                                            </div>

                                    </div>

                                    <div class="row">
                                    	    <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-primary">
                                                    <div class="panel-heading text-center"> Départ </div>
                                                     <div class="panel-body text-center">
                                                      <strong>HME</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-warning">
                                                    <div class="panel-heading text-center"> Destination </div>
                                                     <div class="panel-body text-center">
                                                      <strong>BJA</strong>
                                                     </div>
                                                   </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-info">
                                                    <div class="panel-heading text-center"> Nb places 'C' </div>
                                                     <div class="panel-body text-center">
                                                     <strong>24</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-success">
                                                    <div class="panel-heading text-center"> Nb places 'Y' </div>
                                                     <div class="panel-body text-center">
                                                      <strong>90</strong>
                                                     </div>
                                                   </div>
                                            </div>
                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
</div>

@endsection

@section('include_js')

<!-- JS Scripts-->
<!-- jQuery Js -->
<script src={{url('js/jquery-1.10.2.js')}}></script>
<!-- Bootstrap Js -->
<script src={{url('js/bootstrap.min.js')}}></script>
<!-- Metis Menu Js -->
<script src={{url('js/jquery.metisMenu.js')}}></script>
<!-- DATA TABLE SCRIPTS -->
<script src={{url('js/dataTables/jquery.dataTables.js')}}></script>
<script src={{url('js/dataTables/dataTables.bootstrap.js')}}></script>
<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
</script>

<!-- Custom Js -->
<script src={{url('js/custom-scripts.js')}}></script>


@endsection
