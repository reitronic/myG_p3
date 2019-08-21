<?php session_start();
$_SESSION['a'] = $a = 'Anita';


$uid = $_SERVER['QUERY_STRING'];


$sc = file_get_contents("anitaAllSucculents.json");
$sc = json_decode( $sc, true );









$sc = json_encode($sc);
file_put_contents('anitaAllSucculents.json', $sc);

?>