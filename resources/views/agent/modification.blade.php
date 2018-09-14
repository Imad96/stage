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


@endsection

@section('contenu')

<div class="panel panel-default">
      <div class="panel-heading"> Veuillez rechercher le vol à modifier ! </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 col-sm-6">
                <form role="form">

                  <div class="form-group input-group ">
                       <span class="input-group-addon">#</span>
                       <input type="text" class="form-control" placeholder="Numéro du vol" required>
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
                      <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="jour2" value="jour2">Mardi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="jour3" value="jour3">Mercredi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="jour4" value="jour4">Jeudi
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="tous" value="tout" checked>Tous les jours
                          </label>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary pull-right"> Rechercher
                      <i class=" fa fa-search "></i>
                  </button>


               </form>
            </div>
            <div class="col-md-6 col-sm-6" id="result1">
               <!-- REsult of searching goes here -->
               <div class="table-responsive">
                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                          <th>Numéro du vol </th>
                                          <th>Départ</th>
                                          <th>arrivé</th>
                                          <th>Le jour</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1289</td>
                                          <td>Mark</td>
                                          <td>Otto</td>
                                          <td>Mardi</td>
                                          <td><button class="btn btn-info center-block"
                                             data-toggle="modal" data-target="#myModal"> modifier
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

<div id="result2" class="panel panel-default">
      <div class="panel-heading"> Mettre à jour les informations du vol </div>
          <div class="panel-body">
            <div class="row">
             <div class="col-md-6 col-md-offset-3">
               <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-down "></i></span>
                    <input type="text" class="form-control" placeholder="Déstination du vol" required>
               </div>
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
<!-- Custom Js -->
<script src={{url('js/custom-scripts.js')}}></script>


@endsection
