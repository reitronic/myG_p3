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
    <body>
        <header>
        <?php require_once "nav.php"; ?>
        </header>
<!-- END HEADER -->
        <div id="titleBlock">
            <h1 class="display-1">My G*</h1>
            <h2 class="display-5">Plant Planner Buddy</h2>
        </div>
        <div><a href="plantProfileExit.php">See All Plants!</a><div>

        
<!-- PLANT PROFILE -->
    <?php
    if(!$_SERVER['QUERY_STRING']){
        header('location:index.php');
    };

    $uid = $_SERVER['QUERY_STRING'];
    $_SESSION['uid'] = $uid;

    $d = file_get_contents("anitaAllPlants.json");
    $d = json_decode( $d, true );
    
    
    ?>

    <form method="post" action="dhPlantEdit.php" enctype="multipart/form-data">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo $_SESSION['img']; ?>" class="card-img-top">
            
            <input class="form-control" name="photo" type="file">
                <div class="card-body">
                <h4 class="card-title">This is <?php echo $_SESSION['pnn'];?> 's Profile</h4>
                    <input type="hidden" name="m" value="<?php echo $_SESSION['uid'];?>">
                    <input type="text" class="form-control" name="pnn" value="<?php echo $_SESSION['pnn'];?>">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Next Watering Date On: <?php echo $_SESSION['nwd']; ?></li>
                            <li class="list-group-item">Frequency: <?php echo $this->fq ;?></li>
                            <li class="list-group-item">Last Watered On: <?php echo $_SESSION['lwd'];?></li>

                            <li class="list-group-item">Plant Variety: <?php echo $_SESSION['pv'];?></li>
                            <li class="list-group-item">Plant Type: <?php echo $_SESSION['pt'];?></li>
                            <li class="list-group-item">Date Added: <?php echo $_SESSION['addedOn'];?></li>
                            
                        </ul>
            <input type="submit" value="Save" class="btn btn-success">
            <a href="dhPlantDelete.php?<?php echo $uid; ?>" class="btn btn-success">Delete</a>
        </div>
    </form>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <script src="assets/script/addNewPlantsScript.js"></script>
    </body>
</html>