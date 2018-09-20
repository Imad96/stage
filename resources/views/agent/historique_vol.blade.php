@extends('main_template')

@section('titre') Historique @endsection
@section('sous-titre') -Consulter l'historique d'un vol dans une période- @endsection
@section('userName') Haddad Imad @endsection
@section('his_vol_class')active-menu @endsection
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
      <div class="panel-heading">Veuillez choisir le vol!</div>
          <div class="panel-body">
            <div class="row">
            <div class="col-md-6 col-sm-6">
              <form role="form" id="form_search" method="POST" action=" {{route('vol.date')}} ">
                {{ csrf_field() }}
                <div class="form-group input-group ">
                     <span class="input-group-addon">#</span>
              
                     <select name="numero_vol" id="numero_vol" class="form-control">
                       <option value="0">Numéro du vol...</option>
                       @foreach ($vols as $vol)
                          <option value="{{ $vol->numero }}">{{ $vol->numero }}</option>
                       @endforeach
                     </select>
                </div>
                <div class="form-group input-group">
                     <span class="input-group-addon"><i class="fa fa-level-up "></i></span>
                     <select name="depart_vol" id="depart_vol" class="form-control">
                       <option value="0">Départ du vol...</option>
                       @foreach ($destinations as $depart)
                           <option value="{{ $depart->depart }}">{{ $depart->depart }}</option>
                       @endforeach
                     </select>
                </div>
                <div class="form-group input-group">
                     <span class="input-group-addon"><i class="fa fa-level-down "></i></span>
                     <select name="destination_vol" id="destination_vol" class="form-control">
                       <option value="0">Destination du vol...</option>
                       @foreach ($destinations as $destination)
                        <option value="{{$destination->depart}}">{{$destination->depart}}</option>                           
                       @endforeach
                     </select>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-5 col-sm-5">
                      <label>Le jour du vol</label>
                        <div class="radio">
                            <label>
                              <input type="radio" name="jour_vol" id="jour2" value="2">Lundi
                            </label>
                        </div>
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
                        <div class="radio"  >
                            <label hidden>
                              <input type="radio" name="jour_vol" id="tous" value="0" checked>Tous les jours
                            </label>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                      <div class="form-group">
                        <label for="date_debut">Date début de la période</label>
                        <input type="date" name="date_debut" id="date_debut" class="form-control" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="date_fin">Date fin de la période</label>
                          <input type="date" name="date_fin" id="date_fin" class="form-control" placeholder="">
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right"> Rechercher
                    <i class=" fa fa-search "></i>
                </button>
             </form>
          </div>
          <div class="col-md-6 col-sm-6" >
              <div class=" alert alert-danger " hidden id="missing_field">
                  <button class="close alert-close" aria-label="close">&times;</button>
                  <strong>Erreur !</strong> Veuillez introduire Tous les champs
              </div>
              <div class=" alert alert-danger " hidden id="not_exists">
                      <button class="close alert-close2" aria-label="close">&times;</button>
                      <strong>Oups !</strong> Ce vol n'existe pas Ou aucune information n'est trouvée sur ce vol.
              </div>
              <div class=" alert alert-danger " hidden id="date">
                  <button class="close alert-close2" aria-label="close">&times;</button>
                  <strong>Erreur !</strong> Date début de période doit être inférieure à la date de fin de période
              </div> 
                

             <!-- REsult of searching goes here -->
             <div class="table-responsive" id="result1" hidden>
                  <table class="table table-hover table-striped" id="date_table">
                      <thead>
                            <tr>
                              <th class="text-center">Numéro du vol </th>
                              <th class="text-center">Départ</th>
                              <th class="text-center">Arrivé</th>
                              <th class="text-center">La date</th>
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
<div class="panel panel-default" id="result2" hidden>
      <div class="panel-heading">Liste des employés sur le vol numéro <span style="color:#1cc09f;" id="vol_number"></span>
                                 le <span style="color:#1cc09f;" id="vol_day"></span></div>
          <div class="panel-body">
            <div id="result23" class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class=" alert alert-info " hidden id="no_personne">
                      <button class="close alert-close2" aria-label="close">&times;</button>
                      <strong>Oups !</strong> Aucun employé trouvé dans cette date pour ce vol.
                </div> 
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="personne_table">
                      <thead>
                        <tr>
                          <th class="text-center"># Matricule</th>
                          <th class="text-center">Nom</th>
                          <th class="text-center">Prénom</th>
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


@endsection

@section('include_js')
  <script src={{url('js/jquery-1.10.2.js')}}></script>
  <!-- Bootstrap Js -->
  <script src={{url('js/bootstrap.min.js')}}></script>

  <!-- Metis Menu Js -->
  <script src={{url('js/jquery.metisMenu.js')}}></script>


  <script>
    $(document).on("submit", "#form_search", function (event) {
      //arreter l'envoi du formulaire
      event.preventDefault();

  var numero = $('#numero_vol option:selected').val() ; 
  var jour = $('#form_search input[type=radio]:checked').val() ; 
  var depart = $('#depart_vol option:selected').val() ; 
  var destination = $('#destination_vol option:selected').val() ; 
  var dateDebut = $('#date_debut').val() ; 
  var dateFin = $('#date_fin').val() ; 
  var dataSend = numero + ','+jour+','+depart+','+destination+','+dateDebut+','+dateFin;  

     var timeBegin =  (new Date(dateDebut)).getTime() ; 
     var timeEnd = (new Date(dateFin)).getTime() ; 

      dataSend = ','+dataSend+','
      if(dataSend.includes(',0,') || dataSend.includes(',,') ){
        $("#result1").hide(); 
        $('#not_exists').hide(); 
        $('#date').hide(); 
        $('#result2').hide() ; 
        $('#no_personne').hide() ; 
        $('#missing_field').show() ; 
      }
    
     else{
      if(timeBegin > timeEnd){ //si le champ date_debut > date_fin donc erreur
        $("#result1").hide(); 
        $('#not_exists').hide(); 
        $('#missing_field').hide() ; 
        $('#result2').hide() ; 
        $('#no_personne').hide() ; 
        $('#date').show() ; 
      }else{
        /**
        * Envoie de la requette ajax
        */
        $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(data){
                    if(data.data != null){ //les données envoyées sont valides 
                        if(data.found == true){ //il a trouvé au moins un vol ayant les informations envoyées    
                           $(".my_clmn").remove();
                            var vol;
                            for(vol in data.data){ 
                                btn_extraire = "<form action=\"{{route('liste.date')}}\" method=\"POST\" class=\"extract_form\" id=\"liste_form\" > <input type=\"hidden\" name=\"_token\" value=\"{{csrf_token()}}\" > <input type=\"hidden\" name=\"numero_vol\" id=\"numero_vol\" value=\""+data.infoVol.numero_vol+"\" > <input type=\"hidden\" name=\"jour_vol\" id=\"jour_vol\" value=\""+data.infoVol.jour_vol+"\" > <input type=\"hidden\" name=\"depart_vol\" id=\"depart_vol\" value=\""+data.infoVol.depart_vol+"\" > <input type=\"hidden\" name=\"destination_vol\" id=\"destination_vol\" value=\""+data.infoVol.destination_vol+"\" > <input type=\"hidden\" name=\"date_vol\" id=\"date_vol\" value=\""+data.data[vol]+"\" >  <button type=\"submit\" class=\"btn btn-info\" id=\"download\" >Voir historique </button> </form> "                                                                      
                                $('#date_table tr:last').after('<tr class=\"my_clmn\" ><td class="text-center">'+data.infoVol.numero_vol+'</td><td class="text-center">'
                                    +data.infoVol.depart_vol+'</td><td class="text-center">'+data.infoVol.destination_vol+'</td><td class="text-center">'
                                        +data.data[vol]+'</td><td class="text-center">'+btn_extraire+'   </td></tr>');
                            }
                            $('#missing_field').hide();  
                            $('#not_exists').hide();
                            $('#date').hide(); 
                            $('#result2').hide() ;
                            $('#no_personne').hide() ;  
                            $("#result1").show(); 
                        }else{
                            $("#result1").hide(); 
                            $('#missing_field').hide();
                            $('#date').hide();
                            $('#result2').hide() ; 
                            $('#no_personne').hide() ; 
                            $('#not_exists').show();
                        }
                        
                    }else{
                        $("#result1").hide(); 
                        $('#not_exists').hide();  
                        $('#date').hide(); 
                        $('#result2').hide() ; 
                        $('#no_personne').hide() ; 
                        $('#missing_field').show();
                    } 
            },
          })
        }
      }
  });

  $(document).on("submit", "#liste_form", function (event) {
    //arreter l'envoi du formulaire
    event.preventDefault();
    $.ajax({
      method: $(this).attr('method'),
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: 'json',
      success: function (data){
        $('#vol_number').html(data.vol_info.numero_vol) ; 
        $('#vol_day').html(data.vol_info.date_vol);
        $(".my_clmn2").remove();
        if(data.nombre > 0){
          $('#no_personne').hide() ; 
          for(personne in data.data){
            $('#personne_table tr:last').after(" <tr class=\"my_clmn2\"> <td>"+data.data[personne].matricule+"</td><td>"+data.data[personne].nom+"</td><td>"+data.data[personne].prenom+"</td> </tr> ") ; 
          }
        }else{
            $('#no_personne').show() ; 
        }
        $('#result2').show() ; 
      },
    })
  });



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
