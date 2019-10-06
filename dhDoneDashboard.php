<?php session_start();
include 'classes/foliage.class.php';
include 'classes/succulent.class.php';


// WORKING FINAL DON"T TOUCH
// echo $_SERVER['REQUEST_METHOD'];
// var_dump($_POST);

$plantdata = file_get_contents('anitaAllFoliage.json');
$plantdata = json_decode($plantdata, true);

//CAPTURE POSTED DATA
$plantid = $_POST['plantid']; 
$plantdatann = $_POST['pnn'];
$ontime = $_POST['ontime']; //if it has been watered on time? true false (string)
$timestamp = $_POST['ts']; //timestamp

$tp = array();
$tp = $plantdata[$plantid]; 


//TIMESTAMP to workable string
$timestamp = substr($timestamp, 0, 15);
// echo $timestamp;
// echo '<br>';

//frequency of days to next water date
$fq = $tp['fq']; 
        // echo $fq; //frequency; string '7 days'

if ( $_POST['ontime'] != 'true'){ //this is when it is past due
        $wateredOn = date_create( $timestamp );
        $update = date_create( $nwd );
        $dayspastdue = date_diff($wateredOn, $update);
        $dayspastdue = date_interval_format($dayspastdue, '%a');
        $_SESSION['dpd'] = $dayspastdue;
        // echo $dayspastdue;
        // echo '<br>';
        $_SESSION['lwd'] = $lwd = date_format($wateredOn, "D m/d/Y");
        $nwd = date_add($wateredOn, date_interval_create_from_date_string($fq));
        $nwd = date_format($nwd, "D m/d/Y"); 
        $_SESSION['nwd'] = $nwd;
        // echo '<br>';
        // echo 'this is past due '.$dayspastdue.' day(s); $lwd updated successfully<br>';

} else{ //when ontime is true; watered on time
        $wateredOn = date_create($timestamp);
        $lwd = date_format($wateredOn, "D m/d/y");
        $nwd = date_add($wateredOn, date_interval_create_from_date_string($fq));
        $nwd = date_format($nwd, "D m/d/Y");
        // var_dump($nd);
        $_SESSION['lwd'] = $lwd;
        $_SESSION['nwd'] = $nwd;
        echo 'Watered on time!';
        $dayspastdue = '0';
        $_SESSION['dpd'] = $dayspastdue;
}

echo 'last watered date: '.$lwd.'<br><br>next water date: '.$nwd.'<br><br>days past due: '.$dayspastdue;

$plantdata[$plantid]['nwd'] = $_SESSION['nwd'];
$plantdata[$plantid]['lwd'] = $_SESSION['lwd'];

// $dayspastdue; // store in each plant's file;

$plantdata = json_encode($plantdata);
file_put_contents('anitaAllFoliage.json', $plantdata);

?>
