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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">


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
                                             data-toggle="modal" data-target="#myModal"> modifier
                                              </button>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">BJA</td>
                                          <td class="text-center">Mardi</td>
                                          <td><button class="btn btn-info center-block"
                                             data-toggle="modal" data-target="#myModal"> modifier
                                              </button>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">BJA</td>
                                          <td class="text-center">Mardi</td>
                                          <td><button class="btn btn-info center-block"
                                             data-toggle="modal" data-target="#myModal"> modifier
                                              </button>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">BJA</td>
                                          <td class="text-center">Mardi</td>
                                          <td><button class="btn btn-info center-block"
                                             data-toggle="modal" data-target="#myModal"> modifier
                                              </button>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="text-center">1289</td>
                                          <td class="text-center">HMD</td>
                                          <td class="text-center">BJA</td>
                                          <td class="text-center">Mardi</td>
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
<!-- Custom Js -->
<script src={{url('js/custom-scripts.js')}}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();
</script>



@endsection
