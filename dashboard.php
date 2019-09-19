<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';

?>

<!doctype html>
<html lang="en">

    <head>
        <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="assets/style/style.css">


        <title>My G* Plant Planner Buddy</title>
    </head>
    <!--MAIN DASHBOARD -->

    <body>
        <header>
            <?php require_once "nav.php"; ?>
        </header>
        <!-- END HEADER -->

        <!-- GREETINGS BLOCK -->
        <div class="greetingsBlock">
            <div class="container-fluid d-flex justify-content-center">
                <div class="row">
                    <div class="greetUser">
                        <div class="display-4 text-success text-center">Hey
                            <?php echo $_SESSION['a'].', this is our watering schedule for today!</div>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD GREETING-->

        <!-- TODAY DASHBOARD (AJAX dynamic display)-->
        <div class="container-fluid" id="mainDisplay">
            <!-- <div class="container-fluid"> -->
                <h1 class="display-3 text-success">Today To Do</h1>
                <div class="row" id='todayDisplay'>


                </div>
            <!-- </div> -->
            <div class="container-fluid">
                <h1 class="display-3">Past Due!</h1>
                <div class="row" id='pastDueDisplay'>


                </div>

            </div>

            <div class="container-fluid ">
                <h1 class="display-3">Completed Today</h1>
                <div class="row" id="todayCompletedDisplay">


                </div>
            </div>

            <div class="container-fluid">
                <h1 class="display-3">Just Chillin</h1>
                <div class="row" id='upcomingDisplay'>




                </div>
            </div>



        </div>


        <!-- END OF DASHBOARD -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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