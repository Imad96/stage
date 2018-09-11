@extends('admin_template')

@section('title_page')
    Page Admin
@endsection

@section('user_name')
    mesut zidan
@endsection

@section('content')


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
                    <tr class="odd gradeX">
                        <td>1</td>
                        <td>Mohamed</td>
                        <td>Mohamed@hmd-sonatrach.com</td>
                        <td class="center">Chef de service</td>
                        <td class="center"> 
                            <a href="" class="btn btn-default" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-edit "></i>Modifier</a> 
                            &nbsp; &nbsp; &nbsp; 
                            <a href="" class="btn btn-danger"> <i class="fa fa-pencil" ></i>Supprimer</a> 
                            &nbsp; &nbsp; &nbsp; 
                            <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2"> <i class="fa fa-refresh"></i> Modifier le mot de passe </a>
                        </td>
                    </tr>                        
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
                            <div class="form-group col-md-4">
                                <label for="name">Nom : </label>
                                <input type="text" id="name" name="name" class="form-control col-md-4" value="   ">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email" class="form-control" value="   ">
                            </div>
                        </div>  
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Type de compte : </label>
                                <select class="form-control">
                                    <option>Agent</option>
                                    <option>Chef de service</option>
                                    <option >Administrateur</option>
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
                  <h5 class="modal-title" id="exampleModalLabel">Modification du mot de passe pour  </h5>
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
                    </form>
              </div>
            </div>
        </div>
 <!-- Fin Model modification du mot de passe  -->

    



@endsection 