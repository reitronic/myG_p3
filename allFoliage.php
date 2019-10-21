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
  <title>"My G" || Your Plant Collection</title>
</head>
<body>
<header>
    <?php require_once "nav.php"; ?>
</header>

<div class="container-fluid">
    <div class="row mb-5">
      <div class="col all dheader">Foliage(s)
        <?php
          $plantdata = file_get_contents("anitaAllFoliage.json");
          $plantdata = json_decode( $plantdata, true );
          $x = count(array_keys($plantdata));
          echo '<h2 class="counter">You currently have '.$x.' foliage plants.</h2>';
        ?>
      </div>
    </div>

  <div class="row d-flex justify-content-around">
    <?php
      foreach ( $plantdata as $k => $tp ){
        echo '<a href="plantProfile.php?'.$k.'" class="ap-card mb-5">
                <div class="name-tag">
                    <div class="name-tag-name">'.$tp['pnn'].'!</div>
                    <h6 class="tag">"the<br>'.$tp['pv'].'"</h6>
                </div>
                  <img class="plant-prof-pic plant-prof float-none float-md-right" src="'.$tp['img'].'">
              </a>'
              ;
            };
    ?>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>