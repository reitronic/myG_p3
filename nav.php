<nav class="navbar flex-column navbar-expand-sm navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="/assets/img/mglogolg-06.svg" width="200" class="d-inline-block align-top">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav text-success">
      <a class="nav-item text-success nav-link active " href="index.php">Add A New Plant<span
              class="sr-only">Home</span></a>
      <a class="nav-item text-success nav-link" href="dashboard.php">Watering Schedule</a>
      <a class="nav-item text-success nav-link" href="allFoliage.php">See All Foliage Plants</a>
      <a class="nav-item text-success nav-link" href="allSucculents.php">See All Succulent Plants</a>
</nav>
<p class="nav-item text-success text-center">
<?php 
  echo 'Hello '.$_SESSION['a'].'!<br><p class="font-italic text-success">Today is: '.date('l m/d/Y'); 
?></p>
</div>
</div>

