<html>
    <head>
        <script>
          const BASE_URL= "{{url('/')}}/";
          const csrf_token = '{{ csrf_token() }}';
        </script>
        <title>Popcorn</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{url('css/ricerca.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{url('js/ricerca.js')}}" defer="true"></script>
    </head>
        
    <body> 
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
       <h1>Cerca il titolo di un film o una serie tv per saperne di più</h1>
        <section id="search">
            <form autocomplete="off">
            <div class="search">
          <label for='search'>Cerca</label>
          <input type='text' name="search" class="searchBar">
          <input type="submit" value="Cerca">
        </div>
      </form>
      <article id="album-view">
			
		</article>
		<article id = "sinossi">
			<p id="plot"></p>
		</article>
		<article id="cast">
		</article>
		
		<article id="modale" class="hidden"> 
		</article>
      
        </section>
        <footer>
      <h1>Agnese Modica 1000026796</h1>
    </footer>
    </body>

</html>