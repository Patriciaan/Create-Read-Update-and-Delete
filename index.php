<?php
session_start();
if (isset($_SESSION['status'])) {
    echo "<h5>" . $_SESSION['status'] . "</h5>";
    unset($_SESSION['status']);
}

include("config.php");
include("firebaseRDB.php");

$db = new firebaseRDB($databaseURL);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Firebase Data Entry</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
        <h1>BanG Dream! Girls Band Party</h1>
        <a href="add.php"><button>ADD DATA</button></a>

        <table border="1" width="1000" style="background-color: rgba(255, 255, 255, 0.8); text-align: center;">
            <tr>
                <td>Picture</td>
                <td>Character Name</td>
                <td>Voice Actor</td>
                <td>Birthday</td>
                <td>Age</td>
                <td>Height</td>
                <td>Band</td>
                <td>Band Genre</td>
                <td>Role</td>
                <td>Attributes</td>
                <td colspan="2">Action</td>
            </tr>

            <?php
            $data = $db->retrieve("bandori");
            $data = json_decode($data, true);

            if (is_array($data)) {
                foreach ($data as $id => $bandori) {
                    echo "<tr>
                       <td><img src='{$bandori['imageurl']}' width='200' height='200'></td>
                       <td>{$bandori['name']}</td>
                       <td>{$bandori['actor']}</td>
                       <td>{$bandori['birthday']}</td>
                       <td>{$bandori['age']}</td>
                       <td>{$bandori['height']}</td>
                       <td>{$bandori['band']}</td>
                       <td>{$bandori['genre']}</td>
                       <td>{$bandori['role']}</td>
                       <td>{$bandori['attributes']}</td>
                       <td><a href='edit.php?id=$id'>EDIT</a></td>
                       <td><a href='delete.php?id=$id'>DELETE</a></td>
                    </tr>";
                }
            }
            ?>
        </table>
    </center>
</body>
</html>
