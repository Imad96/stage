<?php 

namespace App\Repositories; 

use App\User; 


class AccountRepository 
{
    /**
     * User to be used in the rest of the functions
     */
    protected $user ; 


    /**
     * construct that initialize the field "User"
     */
    public function __construct(User $user){
        $this->user = $user ; 
    }

    /**
     * Function that saves a new user in BDD
     */
    public function addAccount(Array $request){
        $user = new $this->user ; 

        $user->password = bcrypt($request['password']) ; 
        $user->name = $request['name'] ; 
        $user->email = $request['email']; 
        $user->type = $request['account_type'] ; 

        $user->save() ; 

        return $user; 
    }


    /**
     * Function that returns all users
     */
    public function getAll(){

        return User::select('id','name','email','type')->orderBy('id','asc')->get() ; 
    }

    /**
     * Function that update the 'name','email' and 'type' of an existing user
     * returns the updated user 
     */
    public function updateAccount(Array $request){
        $id = $request['id'] ; 

        $user = new $this->user ; 

        $user = User::findOrFail($id);  
        $user->name = $request['name'] ; 
        $user->email = $request['email'] ; 
        $user->type = $request['account_type']; 

        $user->save() ; 

        return $user ; 
    }

    /**
     * Function that updates password of an existing user 
     * It returns the updated user
     */
    public function updatePassword(Array $request){

        $user = new $this->user ; 

        $id = $request['id_new'] ; 

        $user = User::findOrFail($id) ; 
        $user->password = bcrypt($request['new_password']) ; 

        $user->save() ; 

        return $user ; 
    }

    /**
     * Function that deletes an exesting user 
     * It returns the name of the deleted user
     */
    public function deleteAccount($id){
        $user = new $this->user ; 

        $user = User::findOrFail($id) ; 
        $name = $user->name ; 
        $user->delete() ; 

        return $name;
    }


}
