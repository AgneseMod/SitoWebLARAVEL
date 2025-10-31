
<html>
        <script>
          const BASE_URL= "{{url('/')}}/";
          const csrf_token = '{{ csrf_token() }}';
        </script>
    <head>
        <title>Popcorn</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ url('css/intro.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ url('js/intro.js')}}" defer="true"></script>
    </head>

    <body>
            <h1>Fai i primi passi per configurare il tuo profilo</h1>
            <a class="subtitle"> Seleziona dalla lista alcuni dei titoli che vorresti vedere </a>
        <section class="container">
        
            <div id="results">
                
            </div>
            <a id="saveButton">Continua</a>

        </section>

    </body>

</html>