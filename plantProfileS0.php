<?php session_start();
$_SESSION['anita'] = "Anita";
include 'classes/succulent.class.php';

if(!$isset($_SESSION['as'])){
    header('location:index.php');
};
?>

<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
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
        <div id="titleBlock d-flex justify-content-center">
            <h1 class="display-3 text-success text-md-center">My G* </h1>
            <h2 class="display-5 text-success text-md-center">Plant Planner Buddy</h2>
        </div>
        <?php require_once "nav.php"; ?>
        </header>
<!-- END HEADER -->

        
<!-- PLANT PROFILE -->
    <?php
            $dsucculent = file_get_contents("anitaAllSucculents.json");
            $dsucculent  = json_decode( $dsucculent , true );

            echo '
            <div class="container justify-content-center">
            
                <h3 class="display-2 text-center text-success">Hey, it\'s '.$_SESSION['pnn'].'!</a></h3>
                <div class="display-5 text-center m-3 text-success">You now have a total of '.$_SESSION['counter'].' plants. </div>
                <div class="container">
                <div class="row">
                    <div class="col-m-6>
                        
                    </div>
                    <div class="col-m-6">
                        <div class="card-body">
                        <img src="'.$_SESSION['img'].'" class="card-img-top">
                        <h4 class="card-title text-success">This is '.$_SESSION['pnn'].'\'s Profile</a></h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Next Watering Date On: '.$_SESSION['nwd'].'</li>
                                <li class="list-group-item">Plant Variety: '.$_SESSION['pv'].'</li>
                                <li class="list-group-item">Plant Type: '.$_SESSION['pt'].'</li>
                                <li class="list-group-item">Date Added: '.$_SESSION['addedOn'].'</li>
                            </ul>
                        </div>
                    </div>
                    </div>

        </div>';
    ?>

    <!--      <a href="plantEdit.php?'.$_SESSION['uid'].'" class="btn btn-success">Edit</a>
                            <a href="dhdelete.php?'.$_SESSION['uid'].'" class="btn btn-primary">Delete</a> -->

                </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="assets/script/dashboard.js"></script>
        <script src="assets/script/addNewPlantsScript.js"></script>
    </body>
</html>