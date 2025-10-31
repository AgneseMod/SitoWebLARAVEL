<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Film;
use App\Models\Serie;

class ViewController extends BaseController
{
    public function home()
    { 
        
        $user = User::find(Session::get('user_id'));
        // Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        
        
        return view('home');
    }

    public function profile()
    {
        // Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
      
        $user = User::find(Session::get('user_id'));
        
        return view('profile')->with('username', $user->username)->with('propic', $user->propic)->with('nome', $user->name)->with('cognome', $user->surname)->with('email', $user->email);
    }

    public function preferiti()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'));
        return view('preferiti')->with('username', $user->username);
    }

    public function ricerca()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'));
        return view('search')->with('username', $user->username);   
    }

    public function intro()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'));
        return view('intro')->with('username', $user->username);   
    }

}