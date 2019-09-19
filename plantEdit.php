<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';

$_SESSION['uid'] = $uid = $_SERVER['QUERY_STRING'];
// var_dump($uid);

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
<!-- PLANT PROFILE -->
    <?php 
        $plantdata = file_get_contents("anitaAllFoliage.json");
        $plantdata = json_decode($plantdata, true);

        $index = array_search($uid, array_column($plantdata, 'uid'));

        $_SESSION['img'] = $plantdata[$index]['img'];
        $_SESSION['pnn'] = $plantdata[$index]['pnn'];
    ?>
    <h3 class="display-2 text-center text-success">Edit <?php echo $_SESSION['pnn'];?></a></h3>
    <div class="container">
        <div class="row">
            <div class="col-m-6">
            <form method="post" action="dhPlantEditF.php" enctype="multipart/form-data">
                <div class= "card" style="width: 30rem;">
                    <img src="<?php echo $_SESSION['img']?>" class="card-img-top">
                    <input type="file" name="photo">
                <div class="card-body">
                    <label>Change <?php echo $_SESSION['pnn']; ?>'s name</label>
                    <input class="form-control" type="text" name="pnn" placeholder="<?php echo $_SESSION['pnn']; ?>">
                </div>
                <input type="submit" name="sumbit" value="Save">
            </form>

            <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#deleteplant<?php echo $_SESSION['uid'];?>">
                        Delete <?php echo $_SESSION['pnn'];?>
                        </button>
                        <div class="modal fade" id="deleteplant<?php echo $_SESSION['uid'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteplantLabel<?php echo $_SESSION['uid'];?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteplantLabel<?php echo $_SESSION['uid'];?>">Delete?</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete this plant?
                            </div>
                            <div class="modal-footer">
                              <a href="allFoliage.php" class="btn btn-btn-outline-secondary">Nah</a>
                              <a href="dhFoliageDelete.php?<?php echo $_SESSION['uid'];?>" class="btn btn-outline-warning">Yes, delete!</a>
                            </div>
                          </div>
                        </div>
                      </div>


            </div>
        </div>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

     </body>
</html>