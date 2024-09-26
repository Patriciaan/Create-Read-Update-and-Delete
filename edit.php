<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bandori Character Form</title>
<link rel="stylesheet" href="style2.css"> </head>
<body>
<?php
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);
$id = $_GET['id'];
$retrieve = $db->retrieve("bandori/$id");
$data = json_decode($retrieve, 1);

?>

<form method="post" action="action_edit.php">
<center>
    <h1>Updating Data</h1>
  <table border = "0" width = "500">
    <tr>
        <td>Picture</td>
        <td>:</td>
        <td><input type ="text" name="picture" value="<?php echo $data['imageurl']?>"></td>
    </tr>  
    <tr>
        <td>Character Name</td>
        <td>:</td>
        <td><input type ="text" name="name" value="<?php echo $data['name']?>"></td>
    </tr>
    <tr>
        <td>Voice Actor</td>
        <td>:</td>
        <td><input type ="text" name="actor" value="<?php echo $data['actor']?>"></td>
    </tr>
    <tr>
        <td>Birthday</td>
        <td>:</td>
        <td><input type ="text" name="birthday" value="<?php echo $data['birthday']?>"></td>
    </tr>
    <tr>
        <td>Age</td>
        <td>:</td>
        <td><input type ="text" name="age" value="<?php echo $data['age']?>"></td>
    </tr>
    <tr>
        <td>Height</td>
        <td>:</td>
        <td><input type ="text" name="height" value="<?php echo $data['height']?>"></td>
    </tr>
    <tr>
        <td>Band</td>
        <td>:</td> 
        <td><input type ="text" name="band" value="<?php echo $data['band']?>"></td>
    </tr>
    <tr>
        <td>Band Genre</td>
        <td>:</td>
        <td><input type ="text" name="genre" value="<?php echo $data['genre']?>"></td>
    </tr>
    <tr>
        <td>Role</td>
        <td>:</td>
        <td><input type ="text" name="role" value="<?php echo $data['role']?>"></td>
    </tr>
    <tr>
        <td>Attributes</td>
        <td>:</td>
        <td><input type ="text" name="attributes" value="<?php echo $data['attributes']?>"></td>
    </tr>

    <tr>
        <td>
            <input type = "hidden" name="id" value="<?php echo $id?>">
            <input type = "submit" value ="SAVE">
        </td>
    </tr>

  </table>  
</center> 
</form>