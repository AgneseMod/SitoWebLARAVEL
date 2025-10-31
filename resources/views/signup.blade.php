<html> 
    <head>
        <link rel='stylesheet' href="{{ url('css/signup.css')}}">
       

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta charset="utf-8">

        <title>Iscriviti - Popcorn</title>
    </head>
    <body>
        <div id="logo">
            Popcorn
        </div> 
        
        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1>Iscriviti gratuitamente </h1>
            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="names">
                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' name='name' id='name' value='{{ old("name") }}' >
                       
                    </div>
                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' id='surname' value='{{ old("surname") }}' >
                       
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' id='username' value='{{ old("username") }}'> 
                   
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' id='email'  value='{{ old("email") }}'> 
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' id='password' > 
               
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' id='confirm_password' >
                  
                </div>
                <div class="fileupload">
                    <label for='avatar'>Scegli un'immagine profilo</label>
                        <input type='file' name='avatar' accept='.jpg, .jpeg, image/gif, image/png' id="upload_original">
                        <div id="upload"><div class="file_name">Seleziona un file...</div>
                </div>
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1"> 
                    <label for='allow'>Accetto i termini e condizioni d'uso di Popcorn.</label>
                </div>
                @if($error == 'existing') 
                    <div><span>Nome utente o email non disponibile</span></div>         
                @elseif($error == 'empty_fields') 
                    <div><span>Compilare tutti i campi.</span></div>      
                @elseif($error == 'invalid_password')    
                    <div><span>Password non valida, assicurarsi di aver inserito almeno 8 caratteri di cui un numero ed una lettera maiuscola</span></div>
                @elseif($error == 'bad_passwords') 
                    <div><span>Le password non coincidono</span></div> 
                @endif
                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href="{{ url('login') }}">Accedi</a>
        </section>
        </main>
    </body>
</html>