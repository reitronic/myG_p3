
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand text-success" href="index.php">My G*</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav text-success">
      <a class="nav-item text-success nav-link active " href="index.php">Add a Homie<span class="sr-only">Home</span></a>
      <a class="nav-item text-success nav-link" href="dashboard.php">Who to Water</a>
      <a class="nav-item text-success nav-link" href="allFoliage.php">Foliage Gang Gang</a>
      <a class="nav-item text-success nav-link" href="allSucculents.php">Succulents Gang Gang</a>
</nav>
<div class= "nav-item text-success text-center">
        <?php 
        echo 'Hello '.$_SESSION["a"].'!<br><p class="font-italic text-success">Today is: '.date('l m/d/Y'); ?></p></div>

  <!-- <div class="text-success text-center">You currently have a total of -->
 <?php
    /*
    $dfoliage = file_get_contents("anitaAllFoliage.json");
    $dfoliage = json_decode( $dfoliage, true );
    global $x;
    $x = count($dfoliage);


    $dsucculent = file_get_contents("anitaAllSucculents.json");
    $dsucculent = json_decode( $dsucculent, true );
    global $y;
    $y = count($dsucculent);

    $_GLOBALS['x'] + $_GLOBALS['y'] = $counter;
    echo $counter.' plants!';
    */
  ?>
  </div>

