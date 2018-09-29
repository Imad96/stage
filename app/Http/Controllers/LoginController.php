<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showLogin()
    {

      return view('login');
    }

    public function doLogin(Request $request)
    {
       // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = $this->validate($request, $rules);

            // create our user data for the authentication
            $userdata = array(
                'email'     => $request->all()['email'],
                'password'  => $request->all()['password']
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                if(Auth::user()->type == 3){
                     return redirect()->route('accueil.admin');
                 }
                 else{
                   return redirect()->route('main');
               }

            } else {

                // validation not successful, send back to form
                return redirect()->route('login');

            }

    }

     public function doLogout()
		{
		   Auth::logout(); // logging out user
       return redirect()->route('login.page'); // redirection to login screen
		}
}
