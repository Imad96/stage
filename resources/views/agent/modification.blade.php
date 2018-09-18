@extends('main_template')

@section('titre') Modification @endsection
@section('sous-titre') -Modifier ou mettre à jour les informations des vols- @endsection
@section('userName') Haddad Imad @endsection
@section('modification_class')active-menu @endsection
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

@endsection

@section('body_tag') <body> @endsection

@section('contenu')

<div class="panel panel-default">
      <div class="panel-heading"> Veuillez rechercher le vol à Modifier ! </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <form method="POST" action="{{ route('search.vol.2') }}" id="form_search">
                        {{ csrf_field() }}
                  <label>Le numéro du vol</label>
                  <div class="form-group input-group ">
                    <span class="input-group-addon">#</span>
                    <select class="form-control" id="numero_vol"  name="numero_vol">
                            <option value="0"></option>
                            @foreach ($volNums as $data)
                            <option vlaue="{{$data->numero}}"> {{$data->numero}}</option>
                            @endforeach
                    </select>
                  </div>
                  <label>Départ du vol</label>
                  <div class="form-group input-group">
                       <span class="input-group-addon"><i class="fa fa-level-up "></i></span>
                       <select class="form-control" id="depart_vol"  name="depart_vol">
                                 <option value="0"></option>
                              @foreach ($destinations as $data)
                              <option value="{{$data->depart}}"> {{$data->depart}}</option>
                              @endforeach
                       </select>
                  </div>
                  <label>Déstination du vol</label>
                  <div class="form-group input-group">
                       <span class="input-group-addon"><i class="fa fa-level-down "></i></span>
                       <select class="form-control" id="destination_vol"  name="destination_vol">
                              <option value="0"></option>
                              @foreach ($destinations as $data)
                              <option value="{{$data->depart}}"> {{$data->depart}}</option>
                              @endforeach
                       </select>
                  </div>
                  <div class="form-group">
                      <label>Le jour</label>
                      <div class="radio">
                          <label>
                            <input type="radio" name="jour_vol" id="jour3" value="3">Mardi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="jour_vol" id="jour4" value="4">Mercredi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="jour_vol" id="jour5" value="5">Jeudi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="jour_vol" id="tous" value="0" checked>Tous les jours
                          </label>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right" > Rechercher
                      <i class=" fa fa-search "></i>
                  </button>
               </form>
            </div>
            <div class="col-md-6 col-sm-6">
               <!-- REsult of searching goes here -->
               <div class=" alert alert-danger " hidden id="missing_field">
                       <button class="close alert-close" aria-label="close">&times;</button>
                       <strong>Erreur !</strong> Veuillez introduire au moins un champ.
               </div>
               <div class=" alert alert-danger " hidden id="not_exists">
                       <button class="close alert-close2" aria-label="close">&times;</button>
                       <strong>Erreur !</strong> Ce vol n'existe pas.
               </div>
               <div class="table-responsive" id="result1" hidden>
                              <table class="table table-hover table-striped" id="vols_table">
                                  <thead>
                                      <tr>
                                          <th class="text-center">Numéro du vol </th>
                                          <th class="text-center">Départ</th>
                                          <th class="text-center">Arrivé</th>
                                          <th class="text-center">Le jour</th>
                                          <th></th>
                                      </tr>

                                  </thead>
                                  <tbody>
                                    <tr></tr>
                                  </tbody>
                              </table>
                          </div>
            </div>
          </div>

        </div>
</div>

<div id="result2" class="panel panel-default" hidden>
      <div class="panel-heading"> Mettre à jour les informations du vol </div>
          <div class="panel-body">
            <div class="row">
             <div class="col-md-6 col-md-offset-3">
               <div class="form-group input-group ">
                    <span class="input-group-addon">#</span>
                    <input type="number" name="numero_vol3" id="numero_vol3" class="form-control" placeholder="Numéro du vol" required disabled>
               </div>
               <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-up "></i></span>
                    <input type="text" name="depart_vol3" id="depart_vol3" class="form-control" placeholder="Départ du vol" required disabled>
               </div>
               <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-down "></i></span>
                    <input type="text" name="destination_vol3" id="destination_vol3" class="form-control" placeholder="Déstination du vol" required disabled>
               </div>
               <div class="form-group">
                    <label>Le jour</label>
                          <select class="form-control" name="jour_vol3" id="jour_vol3" required disabled>
                                  <option value="3">Mardi</option>
                                  <option value="4">Mercredi</option>
                                  <option value="5">Jeudi</option>
                          </select>
               </div>
               <form role="form" method="post" action="{{route('modif.update')}}" id="update_form">
                 {{csrf_field()}}
                 <input type="hidden" name="numero_vol4" id="numero_vol4" value="">
                 <input type="hidden" name="depart_vol4" id="depart_vol4" value="">
                 <input type="hidden" name="destination_vol4" id="destination_vol4" value="">
                 <input type="hidden" name="jour_vol4" id="jour_vol4" value="">

               <div class="form-group">
                    <label>Type du vol</label>
                          <select class="form-control" name="type_vol" id="type_vol" required>
                                  <option value="DP">DP</option>
                                  <option value="DPRG">DPRG</option>
                          </select>
               </div>
               <div class="row">
                  <div class="col-md-6">
                    <div class="input-group bootstrap-timepicker timepicker">
                         <label for="heure_depart_vol">Heure départ</label>
                         <div class="form-group input-group">
                           <input name="heure_depart_vol" id="heure_depart_vol" type="text" class="form-control input-small" required>
                           <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                         </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group bootstrap-timepicker timepicker">
                         <label for="heure_arrive_vol">Heure d'arrivé</label>
                         <div class="form-group input-group">
                           <input name="heure_arrive_vol" id="heure_arrive_vol" type="text" class="form-control input-small" required>
                           <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                         </div>
                    </div>
                  </div>

               </div>

              <div class="row">
               <div class="col-md-6">
                <div class="form-group input-group">
                    <label>Nombre du places de type 'C'</label>
                    <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                    <input name="vol_c_number" id="vol_c_number" class="form-control" type="number" value="42" required>
                  </div>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group input-group">
                    <label>Nombre du places de type 'Y'</label>
                    <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                    <input name="vol_y_number" id="vol_y_number" class="form-control" type="number" value="122" required>
                  </div>
                </div>
               </div>
             </div>
             <button type="submit" class="btn btn-primary pull-right"> Modifier
                 <i class=" fa fa-edit "></i>
             </button>

             </div>

           </form>
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

// Ajax pour retourner le tableau du resultats de recherche
<script>
        $(document).on("submit", "#form_search", function (event) {
            //arreter l'envoi du formulaire
            event.preventDefault();

        var numero = $('#numero_vol option:selected').val() ;
        var jour =$('#form_search input[type=radio]:checked' ).val();
        var depart = $('#depart_vol option:selected').val() ;
        var destination = $('#destination_vol option:selected').val() ;
        var dataSend = numero + ','+jour+','+depart+','+destination;


            if(dataSend == '0,0,0,0'){
                $('#result1').hide();
                $('#missing_field').show();
            }
          /**
            * Envoie de la requette ajax
           */else{
           $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
             success: function(data){
                    if(data.found){
                      $(".tab_row").remove();
                      for(vol in data.data){

                          $('#vols_table tr:last').after('<tr class="tab_row" ><td class="text-center">'+data.data[vol].vol_nvol+'</td>'+
                                                             '<td class="text-center">'+data.data[vol].vol_depart+'</td>'+
                                                             '<td class="text-center">'+data.data[vol].vol_destin+'</td>'+
                                                             '<td class="text-center">'+data.data[vol].vol_jour+'</td>'+
                                                             '<td class="text-center">'+
                                                             "<form action=\"{{route('modif.vol')}}\" method=\"POST\" id=\"modif_vol\" >"+
                                                                            "<input type=\"hidden\" name=\"_token\" value=\"{{csrf_token()}}\" >"+
                                                                            "<input type=\"hidden\" name=\"numero_vol2\" id=\"numero_vol2\" value=\""+data.data[vol].vol_nvol +"\" >"+
                                                                            "<input type=\"hidden\" name=\"depart_vol2\" id=\"depart_vol2\" value=\""+data.data[vol].vol_depart +"\" >"+
                                                                            "<input type=\"hidden\" name=\"destination_vol2\" id=\"destination_vol2\" value=\""+data.data[vol].vol_destin +"\" >"+
                                                                            "<input type=\"hidden\" name=\"jour_vol2\" id=\"jour_vol2\" value=\""+data.data[vol].vol_jour +"\" >"+
                                                                            "<button type=\"submit\" class=\"btn btn-info center-block\" >Modifier </button> </form> "+

                                                             '</td></tr>');


                      }

                        $('#missing_field').hide();
                        $('#not_exists').hide();
                        $('#result1').show();
                    }
                    else {
                      $('#result1').hide();
                      $('#not_exists').show();
                    }
             },
         })
        }
        });
</script>

// Ajax pour retourner le formulaire du MAJ d'un vol
<script>
        $(document).on("submit", "#modif_vol", function (event) {
            //arreter l'envoi du formulaire
            event.preventDefault();

            // Envoie de la requette ajax

           $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(data){
              $('#numero_vol4').val(data[0].vol_nvol);
              $('#depart_vol4').val(data[0].vol_depart);
              $('#destination_vol4').val(data[0].vol_destin);
              $('#jour_vol4').val(data[0].vol_jour);
              $('#numero_vol3').val(data[0].vol_nvol);
              $('#depart_vol3').val(data[0].vol_depart);
              $('#destination_vol3').val(data[0].vol_destin);
              $('#jour_vol3').val(data[0].vol_jour);
              $('#type_vol').val(data[0].vol_type);
              $('#heure_depart_vol').val(data[0].vol_heurdpr);
              $('#heure_arrive_vol').val(data[0].vol_heutarv);
              $('#vol_c_number').val(data[0].vol_np_c_first);
              $('#vol_y_number').val(data[0].vol_np_y_eco);

              $('#result2').show();

             },
         })
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<!-- Time picker script  -->
<script type="text/javascript">
    $('#heure_depart_vol').timepicker();
    $('#heure_arrive_vol').timepicker();
</script>
// To hide the alert
<script>
$(function() {
   $(document).on('click', '.alert-close', function() {
       $(this).parent().hide();
   })
});
$(function() {
   $(document).on('click', '.alert-close2', function() {
       $(this).parent().hide();
   })
});
</script>


@endsection
