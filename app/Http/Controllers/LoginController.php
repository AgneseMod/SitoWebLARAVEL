<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
   public function login_form()
   {
       if(Session::get('user_id'))
       {
           return redirect('login');
       }
       $error = Session::get('error');
       Session::forget('error');
       return view('login')->with('error', $error);
   }

   public function do_login()
   {
       if(Session::get('user_id'))
       {
           return redirect('login');
       }

       if(strlen(request('username')) == 0 || strlen(request('password')) == 0)
       {
           Session::put('error', 'empty_fields');
           return redirect('login')->withInput();
       }
       $user = User::where('username', request('username'))->first();
       if(!$user || !password_verify(request('password'), $user->password))
       {
           Session::put('error', 'wrong');
           return redirect('login')->withInput();
       }
      
       Session::put('user_id', $user->id);
      
       return redirect('home');
   }
   
   public function signup_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('login');
        }
        $error = Session::get('error');
        Session::forget('error');
        return view('signup')->with('error', $error);
    }

   public function do_signup()
   {
      if(Session::get('user_id'))
      {
          return redirect('login');
      }
      
      if(strlen(request('username')) == 0 || strlen(request('password')) == 0 || strlen(request('name')) == 0 || strlen(request('surname')) == 0 || strlen(request('email')) == 0 )
      {
          Session::put('error', 'empty_fields');
          return redirect('signup')->withInput();
      }
      else if(request('password') != request('confirm_password'))
      {
          Session::put('error', 'bad_passwords');
          return redirect('signup')->withInput();
      }
      else if(User::where('username', request('username'))->first())
      {
          Session::put('error', 'existing');
          return redirect('signup')->withInput();
      }
      else if(User::where('email', request('email'))->first())
      {
          Session::put('error', 'existing');
          return redirect('signup')->withInput();
      }
      else if(strlen(request('password')) < 8 || !preg_match('/[A-Z]/', request('password')) || !preg_match('/[0-9]/', request('password'))) 
    {
        Session::put('error', 'invalid_password');
        return redirect('signup')->withInput();
    }

      
      $user = new User;
      $user->name = request('name');
      $user->surname = request('surname');
      $user->email = request('email'); 
      $user->username = request('username');
      $user->password = password_hash(request('password'), PASSWORD_BCRYPT);

      if (request('avatar')) {
        $image = request('avatar');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('public/assets/profile_image', $imageName);
        $user->propic = $imageName;
    }
      else {
       
        $defaultImage = 'default_avatar.png'; 
        $user->propic = $defaultImage;
    }
    
      $user->save();
      
      Session::put('user_id', $user->id);
      
      return redirect('intro');
   }

   public function logout()
    {
       
        Session::flush();
        return redirect('login');
    }

    public function modifica()
    {
        if(!Session::get('user_id'))
      {
          return redirect('login');
      }  
      
      $user = User::find(Session::get('user_id'));
      

      $image = request('avatar');
      $imageName = time().'.'.$image->getClientOriginalExtension();
      $image->storeAs('public/assets/profile_image', $imageName);
      $user->propic = $imageName;
      $user->save();

      return redirect('profile');
    }
}
