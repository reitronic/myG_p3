<?php session_start();
$_SESSION['a'] = $a = "Anita";

include 'classes/succulent.class.php';

?>

<!doctype html>

<html lang="en">
  <head>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">


    <title>My G* Plant Planner Buddy</title>
    </head>
<!--HEADER-->
    <body>
        <header>
        <div id="titleBlock" class="justify-content-center">
            <h1 class="display-1 text-success text-md-center">My G* </h1>
            <h2 class="display-4 text-success text-md-center">Plant Planner Buddy</h2>
        </div>
        <?php require_once "nav.php"; ?>
</header>
<!-- END HEADER -->
<!-- GREETINGS BLOCK -->
<div class="greetUser">
    <h1 class="display-2 text-success">Succulents</h1>
            <div class="container-fluid d-flex justify-content-center">
            <div class="row">
                                <?php 
                                $dsucculent = file_get_contents("anitaAllSucculents.json");
                                $dsucculent = json_decode( $dsucculent, true );

                                $x = count(array_keys($dsucculent));
                                echo '<h3 class="text-success">You currently have '.$x.' succulents.</h3>';

                                foreach ( $dsucculent as $z => $cn ){
                                    echo '<div class="card plantEach" id="'.$cn['uid'].'"> 
                                            <div class="card float-left" style="width: 20rem;">
                                            <img src="'.$cn['img'].'" class="card-img-top">
                                            <div class="card-body">
                                            <h4 class="card-title">'.$cn['pnn'].'</h4>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Next Watering Date On: '.$cn['nwd'].'</li>
                                                    <li class="list-group-item">Plant Variety: '.$cn['pv'].'</li>
                                                    <li class="list-group-item">Plant Type: Succulent </li>
                                                    <li class="list-group-item">Date Added: '.$cn['addedOn'].'</li>
                                                </ul><br>
                                                <a href="dhSucculentsDelete.php?'.$cn['uid'].'" class="btn btn-outline-warning disabled">Delete</a>
                                        </div>
                                        </div>
                                        </div>
                                        ';
                                    }
                            ;?>
                    </div>

                



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="assets/script/addNewPlantsScript.js"></script>
    </body>
</html>