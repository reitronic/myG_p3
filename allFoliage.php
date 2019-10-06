<?php session_start();
include 'classes/foliage.class.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="cache-control" content="no-cache">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- custom css -->
  <link rel="stylesheet" type="text/css" href="assets/style/style.css">
  <title>"My G"reens</title>
</head>
<body>
<header>
    <?php require_once "nav.php"; ?>
</header>

<div class="container">
<div class="row d-flex flex-column align-content-center text-center">
  <div class="col-md-6 dheader">Foliage(s)</div>
    <?php 
      $plantdata = file_get_contents("anitaAllFoliage.json");
      $plantdata = json_decode( $plantdata, true );

      $x = count(array_keys($plantdata));

      echo '<div class="col-md-6 counter">You currently have '.$x.' foliage plants.</div>';

      if (isset($_GET['updated'])){
        echo '<div class="update-msg">'.$_SESSION['pnn'].' has been updated!</div>';
      };
    ?>
</div>
<div class="row">
<?php
  foreach ( $plantdata as $k => $tp ){
    echo '<div class="card mx-auto mb-3 d-flex" id="'.$k.'">
    <p class="card-text"><span class="emph">'.$tp['pnn'].'</span><br> is a '.$tp['pv'].'</p>
    <p class="card-text">Next Watering Date:<br>'.$tp['nwd'].'</p>
<img src="'.$tp['img'].'" class="plant-pic">


<p class="card-text">Last Watered On:<br>'.$tp['lwd'].'</p>
<p class="card-text">Added On:<br>'.$tp['addedOn'].'</p>

          <a href="plantEdit.php?'.$k.'" class="edit-btn">
          Edit '.$tp['pnn'].'</a>
          <button class="delete-btn" data-toggle="modal" data-target="#deleteplant'.$k.'">
          Delete '.$tp['pnn'].'
          </button>
          <div class="modal fade" id="deleteplant'.$k.'" tabindex="-1" role="dialog" aria-labelledby="deleteplantLabel'.$k.'" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteplantLabel'.$k.'">Delete?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this plant?
              </div>
              <div class="modal-footer">
                <a href="allFoliage.php" class="btn btn-btn-outline-secondary">No, do not delete.</a>
                <a href="dhFoliageDelete.php?'.$k.'" class="btn btn-outline-warning">Yes, delete!</a>
              </div>
            </div>
          </div>
        </div>
      </div>'
      ;
    };
  ?>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="assets/script/addNewPlantsScript.js"></script>
</body>
</html>