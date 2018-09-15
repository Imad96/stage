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


@section('contenu')

<div class="panel panel-default">
      <div class="panel-heading">Veuillez introduire au moins un critère pour rechercher le vol  !</div>
          <div class="panel-body">
            <form role="form">
            <div class="row">
              <div class="col-md-3">
                <label> Le numéro du vol:</label>
                <div class="form-group input-group">
                    <span class="input-group-addon">#</span>
                     <select class="form-control">
                            <option></option>
                            <option>1123</option>
                            <option>1120</option>
                            <option>1174</option>
                            <option>2323</option>
                            <option>2020</option>
                            <option>7411</option>
                     </select>
                </div>
              </div>
              <div class="col-md-3 ">
                <label> Le jour</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     <select class="form-control" placeholder="Le jour:">
                            <option></option>
                            <option>Mardi</option>
                            <option>Mercredi</option>
                            <option>Jeudi</option>
                     </select>
                </div>
              </div>
              <div class="col-md-3 ">
                <label>Le départ:</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-up"></i></span>
                     <select class="form-control">
                            <option></option>
                            <option>HMD</option>
                            <option>ALG</option>
                            <option>STF</option>
                            <option>ORG</option>
                            <option>ANB</option>
                     </select>
                </div>
              </div>
              <div class="col-md-3 ">
                <label>La déstination:</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-level-down"></i></span>
                     <select class="form-control">
                            <option></option>
                            <option>HMD</option>
                            <option>ALG</option>
                            <option>STF</option>
                            <option>ORG</option>
                            <option>ANB</option>
                     </select>
                </div>

              </div>
              <div class="row">
                <div class="col-md-3  col-md-offset-8">
                  <button type="submit" class="btn btn-primary pull-right"> Rechercher
                      <i class=" fa fa-search "></i>
                  </button>
                </div>
              </div>

            </form>
            </div>
          </div>
</div>
<div id="result" class="panel panel-default">
      <div class="panel-heading"> Liste des vols </div>
          <div class="panel-body">

            <!-- REsult of searching goes here -->
            <div class="table-responsive">
                  <table class="table table-hover">
                     <thead>
                                   <tr>
                                       <th class="text-center">Numéro du vol </th>
                                       <th class="text-center">Départ</th>
                                       <th class="text-center">arrivé</th>
                                       <th class="text-center">Le jour</th>
                                       <th></th>
                                   </tr>
                     </thead>
                     <tbody>
                                   <tr>
                                       <td class="text-center">1289</td>
                                       <td class="text-center">ALG</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">Mercredi</td>
                                       <td><button class="btn btn-info center-block"
                                          data-toggle="modal" data-target="#myModal"> extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1123</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                          data-toggle="modal" data-target="#myModal"> extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1289</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                          data-toggle="modal" data-target="#myModal"> extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1120</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                          data-toggle="modal" data-target="#myModal"> extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1289</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                          data-toggle="modal" data-target="#myModal"> extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>

                     </tbody>
                  </table>
            </div>
          </div>
</div>
@endsection
