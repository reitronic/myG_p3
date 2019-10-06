<?php session_start();

include 'classes/foliage.class.php';

$_SESSION['plantid'] = $plantid = $_SERVER['QUERY_STRING'];
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="cache-control" content="no-cache">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- bs css cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
    <title>"My G"reens</title>
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
    $_SESSION['pnn'] = $plantdata[$plantid]['pnn'];
    $_SESSION['img'] = $img = $plantdata[$plantid]['img'];
  ?>
    <div class="container">
      <div class="name-tag">
        <h3 id="intro-name"><?php echo $_SESSION['pnn']; ?></h3>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <img src="<?php echo $_SESSION['img']?>" class="plant-prof">
          </div>
          <div class="col-md-6 pb-2 pb-md-0">
            <form method="post" action="dhPlantEditF.php" enctype="multipart/form-data">
              <div class="formLine text-center text-md-left my-lg-10">
                <label for="photo">Edit <?php echo $_SESSION['pnn']; ?>'s picture</label><br>
                <input type="file" name="photo">
              </div>
              <div class="formLine text-center text-md-left my-lg-10">
                <label>Change <?php echo $_SESSION['pnn']; ?>'s name</label><br>
                <input type="text" name="pnn" value="<?php echo $_SESSION['pnn']; ?>" placeholder="<?php echo $_SESSION['pnn']; ?>">
              </div>
              <input type="hidden" name="plantid" value="<?php echo $_SESSION['plantid']; ?>">
              <input type="submit" name="update" class="update-btn" value="Update">
            </form>

            <button type="button" class="delete-btn" data-toggle="modal"
                    data-target="#deleteplant<?php echo $_SESSION['plantid']; ?>">
              Delete <?php echo $_SESSION['pnn']; ?>
            </button>
            <div class="modal fade" id="deleteplant<?php echo $_SESSION['plantid']; ?>" tabindex="-1" role="dialog"
                 aria-labelledby="deleteplantLabel<?php echo $_SESSION['plantid']; ?>" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteplantLabel<?php echo $_SESSION['plantid']; ?>">Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete this plant?
                  </div>
                  <div class="modal-footer">
                    <a href="allFoliage.php" class="n-btn">No.</a>
                    <a href="dhFoliageDelete.php?<?php echo $_SESSION['plantid']; ?>" class="delete-btn">Yes,
                      delete!</a>
                  </div>
                </div>
                </div>
                </div>
              </div>
              </div>
              </div>

       


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous">
        </script>

  </body>

</html>