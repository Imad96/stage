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
            <div class="col-md-6 col-md-offset-4">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="from-group">
                                <label for="name">Nom :</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="ex: mohamed...">
                            </div> 
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email : </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="exemple@hmd-sonatrach.dz">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="password">Mot de passe :</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="**********">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="confPassword">Confirmer le mot de passe :</label>
                            <input type="password" name="confPassword" id="confPassword" class="form-control" placeholder="**********">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type de compte : </label>
                                <select class="form-control">
                                    <option>Agent</option>
                                    <option>Chef de service</option>
                                    <option>Administrateur</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info col-md-offset-4"> <i class="fa fa-plus"></i> Ajouter</button>
                </form>
            </div>
        </div>
@endsection