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
            <form role="form" method="POST" action="">
                    <div class="row">
                    <div class="col-md-3">
                        <label> Le numéro du vol:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon">#</span>
                            <select class="form-control" id="numero_vol">
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
                            <select class="form-control" placeholder="Le jour:" id="jour_vol">
                                    <option value="0"></option>
                                    @foreach ($days as $day)
                                       <option value="{{ $day->jour }}">
                                            @switch($day){
                                                case '1':
                                                break;
                                                case '2':
                                                break;
                                                case '3':
                                                break;
                                                case '4':
                                                break;
                                                case '5':
                                                break;
                                                case '6':
                                                break;
                                                case '7':
                                                break; 
                                          }
                                          @switch($type)
                                              @case(1)
                                                  
                                                  @break
                                              @case(2)
                                                  
                                                  @break
                                              @default
                                                  
                                          @endswitch
                                        </option> 
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <label>Le départ:</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-level-up"></i></span>
                            <select class="form-control" id="depart_vol">
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
                            <select class="form-control" id="destination_vol">
                                    <option value="0"></option>
                                    @foreach ($departs as $depart)
                                        <option value="{{ $depart->depart }}">{{ $depart->depart }}</option>
                                    @endforeach
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
                                       <td class="text-center">ALG</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">Mercredi</td>
                                       <td><button class="btn btn-info center-block"
                                           > Extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1123</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                           > Extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1289</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                           > Extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1120</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                           > Extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="text-center">1289</td>
                                       <td class="text-center">HMD</td>
                                       <td class="text-center">BJA</td>
                                       <td class="text-center">Mardi</td>
                                       <td><button class="btn btn-info center-block"
                                           > Extraire la liste des employés
                                           </button>
                                       </td>
                                   </tr>

                     </tbody>
                  </table>
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

        $(document).on("change",'#numero_vol' ,function (event) {
            var optionSelected = $("option:selected",this) ; 
            var valueSelected = this.value; 
            
            $.ajax({
                method: 'POST',
                url: {{ route('get.vols.par.numero') }} ,
                data: ,
                dataType:,
                success: function(data){

                }, 
            })
        });
    </script>
@endsection 
