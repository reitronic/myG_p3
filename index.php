<?php 
// session_start();
include ('classes/foliage.class.php');
include ('classes/succulent.class.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="cache-control" content="no-cache">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="assets/style/style.css">
        <title>"My G"reens</title>
    </head>

    <body>
        <header>
            <?php require_once('nav.php'); ?>
        </header>
        <!-- END HEADER -->
        </header>
        <!-- ADD NEW FOLIAGE -->
        <div class="container">
            <div class="row">
                <div class="col d-flex align-center">
                    <a id="addnewfoliage">
                        <div class="addBtn">Add a foliage!</div>
                    </a>
                    <form id="fForm" class="hide text-center" method="post" action="dhAddFoliage.php"
                          enctype="multipart/form-data">
                        <div class="formLine">
                            <label for="pnn">Name your foliage!</label>
                            <br>
                            <input type="text" name="pnn" placeholder="Mos" required>
                        </div>
                        <div class="formLine">

                            <label for="plantvarietyF">Find your foliage variety</label>
                            <input type="text" class="plantlist" required name="plantvarietyF" list="fList"
                                   placeholder="Select from this list">
                            <datalist id="fList"></datalist>
                        </div>
                        <div class="formLine">
                            <label for="wyn">Have you watered your plant in the past 7 days?</label>
                            <br>
                            <input type="radio" name="wyn" value="yes">Yes, I have!<br>
                            <div id="yw" class="hide">
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
                            </div>
                            <br>
                            <input type="radio" name="wyn" value="no">No, I haven't!<br>
                            <div id="nw" class="hide">
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
                        <div class="p-lg-5">
                            <label for="photo">Upload a profile picture of your plant!</label>
                            <input type="file" name="photo" required>
                            <br></div>
                        <input type="submit" class="addBtn" value="Submit">
                    </form>

                    <!-- end of form -->
                </div>
            </div>
            </div>





            <!-- SUCCULENT CHOICE 

<div class="col-md-6">
    <div id="addnewSucculent" class="addBtn">Add a Succulent!</div>
         <div id="sForm">
            <form method="post" action="dhAddSucculent.php" enctype="multipart/form-data">
           
                <p class="d-block display-5 text-center">Name your Succulent!</p>
                <input class="form-contro display-5 text-center font-italics" required placeholder="Def" type="text" id="askSucculentName" name="pnn">
                <div id="searchbarSucculent" class="hide">
                    <input id="scn" type="text" class="plantlist text-center form-contro" required name="plantvarietyS" list="sList" placeholder="Find Your Succulent!">
                    <datalist id="sList"></datalist>
            
       
    <div id="ifSucculent" class="container">
        <h4 class>Have you watered your <span class= text-center font-weight-bold" id="spnnDisplay"></span> succulent in the past 21 days?</h4>
            <input type="radio" name="wyn" value="yes">Yes, I have!<br>
                    <label>Select day you last watered this plant:</label>
                            <select type="select" name="lwd">
                            <option disabled selected value> -- Select Day -- </option>

                            -->
            <?php /*
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
                                            */
                                    ?>
                <!--               </select>
                    </div>
                    <div id="uploadSucculentPhoto" class="hide">
                        <h3 class>Upload a profile picture of your succulent!</h3>
                        <input class="form-control" type="file" name="photo" required>
                        <button type="submit" class="m-5 p-5 btn btn-success btn-lg">Add Succulent!</button>
            </div>
</form>
    </div>
</div>
</div>
</div>
</div> end of row
</div> -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="assets/script/addNewPlantsScript.js"></script>
    </body>

</html>
