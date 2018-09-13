@extends('admin_template')

@section('title_page')
    Page Admin
@endsection

@section('user_name')
    mesut zidan
@endsection

@section('title')
    Ajouter un compte
@endsection

@section('ajouter_compte_classe')
    active-menu
@endsection 

@section('content')
        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                {!! Form::open(['route' => 'insert.account']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="from-group {!! $errors->has('name') ? 'has-error' : '' !!} ">
                                {!! Form::label('name','Nom: ') !!}
                                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'ex: mohamed...']) !!}
                                {!! $errors->first('name',' <small class="help-block">:message</small> ') !!}
                            </div> 
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!} ">
                                {!! Form::label('email','Email: ') !!}
                                {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'ex: exemple@hmd-sonatrach.dz']) !!}
                                {!! $errors->first('email',' <small class="help-block">:message</small> ') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                                {!! Form::label('password','Mot de passe: ') !!}
                                {!! Form::password('password',['class' => 'form-control','placeholder' => '*********']) !!}
                                {!! $errors->first('password',' <small class="help-block">:message</small> ') !!}
                            </div>                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('password_confirmation','Confirmation du mot de passe: ') !!}
                                {!! Form::password('password_confirmation',['class' => 'form-control','placeholder' => '*********']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('account_type','Type de compte: ') !!}
                                {!! Form::select('account_type',['1'=>'Agent','2'=>'Chef de service','3'=>'Administrateur'],'1',['class'=>'form-control']) !!}
                                
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-sm-4 col-md-offset-2 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Les droits de chaque type de compte
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <ul class="nav nav-tabs">
                                    <li class="active col-md-3 col-s-3"><a href="#home" data-toggle="tab" style="color:green;">Agent</a>
                                    </li>
                                    <li class="col-md-5 col-s-5"><a href="#profile" data-toggle="tab" style="color:orange;">Chef de service</a>
                                    </li>
                                    <li class="col-md-4 col-s-4"><a href="#messages" data-toggle="tab" style="color:red;">Administrateur</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    <h4>Les droits d'un compte de type Agent</h4>
                                    <p>Un compte de type Agent possède les droits suivants: <br>
                                        <ul>
                                            <li style="color:green;">Consultation des vols.</li>
                                            <li style="color:green;">Consultation de l'historique des vols et des employés.</li>
                                            <li style="color:green;">Extraction des listes des employés par vol.</li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Les droits d'un compte de type Chef de service</h4>                                    
                                    <p>Un compte de type Chef de service possède les droits suivants: <br>
                                        <ul>
                                            <li style="color:green;">Consultation des vols.</li>
                                            <li style="color:orange;">Modification des informations des vols.</li>
                                            <li style="color:green;">Consultation de l'historique des vols et des employés.</li>
                                            <li style="color:green;">Extraction des listes des employés par vol.</li>
                                        </ul>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Les droits d'un compte de type Administrateur</h4>                                    
                                    <p>Un compte de type Administrateur possède les droits suivant: 
                                        <ul>
                                            <li style="color:red;">Consultation des listes des comptes.</li>
                                            <li style="color:red;">Possibilité d'ajouter un compte.</li>
                                            <li style="color:red;">Possibilité de supprimer un compte.</li>
                                            <li style="color:red;">Modification des mots de passe pour les comptes existants.</li>
                                        </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
        <br>
         <div class="row">
                    @if(session()->has('ok'))
                        
                        <div class="col-md-3 col-md-offset-1 alert alert-success alert-dismissible">
                            {!! session('ok') !!}
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    @endif
        </div>

@endsection