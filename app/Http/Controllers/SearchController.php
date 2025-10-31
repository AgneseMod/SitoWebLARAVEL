<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Film;
use App\Models\Serie;

class SearchController extends BaseController
{
    public function search($query)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $key = env('API_KEY');
        $q=urlencode($query);
        $encodedQuery = str_replace('+', '%20', $q);
        $url = 'https://imdb-api.com/it/API/SearchAll/'.$key.'/'.$encodedQuery;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response); 

        return $data;
    }
   
    public function searchInfo($id)
    {
        // Controllo accesso
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }


        $key = env('API_KEY');
       $url = 'https://imdb-api.com/it/API/Title/'.$key.'/'.$id;
       $ch = curl_init();
       curl_setopt($ch, CURLOPT_URL, $url);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       $response = curl_exec($ch);
       curl_close($ch);

       $data = json_decode($response); // Decodifica la risposta JSON in un oggetto PHP
   
       return $data;
    }

    public function searchTrailer($q)
    {
        
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        
        $key = env('YOUTUBE_KEY');
        $query=urlencode($q);
        $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q='.$query.'&type=video&videoEmbeddable=true&key='.$key;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response); // Decodifica la risposta JSON in un oggetto PHP

    return $data;
        
    }

    function searchFilms ()
    {
         
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        
        $key = env('API_KEY');
        $url = 'https://imdb-api.com/en/API/Top250Movies/'.$key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
    
        $data = json_decode($response); // Decodifica la risposta JSON in un oggetto PHP
    
        return $data;
    }
    
    function searchSeries()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
            $key = env('API_KEY');
            $url = 'https://imdb-api.com/en/API/Top250TVs/'.$key;
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $response = curl_exec($ch);
            curl_close($ch);
        
            $data = json_decode($response); // Decodifica la risposta JSON in un oggetto PHP
        
            return $data;
        
    }
    
}