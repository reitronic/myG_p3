<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';

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
<h1 class="display-2 text-success">Foliage</h1>
            <div class="container-fluid d-flex justify-content-center">
            <div class="row">

            <!-- DYNAMIC DELETE BUTTON FOR ALL PLANTS IN DATABASE -->
                                <?php 
                                $plantdata = file_get_contents("anitaAllFoliage.json");
                                $plantdata = json_decode( $plantdata, true );


                                
                                foreach ( $plantdata as $i => $tp ){
                                    echo '
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deleteplant'.$tp["uid"].'">
                                                Delete This Plant
                                                </button>
                                                
                                                
                                                <div class="modal fade" id="deleteplant'.$tp["uid"].'" tabindex="-1" role="dialog" aria-labelledby="deleteplantLabel'.$tp["uid"].'" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteplantLabel'.$tp["uid"].'">Delete?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Are you sure you want to delete this plant?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <a href="allFoliage.php" class="btn btn-btn-outline-secondary">Nah</a>
                                                        <a href="dhFoliageDelete.php?'.$tp['uid'].'" class="btn btn-warning">Yes, delete!</a>
                                                      </div>
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