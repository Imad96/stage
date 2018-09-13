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

        return User::select('id','name','email','type')->get() ; 
    }
}
