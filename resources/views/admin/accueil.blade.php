@extends('admin_template')

@section('title_page')
    Page Admin
@endsection

@section('user_name')
    mesut zidan
@endsection

@section('content')

@section('admin_accueil_classe')
    active-menu
@endsection 
    <div class="row">
        <div class="col-md-3">
            <a href="{{route('add.account')}}" class="btn btn-success" > <i class="fa fa-plus"></i> Ajouter un compte </a>
        </div>
    </div>
    <br>
    <!-- tableau des utilisateurs -->
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Compte ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Type de compte</th>
                    <th></th>
                </tr>
            </thead>
                <tbody>
                    @foreach($accounts as $account)
                        <tr class="odd gradeX">
                            <td> {{$account->id}} </td>
                            <td> {{$account->name}} </td>
                            <td> {{$account->email}} </td>
                            <td class="center"> 
                                @if($account->type == 1)
                                    <span>Agent</span>
                                @elseif($account->type == 2 )
                                    <span>Chef de service</span>
                                @else
                                    <span>Administrateur</span>
                                @endif
                             </td>
                            <td class="center"> 
                                <a href="" class="data btn btn-default" data-id="{{$account->id.'|'.$account->name.'|'.$account->email.'|'.$account->type}}"  data-toggle="modal" > <i class="fa fa-edit "></i>Modifier</a> 
                                &nbsp; &nbsp; &nbsp; 
                                <a href="" class="btn btn-danger"> <i class="fa fa-pencil" ></i>Supprimer</a> 
                                &nbsp; &nbsp; &nbsp; 
                                <a href="" class="data2 btn btn-info" data-id="{{$account->id.'|'.$account->name}}"  data-toggle="modal" > <i class="fa fa-refresh"></i> Modifier le mot de passe </a>
                            </td>
                        </tr>  
                    @endforeach
                </tbody>
        </table>
    </div>
 <!-- Fin tableau -->

 <!-- Model modification des informations  -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modification du compte : </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <form action="">
                    <div class="modal-body">
                        <div class="row">  
                            <div class="form-group col-md-4 name">
                                <label for="name">Nom : </label>
                                <input type="text" id="name" name="name" class="form-control col-md-4" value="   ">
                            </div>
                            <div class="form-group col-md-6 email">
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" value="   ">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Type de compte : </label>
                                <select class="form-control" id="select">
                                    <option value="1">Agent</option>
                                    <option value="2">Chef de service</option>
                                    <option value="3">Administrateur</option>
                                </select>
                            </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>                       
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
          </div>
        </div>
      </div>
 <!-- Fin Model modification des informations  -->

 <!-- Model modification du mot de passe  -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title2" id="exampleModalLabel">Modification du mot de passe pour <span id="nameModif" style="font-weight:bold;"></span>  </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                    <form action="">
                        <div class="modal-body">
                            <div class="row">  
                                <div class="form-group col-md-6 col-md-offset-3">
                                    <label for="name">Nouveau mot de passe : </label>
                                    <input type="password" id="password" name="password" class="form-control col-md-4" placeholder="**********">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-3">
                                    <label for="confPassword">Confirmer le nouveau mot de passe :</label>
                                    <input type="password" name="confPassword" id="confPassword" class="form-control" placeholder="**********">
                                </div>
                            </div>   
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sauvegarder</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                        <input type="hidden" id="id" name="id" class="form-control col-md-4">
                    </form>
              </div>
            </div>
        </div>
 <!-- Fin Model modification du mot de passe  -->

@endsection 



@section('scripts')
    <script>
        $(document).on("click", ".data", function () {
            var myBookId = $(this).data('id');
            myBookId = myBookId.split("|") ; 
           $(".name #name").val( myBookId[1] );
           $(".email #email").val( myBookId[2] );
           $("#select").val(myBookId[3]);
            // As pointed out in comments, 
            // it is superfluous to have to manually call the modal.
             $('#exampleModal').modal('show');
        });

        $(document).on("click", ".data2", function () {
            var myBookId = $(this).data('id');
            myBookId = myBookId.split("|") ;
            myBookId[1] = myBookId[1] ; 
           $(".modal-title2 #nameModif").text(myBookId[1]);
           $("#id").val(myBookId[0]);

          // $(".value #value").val(myBookId));
            // As pointed out in comments, 
            // it is superfluous to have to manually call the modal.
             $('#exampleModal2').modal('show');
        });

    </script>

@endsection 