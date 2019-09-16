<?php session_start();
$_SESSION['a'] = "Anita";

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
    <div id="titleBlock justify-content-center">
            <h1 class="display-1 text-center text-success">My G* </h1>
            <p class="display-4 text-center text-success">Plant Planner Buddy</p>
        </div>
    <?php require_once "nav.php"; ?>
        
<!-- END HEADER -->
    </header>
<!-- CONTENT ADD NEW FOLIAGE -->
<div class="container">
    <div class="row">
        <div class="col-md-6 border border-success justify-content-center">
        <button id="addnewfoliage" class="display-1 btn btn-success text-bold">Add a foliage!</button>
         <div id="fForm" class="hide">
            <form method="post" action="dhAddFoliage.php" enctype="multipart/form-data">
                <p class="d-block display-5 text-center text-success">Name your foliage!</p>
                <input class="form-control form-control-lg display-5 text-center font-italics" required placeholder="Mos" type="text" id="askName" onkeyup="nameDis()" name="pnn">
                        <div id="searchbar" class="hide">
                            <input id="fcn" type="text" class="plantlist form-control text-center form-control-lg" required name="plantvarietyF" list="fList" placeholder="Find Your Foliage!">
                            <datalist id="fList"></datalist>
                        

            <div id="ifFoliage" class="container">
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
            
                                <input type="radio" name="wyn" value="no">No, I haven't!<br>
                                    <label>Select day this week you want to start watering this plant:</label>
                                        <select type="select" name="wsd" id="nwday">
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
                        </div>
                        <!-- end of if foiliage question -->
                                      <div id="uploadF" class = "hide">
                                        <h3 class="display-5 text-success">Upload a profile picture of your plant!</h3>
                                        <input class="form-control" type="file" name="photo" required>
                                    
                                        <br>
                                <button type="submit" class="m-5 p-5 btn btn-success btn-lg">Add Foliage!</button>
                                </div>
            </form> 
        
            <!-- end of form -->
    </div>
</div>





<!-- SUCCULENT CHOICE -->

<div class="col-md-6 border border-success">
    <button id="addnewSucculent" class="display-1 btn btn-success  text-bold">Add a Succulent!</button>
         <div id="sForm" class="hide">
            <form method="post" action="dhAddSucculent.php" enctype="multipart/form-data">
           
                <p class="d-block display-5 text-center text-success">Name your Succulent!</p>
                <input class="form-control form-control-lg display-5 text-center font-italics" required placeholder="Def" type="text" id="askSucculentName" name="pnn">
                <div id="searchbarSucculent" class="hide">
                    <input id="scn" type="text" class="plantlist text-center form-control form-control-lg" required name="plantvarietyS" list="sList" placeholder="Find Your Succulent!">
                    <datalist id="sList"></datalist>
            
       
    <div id="ifSucculent" class="container">
        <h4 class="display-5 text-success">Have you watered your <span class="text-success text-center font-weight-bold" id="spnnDisplay"></span> succulent in the past 21 days?</h4>
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
                    <div id="uploadSucculentPhoto" class="hide">
                        <h3 class="display-5 text-success">Upload a profile picture of your succulent!</h3>
                        <input class="form-control" type="file" name="photo" required>
                        <button type="submit" class="m-5 p-5 btn btn-success btn-lg">Add Succulent!</button>
            </div>
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
        var y = document.getElementById("askSucculentName").value;
        if( x != ''){
            document.querySelector(".pnnDisplay").innerHTML = x;
        } else if( y != ''){
            document.querySelector("#spnnDisplay").innerHTML = y;
        };
    // console.log(x);
};
</script>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <script src="assets/script/addNewPlantsScript.js"></script>
    </body>


</html>



