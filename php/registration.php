<?php
 echo '
 <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Regisztráció</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,700"> 
        <link rel="stylesheet" href="../stylesheet/style.css">
        <script src="../scripts/script.js"></script> 
    </head>
    <body>
    <div class="login-form">
        <form method="post" action="">
            <h1>Regisztráció</h1>
            <div class="content">
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email" id="email">
                    <input type="password" placeholder="Jelszó" name="password" id="password">                    
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Jelszó" name="password" id="password">
                </div>
                <a href="../index.php" class="link">Van már felhasználód? Kattints ide!</a>
            </div>            
            <div class="action">                
                <button type="submit" name="login">Regisztráció</button>                                                
            </div>
        </form>
    </div>
           
    </body>
    </html>';