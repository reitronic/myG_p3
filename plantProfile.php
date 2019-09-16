<?php session_start();
    $_SESSION['a'] = $a = "Anita";
    include 'classes/foliage.class.php';
    include 'classes/succulent.class.php';
    $uid = $_SERVER['QUERY_STRING'] = $_SESSION['uid'];

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
            $plantdata = file_get_contents("anitaAllFoliage.json");
            $plantdata = json_decode( $plantdata, true );
            
            // $_SESSION['counter']; //counter

            if(isset($_SESSION['uid'])){
                echo '
                <div class="container justify-content-center">
                
                <h3 class="display-2 text-center text-success">Hey, it\'s '.$_SESSION['pnn'].'!</a></h3>
                    <div class="container">
                    <div class="row">
                        <div class="col-m-6>
                    <div class="card" style="width: 30rem;">
                    <img src="'.$_SESSION['img'].'" class="card-img-top">
                        <div class="card-body">
                        <h4 class="card-title text-success">This is '.$_SESSION['pnn'].'\'s Profile</a></h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Next Watering Date On: '.$_SESSION['nwd'].'</li>
                                <li class="list-group-item">Plant Variety: '.$_SESSION['pv'].'</li>
                                <li class="list-group-item">Plant Type: Foliage </li>
                                <li class="list-group-item">Date Added: '.$_SESSION['addedOn'].'</li>
                            </ul>
                        </div>

                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#deleteplant'.$_SESSION['uid'].'">
                        Delete This Plant
                        </button>
                        <div class="modal fade" id="deleteplant'.$_SESSION['uid'].'" tabindex="-1" role="dialog" aria-labelledby="deleteplantLabel'.$_SESSION['uid'].'" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteplantLabel'.$_SESSION['uid'].'">Delete?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this plant?
                            </div>
                            <div class="modal-footer">
                              <a href="allFoliage.php" class="btn btn-btn-outline-secondary">Nah</a>
                              <a href="dhFoliageDelete.php?'.$_SESSION['uid'].'" class="btn btn-outline-warning">Yes, delete!</a>
                            </div>
                          </div>
                        </div>
                      </div>



                        
                    </div>
                    </div>';
                };
    ?>
    </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>