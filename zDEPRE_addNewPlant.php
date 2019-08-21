<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';
?>

<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
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
        <?php require_once "nav.php"; ?>
        <div class="display-5 text-right m-3 text-success">You now have a total of <?php echo '<b>'.$_SESSION['counter'].'</b>'; ?> plants, <?php 
    echo $_SESSION['a'].'.'; ?></div>
<!-- END HEADER -->
        <div id="titleBlock d-flex justify-content-center">
            <h1 class="display-1 text-success text-md-center">My G* </h1>
            <h2 class="display-4 text-success text-md-center">Plant Planner Buddy</h2>
        </div>

            
        
    </header>
<!-- CONTENT ADD NEW FOLIAGE -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 border border-success">
        <form method="post" action="dhAdd3.php" enctype="multipart/form-data">
            <div class="d-block display-2 text-success">Add a foliage!</div>
            <div class="d-block display-5 text-success">Name your foliage!</div>
        <input class="form-control form-control-lg display-5" placeholder="Mos" type="text" id="askName" onkeyup="nameDis()" name="pnn">
            <button id="fR" type="radio" name="pt" value="Foliage" class="btn btn-success btn-lg">Search for you foliage!</button>   
                <input id="fcn" type="text" class="hide plantlist form-control form-control-lg" name="plantvarietyF" list="fList" placeholder="Find Your Foliage!">
                <datalist id="fList"></datalist>
    <div id="ifFoliage" class="container hide">
        <h3 class="text-success">Have you watered your <span class="text-success text-center font-weight-bold pnnDisplay"></span> plant in the past 7 days?</h3>
          <input type="radio" name="wyn" value="yes">Yes, I have!<br>
                <label>Select the day you last watered this plant:</label>
                        <select type="select" name="lwd">
                        <option disabled selected value> -- Select Day -- </option>
                            <?php
                                for ( $xb = 0; $xb <7 ; $xb++ ){
                                    $td = strtotime('today');
                                    $md = '-'.$xb.'days';
                                    $md = ''.$md.'';
                                    $dy = strtotime( $md , $td);
                                    $sd = date( "D m/d/Y" , $dy );
                                    echo '<option value = "'.$sd.'">'.$sd.'</option>';
                                };
                            ?>
                        </select>
                        <br>
            
            <input type="radio" name="wyn" value="no" disabled>No, I haven't!<br>
                <label>Select day this week you want to start watering this plant:</label>
                    <select type="select" name="wsd" id="nwday" disabled>
                        <option disabled selected value> -- Select Day -- </option>
                            <?php
                                for ( $xt = 0; $xt <7 ; $xt++ ){
                                    $td = strtotime('today');
                                    $md = '+'.$xt.'days';
                                    $md = ''.$md.'';
                                    $dy = strtotime( $md , $td);
                                    $sd = date( "D m/d/Y" , $dy );
                                    echo '<option value = "'.$sd.'">'.$sd.'</option>';
                                };
                            ?>
                    </select>
    
    </div>
    <h3 class="display-5 text-success">Upload a profile picture of your plant!</h3>
            <input class="form-control" type="file" name="photo" required>
        <button type="submit" class="m-5 p-5 btn btn-success btn-lg">Add Foliage!</button>
    </form>
</div>





<!-- SUCCULENT CHOICE -->

<div class="col-md-6 border border-success">
    <form method="post" action="dhAddSucculent.php" enctype="multipart/form-data">
    <div class="d-block display-2 text-success">Add a succulent!</div>
    <div class="d-block display-5 text-success">Name your succulent!</div>
<input class="form-control form-control-lg display-5" placeholder="Def" type="text" id="askName" onkeyup="nameDis()" name="pnn">
    <button id="sR" type="radio" name="pt" value="Succulent" class="btn btn-success btn-lg">Search for your succulent!</button>   
        <input id="scn" type="text" class="hide plantlist form-control form-control-lg" name="plantvarietyS" list="sList" placeholder="Find Your Succulent!">
            <datalist id="sList"></datalist>
    <div id="ifSucculent" class="container hide">
        <h4 class="display-5 text-success">Have you watered your <span class="text-success text-center font-weight-bold pnnDisplay"></span> succulent in the past 21 days?</h4>
            <input type="radio" name="wyn" value="yes">Yes, I have!<br>
                    <label>Select day you last watered this plant:</label>
                            <select type="select" name="lwd">
                            <option disabled selected value> -- Select Day -- </option>
                                <?php
                                    for ( $xt = 0; $xt <21 ; $xt++ ){
                                        $tx = strtotime('today');
                                        $xd = '-'.$xt.'days';
                                        $xd = ''.$xd.'';
                                        $dn = strtotime( $xd , $tx);
                                        $st = date( "D m/d/Y" , $dn );
                                        echo '<option value = "'.$st.'">'.$st.'</option>';
                                    };
                                ?>
                        </select>
                        <br>
                <input type="radio" name="wyn" value="no" disabled>No, I haven't!<br>
                        <label>Select day this week you want to start watering this plant:</label>
                            <select type="select" name="wsd" disabled>
                                <option disabled selected value> -- Select Day -- </option>
                                    <?php
                                        for ( $xt = 0; $xt <21 ; $xt++ ){
                                            $td = strtotime('today');
                                            $md = '+'.$xt.'days';
                                            $md = ''.$md.'';
                                            $dy = strtotime( $md , $td);
                                            $sd = date( "l m/d/Y" , $dy );
                                            echo '<option value ="'.$sd.'">'.$sd.'</option>';
                                            };
                                    ?>
                            </select>
                    </div>
            <h3 class="display-5 text-success">Upload a profile picture of your succulent!</h3>
            <input class="form-control" type="file" name="photo" required>
            <button type="submit" class="m-5 p-5 btn btn-success btn-lg">Add Succulent!</button>
</form>
    </div>
</div>
</div>
</div>
<!-- </div> end of row -->
</div>



<script>
    function nameDis(){
    var x = document.getElementById("askName").value;
    document.querySelector(".pnnDisplay").innerHTML = x;
    // console.log(x);
    };
</script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <script src="assets/script/addNewPlantsScript.js"></script>
        <script src="assets/script/script.js"></script>
    </body>


</html>



