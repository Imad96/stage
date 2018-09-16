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
      <div class="panel-heading">Veuillez choisir l'employé concerné ! </div>
          <div class="panel-body">
            <div class="row">
              <form role="form">
              <div class="col-md-4">
                <label> Matricule de l'employé:</label>
                <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                    <input type="number" class="form-control" placeholder="Matricule" required>
                </div>
              </div>
              <div class="col-md-4">
                <label> Nom de l'employé:</label>
                <div class="form-group input-group ">
                     <span class="input-group-addon">#</span>
                     <input type="text" class="form-control" placeholder="Haddad" disabled>
                </div>
              </div>
              <div class="col-md-4">
                <label> Prénom de l'employé:</label>
                <div class="form-group input-group ">
                     <span class="input-group-addon">#</span>
                     <input type="text" class="form-control" placeholder="Imad" disabled>
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
<div id="result" class="panel panel-default">
      <div class="panel-heading"> Liste des vols de <span style="color:#1cc09f;">Haddad Imad</span> </div>
          <div class="panel-body">
              <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                          <th class="text-center">Numéro du vol </th>
                                          <th class="text-center">Départ</th>
                                          <th class="text-center">Arrivé</th>
                                          <th class="text-center">La date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">ALG</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">22-08-2018</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">ALG</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">19-02-2019</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">ALG</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">07-07-2019</td>
                                        </tr>
                                        <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">ALG</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">27-09-2019</td>
                                        </tr>
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
<script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
</script>

<!-- Custom Js -->
<script src={{url('js/custom-scripts.js')}}></script>


@endsection
