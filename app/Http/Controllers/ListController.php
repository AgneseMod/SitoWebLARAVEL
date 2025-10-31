<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Film;
use App\Models\Serie;

class ListController extends BaseController {

public function get_movies()

    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'));
        return $user->Film;
    }

    public function get_series()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $user = User::find(Session::get('user_id'));
        return $user->Serie;
    }

    public function save_film()
    {
        
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        
        if (Film::where('user_id', Session::get('user_id'))->where('film_id', request('id'))->first())
        {
            $error = ['error' => 'Il film è già presente nei preferiti'];
            return response()->json($error);
        }

        $film = new Film;
     
        $film->user_id = Session::get('user_id');
        $film->film_id = request('id');
        $film->titolo = request('title');
        $film->anno = request('year');
        $film->voto = request('imDbRating');
        $film->img = request('image');
        $film->save();

        return $film;
    }

    public function save_series()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        if (Serie::where('user_id', Session::get('user_id'))->where('serie_id', request('id'))->first())
        {
            $error = ['error' => 'La serie è già presente nei preferiti'];
            return response()->json($error);
        }

        $serie = new Serie;

        $serie->user_id = Session::get('user_id');
        $serie->serie_id = request('id');
        $serie->titolo = request('title');
        $serie->anno = request('year');
        $serie->voto = request('imDbRating');
        $serie->img = request('image');
        $serie->save();
        
        return $serie;

    }


    public function remove_film($id)
    {
        
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
    
        $film = Film::where('user_id', Session::get('user_id'))->where('film_id', $id)->first();
       
      
        if($film->user_id != Session::get('user_id')) {
        
        return [];
        }

        // Rimuovi il film
        $film->delete();

        // Restituisco la lista aggiornata dei film preferiti
        $user = User::find(Session::get('user_id'));
        return $user->Film;

    }
    
    public function remove_serie($id)
    {
        // Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
    
       
        $serie = Serie::where('user_id', Session::get('user_id'))->where('serie_id', $id)->first();
       
        if($serie->user_id != Session::get('user_id'))
        {
            return [];
        }
    
        // Rimuovi la serie
        $serie->delete();
    
        // Restituisco la lista aggiornata delle serie preferite
        $user = User::find(Session::get('user_id'));
        return $user->Serie;
    }
    
}