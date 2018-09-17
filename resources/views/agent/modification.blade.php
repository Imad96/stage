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
                              <table class="table table-hover table-striped">
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
                                      <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">BJA</td>
                                          <td class="text-center">Mardi</td>
                                          <td><button class="btn btn-info center-block"
                                              > Modifier
                                              </button>
                                          </td>
                                      </tr>
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
            <form role="form">
             <div class="col-md-6 col-md-offset-3">
               <div class="form-group input-group ">
                    <span class="input-group-addon">#</span>
                    <input type="number" class="form-control" placeholder="Numéro du vol" required>
               </div>
               <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-up "></i></span>
                    <input type="text" class="form-control" placeholder="Départ du vol" required>
               </div>
               <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-down "></i></span>
                    <input type="text" class="form-control" placeholder="Déstination du vol" required>
               </div>
               <div class="form-group">
                    <label>Le jour</label>
                          <select class="form-control">
                                  <option>Mardi</option>
                                  <option>Mercredi</option>
                                  <option>Jeudi</option>
                          </select>
               </div>
               <div class="form-group">
                    <label>Type du vol</label>
                          <select class="form-control">
                                  <option>DP</option>
                                  <option>DPRG</option>
                          </select>
               </div>
               <div class="row">
                  <div class="col-md-6">
                    <div class="input-group bootstrap-timepicker timepicker">
                         <label for="timepicker1">Heure départ</label>
                         <div class="form-group input-group">
                           <input id="timepicker1" type="text" class="form-control input-small" required>
                           <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                         </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group bootstrap-timepicker timepicker">
                         <label for="timepicker1">Heure d'arrivé</label>
                         <div class="form-group input-group">
                           <input id="timepicker2" type="text" class="form-control input-small" required>
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
                    <input id="number" class="form-control" type="number" value="42" required>
                  </div>
                </div>
               </div>
               <div class="col-md-6">
                <div class="form-group input-group">
                    <label>Nombre du places de type 'Y'</label>
                    <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                    <input id="number" class="form-control" type="number" value="122" required>
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
                      console.log(data.data);
                        $('#result1').show();

                    }
                    else {
                      $('#not_exists').show();
                    }
             },
         })
        }
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<!-- Time picker script  -->
<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
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
