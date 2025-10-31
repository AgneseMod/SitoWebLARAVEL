<html>
<head>
        <script>
          const BASE_URL= "{{url('/')}}/";
        </script>
        <link rel='stylesheet' href="{{url('css/profile.css')}}">
        <script src="{{url('js/preferiti.js')}}" defer="true"></script>

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
        <h1 class=title>Non sai cosa guardare stasera?</h1>
        <a class="subtitle">
                Controlla la tua lista e scegli cosa guardare!
        </a>
        
        <section class="container">        
            <span> FILM </span>
            <div class="results" id ="film"> </div>
            <span> SERIE </span>
            <div class="results" id ="serie"> </div>
           
    </section>

    </body>
    <footer>
      <h1>Agnese Modica 1000026796</h1>
    </footer>
    

</html>

