<?php session_start();
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';
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
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="assets/style/style.css">
        <title>"My G"reens</title>
    </head>

    <body>
        <header>
            <?php require_once "nav.php"; ?>
        </header>

        <div class="container">

            <p>Hey Stranger! Let's water some plants.</p>

        </div>

        <!-- DASHBOARD-->
        <div class="container" id="mainDisplay">
            <div class="dash-section">
                <div class="dheader">To Do Today: <?php echo date('l m/d/Y')?></div>
                <div class="row" id='todayDisplay'></div>
            </div>
            <div class="dash-section">
                <div class="dheader">Past Due!</div>
                <div class="row" id='pastDueDisplay'>
        

                </div>
            </div>
            <div class="dash-section">
                <div class="dheader">Completed Today</div>
                <div class="row" id="todayCompletedDisplay"></div>
            </div>
            <div class="dash-section">
                <div class="dheader">All Good</div>
                <div class="row" id='upcomingDisplay'></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
                crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                crossorigin="anonymous"></script>
        <script src="assets/script/dashboard.js"></script>
    </body>

</html>