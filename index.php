<?php
require("./php/database.php");
session_start();


echo '
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Bejelentkezés</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,700"> 
        <link rel="stylesheet" href="./stylesheet/loginpage_style.css">
        <script src="./scripts/script.js"></script> 
    </head>
    <body>
    <div class="login-form">
        <form method="post" action="">
            <h1 style="text-align: center">Bejelentkezés</h1>
            <div class="content">
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email" id="email">
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Jelszó" name="password" id="password">
                </div>
                <!--<a href="#" class="link">Elfelejtetted a jelszavad?</a>-->
                <a href="./php/registration.php" class="link">Nincs még felhasználód?</a>
            </div>
            <div class="action">                
                <button type="submit" name="login">Bejelentkezés</button>                                 
            </div>
        </form>
    </div>
           
    </body>
    </html>';
try {
    if (isset($_POST["login"])) //Csak a bejelentkezés gomb megnyomása után vizsgálom, hogy ki lettek-e tölve helyesen az adatok
    {
        if (!empty($_POST["email"] ?? null) && !empty($_POST["password"] ?? null)) //Null-safe operatorral vizsgálom, hogy létrejött-e és nem null a változó értéke
        {
            $email = $_POST["email"];
            $options = ['cost' => 12,];
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options); //A jelszót hashelem

            $hashedPassword = DB::query('SELECT password FROM users WHERE emailaddress = :emailaddress', array(":emailaddress" => $_POST["email"]));
                        
            if (password_verify($_POST["password"], $hashedPassword[0]["password"])) {
                $_SESSION["loggedIn"] = "Siker";
                header("Location: ./php/webshop.php");
            } else {
                echo '    
            <div class="alert" id="alert">
                <span class="closebtn" onclick="closeWindow(alert)">&times;</span> 
                <strong>Figyelem!</strong> Helytelen jelszó.
            </div>';
            }
        }
    } else if (empty($_POST["email"] ?? null) || empty($_POST["password"] ?? null)) {
        echo '    
            <div class="alert" id="alert">
                <span class="closebtn" onclick="closeWindow(alert)">&times;</span> 
                <strong>Figyelem!</strong> A bejelentkezéshez minden adat megadása szükséges.
            </div>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
