<?php session_start();
include 'classes/foliage.class.php';

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode( $plantdata, true );

// var_dump( $_POST);
//post = ["pnn"]=> string(5) "Bjork" ["plantvarietyF"]=> string(10) "Corn Plant" ["wyn"]=> string(2) "no" ["wsd"]=> string(14) "Wed 10/02/2019"


$index= count( $plantdata );

$index++;

$plantid = array_keys($plantdata);
// var_dump(array_keys($plantdata));

$plantid = max($plantid) + 1;
// var_dump( $plantid );
// var_dump( $uid );

$_SESSION['wyn'] = $wyn = $_POST['wyn'];
$_SESSION['pnn'] = $pnn = $_POST['pnn']; //nickname
$_SESSION['pv'] = $pv = $_POST['plantvarietyF']; //plant variety
$_SESSION['addedOn'] = $addedOn = date('D m/d/Y');

// IMAGE
$tmp = $_FILES['photo']['tmp_name']; // upload file capture
mkdir ('yourplants/'.$plantid);
$img = 'yourplants/'.$plantid.'/mainpic.jpg';
move_uploaded_file( $tmp, $img );
$_SESSION['img'] = $img;

function nextWaterDate( $lwd ){
    $fcon = substr( $lwd , -10);
    // global $nwd;
    $nwd = date_create( $fcon );
    $nwd = date_add( $nwd, date_interval_create_from_date_string("7 days"));
    $nwd = date_format($nwd, 'D m/d/Y');
                // var_dump( $nwd );
    return $nwd;
};

if ($wyn == 'yes' && isset($_POST['lwd'])){
    $_SESSION['lwd'] = $lwd = $_POST['lwd'];
    $_SESSION['wsd'] = $wsd = $lwd;
    $nwd = nextWaterDate( $lwd );
    $_SESSION['nwd'] = $nwd;
} else {
    $_SESSION['wsd'] = $wsd = $_POST['wsd'];
    $_SESSION['nwd'] = $nwd = $wsd;
    $_SESSION['lwd'] = $lwd = '';
};

$_SESSION['plantid'] = $plantid;

$tp = new Foliage ($pnn, $pv, $nwd, $lwd, $wsd, $addedOn, $img);

// $plantdata[$uid] = $tp;
$plantdata[] = $tp;
// var_dump( $plantdata[$uid] );
// echo '<br>';
// echo '<br>';
// var_dump( $tp );
// echo '<br>';
// echo '<br>';
// var_dump( $uid );

$plantdata = json_encode($plantdata);
file_put_contents('anitaAllFoliage.json', $plantdata);


header('location:plantProfile.php?'.$_SESSION['plantid']);
?>