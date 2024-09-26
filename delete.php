<?php
session_start();

include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];

if($id !=""){
    $delete = $db ->delete("bandori",$id);
    echo "Data deleted...";

}

if ($delete) {
    $_SESSION['status'] ='<h2 style="color: white;">Record deleted successfully</h2>';
    header('Location: index.php');
} else {
    $_SESSION['status'] = '<h2 style="color: white;">Record Failed</h2>';
    header('Location: index.php');
}

?>