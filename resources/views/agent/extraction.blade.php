@extends('main_template')

@section('titre') Extraction @endsection
@section('sous-titre') -Extraire la liste des employés concernés par un vol- @endsection
@section('userName') Haddad Imad @endsection
@section('extraction_class')active-menu @endsection
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
      <div class="panel-heading">Veuillez introduire au moins un critère pour rechercher le vol  !</div>
          <div class="panel-body">
            <form method="POST" action="{{ route('search.vol') }}" id="form_search">
                    {{ csrf_field() }}
                    <div class="row">
                    <div class="col-md-3">
                        <label> Le numéro du vol:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon">#</span>
                            <select class="form-control" id="numero_vol"  name="numero_vol">
                                    <option value="0"></option>
                                    @foreach ($vols as $vol)
                                        <option value="{{ $vol->numero }}">{{ $vol->numero }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <label> Le jour</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <select class="form-control" id="jour_vol"  name="jour_vol">
                                    <option value="0"></option>
                                    <option value="1">Dimanche</option>
                                    <option value="2">Lundi</option>
                                    <option value="3">Mardi</option>
                                    <option value="4">Mercredi</option>
                                    <option value="5">Jeudi</option>
                                    <option value="6">Vendredi</option>
                                    <option value="7">Samedi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <label>Le départ:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-level-up"></i></span>
                            <select class="form-control" id="depart_vol"  name="depart_vol">
                                    <option value="0"></option>
                                    @foreach ($departs as $depart)
                                        <option value="{{ $depart->depart }}">{{ $depart->depart }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <label>La déstination:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-level-down"></i></span>
                            <select class="form-control" id="destination_vol"  name="destination_vol">
                                    <option value="0"></option>
                                    @foreach ($departs as $depart)
                                        <option value="{{ $depart->depart }}">{{ $depart->depart }}</option>
                                    @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3  col-md-offset-8">
                        <button type="submit" class="btn btn-primary pull-right" > Rechercher
                            <i class=" fa fa-search "></i>
                        </button>
                        </div>
                    </div>

            </form>
            <div class="row">
                    <div class="col-md-4 col-md-offset-3">
                            <div class=" alert alert-danger alert-dismissible" hidden id="alert_dngr">
                                    <strong>Erreur ! Veuillez introduire au moins un champ. </strong>
                            </div>
                    </div>
            </div>
            </div>
          </div>
</div>
<div id="result" class="panel panel-default" hidden>
      <div class="panel-heading"> Liste des vols </div>
          <div class="panel-body">

            <!-- REsult of searching goes here -->
            <div class="table-responsive">
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

                     </tbody>
                  </table>
            </div>
          </div>
</div>
                    <div class="row">
                            <div class="col-md-4 col-md-offset-3">
                                    <div class=" alert alert-danger alert-dismissible" id="no_vols" hidden>
                                            <strong>Aucun vol trouvé.</strong>
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
            var jour = $('#jour_vol option:selected').val() ; 
            var depart = $('#depart_vol option:selected').val() ; 
            var destination = $('#destination_vol option:selected').val() ; 
            var dataSend = numero + ','+jour+','+depart+','+destination;  
                
                if(dataSend == '0,0,0,0'){
                    $("#result").hide(); 
                    $('#no_vols').hide();  
                    $('#alert_dngr').show();
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
                        if(data != null){ //les données envoyées sont valides 
                            if(data.found == true){ //il a trouvé au moins un vol ayant les informations envoyées    
                                $(".my_clmn").remove();
                                var vol;
                                //$('#vols_table').tabs().remove() ; 
                                // $('#vols_table').tabs( "refresh" ) ;
                                for(vol in data.data){ 
                                    btn_extraire = "<form action=\"{{route('vol.extract')}}\" method=\"POST\" id=\"extract_form\" > <input type=\"hidden\" name=\"_token\" value=\"{{csrf_token()}}\" > <input type=\"hidden\" name=\"numero_vol\" id=\"numero_vol\" value=\""+data.data[vol].vol_nvol+"\" > <input type=\"hidden\" name=\"jour_vol\" id=\"jour_vol\" value=\""+data.data[vol].vol_jour+"\" > <input type=\"hidden\" name=\"depart_vol\" id=\"depart_vol\" value=\""+data.data[vol].vol_depart+"\" > <input type=\"hidden\" name=\"destination_vol\" id=\"destination_vol\" value=\""+data.data[vol].vol_destin+"\" > <button type=\"submit\" class=\"btn btn-info\" >Extraire </button> </form> "                                                                      
                                    $('#vols_table tr:last').after('<tr class=\"my_clmn\" ><td class="text-center">'+data.data[vol].vol_nvol+'</td><td class="text-center">'
                                        +data.data[vol].vol_depart+'</td><td class="text-center">'+data.data[vol].vol_destin+'</td><td class="text-center">'
                                            +data.data[vol].vol_jour+'</td><td class="text-center">'+btn_extraire+'   </td></tr>');
                                }
                                $('#no_vols').hide();  
                                $('#alert_dngr').hide();
                                $("#result").show(); 
                            }else{
                                $("#result").hide(); 
                                $('#alert_dngr').hide();
                                $('#no_vols').show();
                            }
                            
                        }else{
                            $("#result").hide(); 
                            $('#no_vols').hide();                                
                            $('#alert_dngr').show();
                        } 
                 },
             })
            }
            });

            $(document).on("submit","#extract_form",function(e){
                e.preventDefault() ;
                console.log($(this).serialize()) ; 
                $.ajax({
                    method: $(this).attr("method"), 
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (data){
                        //alert("Voulez vos extraire "+data+ "ici") ; 
                    },
                }) 
            });
    </script>
@endsection
