<?php
session_start();
if(isset($_SESSION["loggedIn"]))
{
    echo '
    <!DOCTYPE html>
    <html lang="hu">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../stylesheet/stylesheet.css">
        <title>Bootstrap</title>
    </head>

    <body>

        <header class="container-fluid">
            <div class="row">
                <div classs="container">
                    <div class="row">
                        <h1 class="col-sm-4">Logo</h1>
                        <nav class="col-sm-8">
                            <a href="">menu 1 </a>
                            <a href="">menu 2 </a>
                            <a href="">menu 3 </a>
                            <a href="">menu 4 </a>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-fluid main-image">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="title">Lorem Ipsum</p>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3 col-sm-pull-6 col-md-pull-3">
                    <div class="box">
                        <img src="../imgs/2.jpg" class="img-thumbnail">
                        <h2>box 1</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-sm-pull-6 col-md-pull-3">
                    <div class="box">
                        <img src="../imgs/3.jpg" class="img-thumbnail">
                        <h2>box 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="box">
                        <img src="../imgs/4.jpg" class="img-thumbnail">
                        <h2>box 3</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="box">
                        <img src="../imgs/5.jpg" class="img-thumbnail">
                        <h2>box 4</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.</p>
                    </div>
                </div>

            </div>
        </div>  

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous">
        </script>

    </body>

    </html>';

} else {
    header("Location: ../index.php");
}