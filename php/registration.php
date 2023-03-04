<?php
require("./database.php");
echo '
 <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Regisztráció</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,700"> 
        <link rel="stylesheet" href="../stylesheet/loginpage_style.css">
        <script src="../scripts/script.js"></script> 
    </head>
    <body>
    <div class="login-form">
        <form method="post" action="">
            <h1 style="text-align: center">Regisztráció</h1>
            <div class="content">            
                <div class="input-field">
                    <h4 class="regformtitle">Belépési adatok</h4>
                    </br>                
                    <input type="email" placeholder="Email*" name="email" id="email" required>
                    <input type="password" placeholder="Jelszó*" name="password" id="password" required>
                    <input type="password" placeholder="Jelszó újra*" name="password2" id="password2" required>                      
                </div>                
                <div class="input-field">
                    <h4 class="regformtitle">Személyes adatok</h4>
                    </br>
                    <input type="text" placeholder="Vezetéknév*" name="firstname" id="firstname" required>
                    <input type="text" placeholder="Keresztnév*" name="lastname" id="lastname" required>
                    <input type="date" placeholder="Születési dátum*" name="date_of_birth" id="date_of_birth" max="9999-12-31" required>
                    <input type="text" placeholder="Telefonszám*" name="telephone_number" id="telephone_number" required>
                </div>
                <div class="input-field">
                    <h4 class="regformtitle">Szállítási adatok</h4>
                    </br>
                    <input type="text" pattern="[0-9]*" placeholder="Irányítószám*" name="postalcode" id="postalcode" required>
                    <input type="text" placeholder="Város*" name="city" id="city" required>
                    <input type="text" placeholder="Közterület neve, jellege*" name="street" id="street" required>
                    <input type="text" placeholder="Házszám, emelet, ajtó*" name="street_number" id="street_number" required>
                    <input type="text" placeholder="Egyéb információ (Pl: csengő)" name="other_information" id="other_information">
                </div>
                <a href="../index.php" class="link">Van már fiókod? Kattints ide!</a>
            </div>            
            <div class="action">                
                <button type="submit" name="registration">Regisztráció</button>                                                
            </div>
        </form>
    </div>
           
    </body>
    </html>';

try 
{
    if (isset($_POST["registration"]) && $_POST["password"] === $_POST["password2"]) 
    {
        $options = ['cost' => 12,];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
        
        if(DB::query('SELECT emailaddress FROM users WHERE NOT EXISTS (SELECT emailaddress FROM users WHERE emailaddress = :emailaddress)', array(":emailaddress" => $_POST["email"])))
        {
            DB::query('INSERT INTO users (emailaddress, password, firstname, lastname, date_of_birth, telephone_number, postalcode, city, street, street_number, other_information) VALUES(:emailaddress, :password, :firstname, :lastname, :date_of_birth, :telephone_number, :postalcode, :city, :street, :street_number, :other_information)',
            array
                (
                    ":emailaddress" => $_POST["email"],
                    ":password" => $password,
                    ":firstname" => $_POST["firstname"],
                    ":lastname" => $_POST["lastname"],
                    ":date_of_birth" => $_POST["date_of_birth"],
                    ":telephone_number" => $_POST["telephone_number"],
                    ":postalcode" => $_POST["postalcode"],
                    ":city" => $_POST["city"],
                    ":street" => $_POST["street"],
                    ":street_number" => $_POST["street_number"],
                    ":other_information" => $_POST["other_information"]
                )
            );      
        }
        else if(DB::query('SELECT emailaddress FROM users WHERE EXISTS (SELECT emailaddress FROM users WHERE emailaddress = :emailaddress)', array(":emailaddress" => $_POST["email"])))
        {
            echo '    
            <div class="alert" id="alert">
                <span class="closebtn" onclick="closeWindow(alert)">&times;</span> 
                <strong>Figyelem!</strong> Ezzel az email címmel már regisztráltak.
            </div>';
        }    
       
    } 
    else if(!empty($_POST["password"] ?? null) || !empty($_POST["password2"] ?? null))
    {
        echo '    
        <div class="alert" id="alert">
            <span class="closebtn" onclick="closeWindow(alert)">&times;</span> 
            <strong>Figyelem!</strong> A jelszavak nem egyeznek.
        </div>';
    }
    else
    {
        echo '    
            <div class="alert" id="alert">
                <span class="closebtn" onclick="closeWindow(alert)">&times;</span> 
                <strong>Figyelem!</strong> A regisztrációhoz minden *-gal jelölt adat megadása szükséges.
            </div>';
    }
} 
catch (PDOException $e) 
{
    echo $e->getMessage();
}
