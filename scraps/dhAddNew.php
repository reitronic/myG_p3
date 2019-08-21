<?php session_start();
$_SESSION['a'] = $a = "Anita";
include 'classes/foliage.class.php';




// 1. call PLANT TYPE LIST
        // decode json into php
        
        /* $searchDB = file_get_contents('ptList.json');
        $searchDB = json_decode( $pd, true );
        // print_r(array_keys( $pd ));
        function (){

        };

        foreach( $searchDB as $k =>$v ){
            $fq = $v['fq'];
            $mist = $v['mist'];
            $light = $v['light'];
            $uidarr = $v['uid'];
            foreach( $uidarr as $pkey => $peach ){
                echo '<br>';
                echo $pkey.'<br>';
                // print_r( $peach ).'<br>';
                echo '<br>';
                foreach( $peach as $ahh => $eachplant ){
                    print_r( $eachplant );
                    echo '<br>';
                }
            };
            // if( $pt == 'Foliage' && $k == 'Foliage' ){
            //     var $farr = $k
            // } else {

            // }
        };

        // below are key names only -- not array values
        // $x = array_keys( $pd );
        // $fkeyonly = $x[0];
        // $skeyonly = $x[1];

    // match the Key Foliage or Succulent with the $pt
        // if ($pt == 'Foliage'){
            // then we want $fkey
            // foreach ($arr as $k=>$v){
            //     echo $v; 
            
        //     }
        // } else{
        //     echo 'SSSSSSucculent!!!!!!';
        // };

        // copy over PLANT TYPE properties and CREATE CLASS
            // CLASS OF foliage OR succulent
        // encode json and close db

    // 2. calc for
        // ___date added/created (to db/app)
        // ___last water date (if user said already watered, then record that; else record when user want to water aka not yet watered this week)
        // ___next water date ( plus 7 days for F ; plus 21 for S)

    // 3. create new object // plant profile:
        // for each plant profile in database
                // ___"uuid": "af01"
                // ___"pnn": "Andre"
                // ___"pt": "Foliage" (STATIC)
                // ___"pv": "Parlor Palm"
                // ___"plantUid": "f3"
                // ___"sn": "Chamaedorea elegans"
                    // ___light: "Medium" (STATIC)
                // ___date added (to db/app) (TIMESTAMP PHP)
                // ___last water date (CALC FROM USER INPUT)
                // ___next water date (CALC FROM USER INPUT)
                */



// JSON db anitasallplants
$d = file_get_contents('anitaAllPlants.json');
$d = json_decode( $d, true );

$af = count($d);
++$af;

$d[$af] = $_POST;
$pnn = $_POST['pnn'];
$pt = $_POST['pt'];

$wyn = $_POST['wyn'];

$lwd = $_POST['wyn'];//"first last water date"
//$nwd (next water date) determined by plant type, function
$_SESSION['addD'] = $addD;
$addD = date('D m/d/Y'); //date first added to system

$pv = $_POST['fSearch'];
$pv = $_POST['sSearch'];

echo $pt.'<br>';

/* 
    I want each object in the JSON data file to be as follows
    $af = array(
        "pt" => $pt,
        "pv" => $pv,
        "pnn" => $pnn,
        "initialDate" => $wnsd or $wysd
        "nextWaterDate" => $nwd,
        "dateAdded" => $addD,
    );
*/

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
mkdir ('users/'.$a.'/'.$pnn);
$img = 'users/'.$a.'/'.$pnn.'/'.$pnn.'.jpg';
move_uploaded_file( $tmp, $img );

if( $pt == 'Foliage'){
    if( $wyn == 'yes' ){
        echo $wyn.'<br>';
        $wstart = $_POST['wysd'];
        // static $nwd;
        } else{
            $wstart = $_POST['wnsd'];
            static $nwd;
            };
        $nwd = whatNextDateF($wstart);
        var_dump($nwd);
        return $nwd;
    } else {
    if( $wyn == 'yes' ){
        // echo $wyn.'<br>';
        $wstart = $_POST['wysd'];
        static $nwd;
        } else{
            // echo $wyn.'<br>';
            $wstart = $_POST['wnsd'];
            static $nwd;
        };
    $nwd = whatNextDateS($wstart);
    return $nwd;
};


function whatNextDateF( $wstart ){
    $fcon = substr( $wstart , -10);
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
    // var_dump( $nwd );
    return $nwd;
};

function whatNextDateS( $wstart ){
    $fcon = substr( $wstart , -10);
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("21 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
    return $nwd;
};





// $_SESSION['eachPlant'] = array();



/*
array_push($_SESSION['eachPlant'], $pnn...
*/
$d[$af]['photo'] = $img;

$d = json_encode( $d );
file_put_contents('anitaAllPlants.json', $d );

// header('location:plantProfile.php');

?>