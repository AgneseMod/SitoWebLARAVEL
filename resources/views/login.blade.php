
<html>
    <head>
        <link rel='stylesheet' href="{{url('css/login.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accedi - Popcorn</title>
    </head>
    <body>
        <div id="logo">
            Popcorn
        </div>
        <main class="login">
            <section class="main">
                <h5>Accedi</h5>
                <form name='login' method='post'>
                     @if($error == 'empty_fields')
                     <div>inserisci tutte le credenziali</div>
                     @elseif($error == 'wrong')
                     <div>Credenziali non valide</div>
                     @endif
                     @csrf 
                     <div class="username">
                        <label for='username'>Username</label>
                        <input type='text' name='username' id='username' value='{{ old ("username")}}'>
                    </div>
                    <div class="password">
                        <label for='password'>Password</label>
                        <input type='password' name='password' id='password'>
                    </div>
                    <div class="submit-container">
                        <div class="login-btn">
                            <input type='submit' value="ACCEDI">
                        </div>
                    </div>
                </form>
                <div class="signup"><h4>Non hai un account?</h4></div>
                <div class="signup-btn-container"><a class="signup-btn" href='{{ url ("signup") }}'>ISCRIVITI</a></div>
            </section>
        </main>
    </body>
</html>