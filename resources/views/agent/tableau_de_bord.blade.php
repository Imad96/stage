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

@section('body_tag') <body> @endsection

@section('contenu')


<div class="panel panel-default">
      <div class="panel-heading"> Statistiques générales (Semaine courante) </div>
          <div class="panel-body">

            <div class="row">
                   <div class="col-md-3 col-sm-12 col-xs-12">
                       <div class="panel panel-primary text-center no-boder bg-color-blue blue">
                           <div class="panel-left pull-left blue">
                               <i class="fa fa-level-up fa-5x"></i>
                           </div>
                           <div class="panel-right pull-right">
                             <h3>{{$nbrDepart}}</h3>
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
							               <h3>{{$nbrArrive}} </h3>
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
                             <h3>{{$nbrPartant}}</h3>
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
							               <h3>{{$nbrArrivant}} </h3>
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
                                           <th class="text-center">Numéro du vol</th>
                                           <th class="text-center">Le jour</th>
                                           <th class="text-center">Départ</th>
                                           <th class="text-center">Destination</th>
                                           <th class="text-center">Heure</th>
                                           <th> </th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                        @foreach($vols as $vol)
                                            <tr class="odd gradeX">
                                                <td class="text-center">{{$vol->vol_nvol}}</td>
                                                <td class="text-center">
                                                    @if($vol->vol_jour == 1)  Dimanche
                                                    @elseif($vol->vol_jour == 2) Lundi
                                                    @elseif($vol->vol_jour == 3) Mardi
                                                    @elseif($vol->vol_jour == 4) Mercredi
                                                    @elseif($vol->vol_jour == 5) Jeudi
                                                    @elseif($vol->vol_jour == 6) Vendredi
                                                    @elseif($vol->vol_jour == 7) Samedi
                                                    @endif

                                                     </td>
                                                <td class="text-center">{{$vol->vol_depart}}</td>
                                                <td class="text-center">{{$vol->vol_destin}}</td>
                                                <td class="text-center">{{$vol->vol_heurdpr}}</td>
                                                <td>
                                                       <form method="POST" action="{{route('vol.information')}}" id="form_info">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" id="nvol" name="nvol" value="{{$vol->vol_nvol}}">
                                                        <input type="hidden" id="jour" name="jour" value="{{$vol->vol_jour}}">
                                                        <input type="hidden" id="depart" name="depart" value="{{$vol->vol_depart}}">
                                                        <input type="hidden" id="dest" name="dest" value="{{$vol->vol_destin}}">
                                                        <button type="submit"  id="subForm" class="btn btn-info center-block">Plus de détails</button>
                                                       </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                   </tbody>
                               </table>
                           </div>


          </div>
</div>


<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h3 class="modal-title text-center" id="myModalLabel">Détails du vol numéro <span id="vol_nvol"></span> </h3>
                                        </div>
                                        <div class="modal-body">

                                    <div class="row">
                                        	<div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-danger">
                                                   <div class="panel-heading "> Heure départ</div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_heurdpr"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-success">
                                                    <div class="panel-heading text-center"> Heure arrivé </div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_heurarriv"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-info">
                                                   <div class="panel-heading text-center"> Jour</div>
                                                     <div class="panel-body text-center">
                                                     <strong id="vol_jour"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-warning">
                                                    <div class="panel-heading text-center" > Type du vol </div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_type"></strong>
                                                     </div>
                                                   </div>
                                            </div>

                                    </div>

                                    <div class="row">
                                    	    <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-primary">
                                                    <div class="panel-heading text-center" > Départ </div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_depart"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-warning">
                                                    <div class="panel-heading text-center" > Destination </div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_dest"></strong>
                                                     </div>
                                                   </div>
                                            </div>

                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-info">
                                                    <div class="panel-heading text-center" > Nb places 'C' </div>
                                                     <div class="panel-body text-center">
                                                     <strong id="vol_c"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                            <div class="col-md-3 col-sm-2">
                                                  <div class="panel panel-success">
                                                    <div class="panel-heading text-center"> Nb places 'Y' </div>
                                                     <div class="panel-body text-center">
                                                      <strong id="vol_y"></strong>
                                                     </div>
                                                   </div>
                                            </div>
                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
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


<script>
    $(document).on("submit", "#form_info", function (event) {
            //arreter l'envoi du formulaire
            event.preventDefault();
          /**
            * Envoie de la requette ajax
           */
         $.ajax({
             method: $(this).attr('method'),
             url: $(this).attr('action'),
             data: $(this).serialize(),
             dataType: "json",
             success: function(data){
                 //Récupération des données de la réponse et les mettre dans les champs du Model
                 $('#vol_nvol').html(data.data['0'].vol_nvol);
                 $('#vol_heurdpr').html(data.data['0'].vol_heurdpr);
                 $('#vol_heurarriv').html(data.data['0'].vol_heutarv);
                 var jour
                switch(data.data['0'].vol_jour){
                    case '1' :
                        jour = "Dimanche" ;
                    break;
                    case '2':
                        jour = "Lundi" ;
                    break;
                    case '3':
                        jour = "Mardi";
                    break;
                    case '4':
                        jour = "Mercredi" ;
                    break;
                    case '5':
                        jour = "Jeudi" ;
                    break;
                    case '6':
                        jour = "Vendredi" ;
                    break;
                    case '7':
                        jour = "Samedi" ;
                    break;
                }
                 $('#vol_jour').html(jour);
                 $('#vol_type').html(data.data['0'].vol_type);
                 $('#vol_depart').html(data.data['0'].vol_depart);
                 $('#vol_dest').html(data.data['0'].vol_destin);
                 $('#vol_c').html(data.data['0'].vol_np_c_first);
                 $('#vol_y').html(data.data['0'].vol_np_y_eco);
                 //faire apparaitre le model
                 $('#myModalInfo').modal('show');

             },
         })
        });
</script>


@endsection
