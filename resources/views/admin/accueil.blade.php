@extends('admin_template')

@section('title_page')
    Page Admin
@endsection

@section('user_name')
    mesut zidan
@endsection

@section('title')
    Liste des comptes
@endsection 

@section('sub_title')
    - Consulter ou modifier les comptes -
@endsection 

@section('content')

    @section('admin_accueil_classe')
        active-menu
    @endsection 
    <div class="row">
        @if(session('update'))
        <div class="col-md-4 col-md-offset-4 alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('update')}}
        </div>
        <br>
        @endif
        @if($errors->has('email') || $errors->has('name') || $errors->has('new_password') )
        <div class="col-md-4 col-md-offset-4 alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Erreur ! La modification a échouée </strong> Veuillez respecter les exigences suivantes: <br>
            <ul>
                @if($errors->has('email')) 
                    <li>
                        {!! $errors->first('email',' <small class="help-block">:message</small> ')  !!}
                    </li>
                @endif
                @if($errors->has('name')) 
                    <li>
                        {!! $errors->first('name',' <small class="help-block">:message</small> ') !!}
                    </li>
                @endif
                @if($errors->has('new_password'))
                    <li>
                        {!! $errors->first('new_password',' <small class="help-block">:message</small> ') !!}
                    </li>
                @endif
            </ul>
        </div>
                        <br>
        @endif
    </div>
    
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
                    <th></th>
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
                                <a href="" class="data btn btn-default btn-block" data-id="{{$account->id.'|'.$account->name.'|'.$account->email.'|'.$account->type}}"  data-toggle="modal" > <i class="fa fa-edit "></i>Modifier</a> 
                                &nbsp; &nbsp; &nbsp; 
                            </td>
                            <td>
                                <a href="" class="data2 btn btn-info btn-block" data-id="{{$account->id.'|'.$account->name}}"  data-toggle="modal" > <i class="fa fa-refresh"></i> Modifier le mot de passe </a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route'=>['delete.account',$account->id]]) !!}
                                    <input type="submit" value=" Supprimer" class="btn btn-danger btn-block" >
                                {!! Form::close() !!}
                                &nbsp; &nbsp; &nbsp; 
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h5 class="modal-title" id="exampleModalLabel">Modification du compte : </h5>
            </div>
                {!! Form::open(['route'=>'update.account']) !!}
                    <div class="modal-body">
                        <div class="row">  
                            <div class="form-group col-md-4 name">
                                {!! Form::label('name','Nom :') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                            <div class="from-group col-md-6 email">
                                {!! Form::label('email','Email :') !!}
                                {!! Form::email('email',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                {!! Form::label('account_type','Type de compte : ') !!}
                                {!! Form::select('account_type',['1'=>'Agent','2'=>'Chef de service','3'=>'Administrateur'],'1',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        {!! Form::hidden('id',null,['class'=>'id','id'=>'id']) !!}
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit('Sauvegarder',['class'=>'btn btn-primary']) !!}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    </div>
                {!! Form::close() !!}

          </div>
        </div>
      </div>
 <!-- Fin Model modification des informations  -->

 <!-- Model modification du mot de passe  -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h5 class="modal-title2" id="exampleModalLabel">Modification du mot de passe pour <span id="nameModif" style="font-weight:bold;"></span>  </h5>
                </div>
                    {!! Form::open(['route'=>'update.password']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-3">
                                    {!! Form::label('new_password','Nouveau mot de passe :') !!}
                                    {!! Form::password('new_password',['class'=>'form-control','id'=>'new_password','placeholder'=>'*********']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-md-offset-3">
                                    {!! Form::label('new_password_confirmation','Confirmer le mot de passe :') !!}
                                    {!! Form::password('new_password_confirmation',['class'=>'form-control','id'=>'new_password_confirmation','placeholder'=>'*********']) !!}
                                </div>
                            </div>
                        {!! Form::hidden('id_new',null,['class'=>'id_new','id'=>'id_new']) !!}
                        </div>
                        <div class="modal-footer">
                            {!! Form::submit('Sauvegarder',['class'=>'btn btn-primary']) !!}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    {!! Form::close() !!}
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
           $("#id").val(myBookId[0]) ; 
           $(".name #name").val( myBookId[1] );
           $(".email #email").val( myBookId[2] );
           $("#account_type").val(myBookId[3]);
            // As pointed out in comments, 
            // it is superfluous to have to manually call the modal.
             $('#exampleModal').modal('show');
        });

        $(document).on("click", ".data2", function () {
            var myBookId = $(this).data('id');
            myBookId = myBookId.split("|") ;
            myBookId[1] = myBookId[1] ; 
           $(".modal-title2 #nameModif").text(myBookId[1]);
           $("#id_new").val(myBookId[0]);

          // $(".value #value").val(myBookId));
            // As pointed out in comments, 
            // it is superfluous to have to manually call the modal.
             $('#exampleModal2').modal('show');
        });

        function supprimer(){
            return confirm("Voulez-vous supprimer ce compte!") ; 
        }

    </script>

@endsection 