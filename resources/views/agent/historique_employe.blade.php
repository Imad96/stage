@extends('main_template')

@section('titre') Historique @endsection
@section('sous-titre') -Consulter l'historique des vols pour un employé- @endsection
@section('userName') Haddad Imad @endsection
@section('his_emp_class')active-menu @endsection
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
      <div class="panel-heading">Veuillez choisir l'employé concerné !</div>
          <div class="panel-body">
            <div class="row">
              <form role="form" method="post" action="{{route('his.employe.search')}}" id="search_history">
                {{csrf_field()}}
              <div class="col-md-4">
                <label> Matricule de l'employé:</label>
                <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                    <select class="form-control" id="matricule" name="matricule" required>
                            @foreach ($agent as $data)
                            <option value="{{$data->agt_matricule}}"> {{$data->agt_matricule}}</option>
                            @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4">
                <label> Nom de l'employé:</label>
                <div class="form-group input-group ">
                  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                     <input type="text" id="nom" name="nom" class="form-control" placeholder="nom" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <label> Prénom de l'employé:</label>
                <div class="form-group input-group ">
                     <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
                     <input type="text" id="prenom" name="prenom" class="form-control" placeholder="prénom" disabled>
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-4 col-md-offset-7">
                <button type="submit" class="btn btn-primary pull-right"> Sélectionner
                   <i class=" fa fa-edit "></i>
                </button>
              </div>
            </div>
            </form>
          </div>
</div>
<div id="result" class="panel panel-default" hidden>
      <div class="panel-heading"> Liste des vols de <span style="color:#1cc09f;" id="nom_prenom"></span> </div>
          <div class="panel-body">
              <div class="table-responsive">
                                <table class="table table-hover table-striped" id="vols_table">
                                    <thead>
                                        <tr>
                                          <th class="text-center">Numéro du vol </th>
                                          <th class="text-center">Départ</th>
                                          <th class="text-center">Arrivé</th>
                                          <th class="text-center">La date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
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

 <!-- Ajax pour retourner le resultat du recherche d'historique -->
<script>
        $(document).on("submit", "#search_history", function (event) {
            //arreter l'envoi du formulaire
            event.preventDefault();

            // Envoie de la requette ajax

           $.ajax({
            method: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            success: function(data){

               if(data.found){
                 $(".tab_row").remove();
                 for(vol in data.data){
                   var dateVol = (data.data[vol].depart == "HME") ? data.data[vol].dateDebut : data.data[vol].dateFin;

                 $('#vols_table tr:last').after('<tr class="tab_row" ><td class="text-center">'+data.data[vol].nvol+'</td>'+
                                                    '<td class="text-center">'+data.data[vol].depart+'</td>'+
                                                    '<td class="text-center">'+data.data[vol].destin+'</td>'+
                                                    '<td class="text-center">'+dateVol+'</td>'+
                                                    '</td></tr>');
                 }
               }

                var nom =   $("#nom").val();
                var prenom = $("#prenom").val();
                $("#nom_prenom").html(prenom+' '+nom)
                $('#result').show();
                var etop = $('#result').offset().top-100;
              	$(window).scrollTop(etop);
             },
         })
        });
</script>

<!-- Ajax pour retourner le nom et le prenom -->
<script>

             $("#matricule").on("change", function () {
                $('#result').hide();
                $.ajax({
                  dataType: "json",
                  url: "{{route('auto.fill')}}",
                  method: 'GET',
                  data: $(this).serialize(),
                  success: function (data) {
                      $('#nom').val(data[0].agt_nom);
                      $('#prenom').val(data[0].agt_prenom);
                }
                });
                });

</script>

<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
</script>


@endsection
