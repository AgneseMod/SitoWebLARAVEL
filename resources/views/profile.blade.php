<html>
  
    <head>
        <link rel='stylesheet' href="{{url('css/profile.css')}}">
        

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <title>Popcorn {{$username}} </title>
    </head>

    <body>
    <div id="overlay">
    </div>
        <header>
            <nav>
                
                    <div id="logo">
                         Popcorn
                    </div>  
                    <div id="links">
                        <a href="{{url('home')}}">HOME</a>
                        <a href="{{url('preferiti')}}">PREFERITI</a>
                        <a href="{{url('ricerca')}}">CERCA</a>
                        <a href="{{url('profile')}}">PROFILO</a>
                        <a href="{{url('logout')}}">LOGOUT</a>

                    </div>
                    <div id="menu">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </nav>
               
                    
                             
            
        </header>
            
        
        <div class="userInfo">
                
                    <div class="avatar" style="background-image: url('{{ asset('storage/assets/profile_image/' . $propic) }}');"></div>
                    <form name='modifica' method='post' enctype="multipart/form-data" autocomplete="off" action="{{ url('modifica-profilo') }}">
                    @csrf
                    <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original"  >
                        <div id="upload"><div class="file_name">Aggiorna l'immagine del profilo</div></div>
                        <div class="submit">
                    <input type='submit' value="Modifica" id="submit">
                </div>
                    </form>

                    <h1>USERNAME: {{$username}}</h1>
                    <div> NOME: {{$nome}}</div>
                    <div> COGNOME: {{$cognome}}</div>
                    <div> EMAIL: {{$email}}</div>
        </div> 
    </body>
    <footer>
      <h1>Agnese Modica 1000026796</h1>
    </footer>
</html>

