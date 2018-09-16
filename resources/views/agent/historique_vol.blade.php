@extends('main_template')

@section('titre') Historique @endsection
@section('sous-titre') -Consulter l'historique d'un vol- @endsection
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
                  <table class="table table-hover table-striped">
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
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
                                  </button>
                              </td>
                          </tr>
                          <tr>
                              <td class="text-center">1289</td>
                              <td class="text-center">HMD</td>
                              <td class="text-center">BJA</td>
                              <td class="text-center">22-09-2018</td>
                              <td><button class="btn btn-info center-block"
                                           > Consulter
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
<div class="panel panel-default">
      <div class="panel-heading">Liste des employés sur le vol numéro <span style="color:#1cc09f;">1289</span>
                                 le <span style="color:#1cc09f;">22-09-2018</span></div>
          <div class="panel-body">
            <div id="result2" class="row">
              <div class="col-md-8 col-md-offset-2">
              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                        <tr>
                          <th class="text-center"># Matricule</th>
                          <th class="text-center">Nom</th>
                          <th class="text-center">Prénom</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>
                        <tr>
                          <td class="text-center">54386S</td>
                          <td class="text-center">Haddad</td>
                          <td class="text-center">Imad</td>
                        </tr>

                      </tbody>
                  </table>
              </div>
            </div>
            </div>
          </div>
</div>


@endsection
