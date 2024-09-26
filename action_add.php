<?php
session_start();
include("config.php");
include("firebaseRDB.php");
$db = new firebaseRDB($databaseURL);

// Function to validate if a field is empty or not
function validateField($value, $fieldName) {
    if (empty($value)) {
        $_SESSION['status'] = "<h2 style='color: white;'>Error: $fieldName cannot be empty</h2>";
        header('Location: index.php');
        exit();
    }
}

// Function to validate if a field is a valid number
function validatePositiveNumber($value, $fieldName) {
    if (!is_numeric($value) || $value < 0) {
        $_SESSION['status'] = "<h2 style='color: white;'>Error: $fieldName must be a positive number</h2>";
        header('Location: index.php');
        exit();
    }
}

// Validate each field
validateField($_POST["picture"], "Image URL");
validateField($_POST['name'], "Name");
validateField($_POST['actor'], "Actor");
validateField($_POST['birthday'], "Birthday");
validatePositiveNumber($_POST['age'], "Age");
validatePositiveNumber($_POST['height'], "Height");
validateField($_POST['band'], "Band");
validateField($_POST['genre'], "Genre");
validateField($_POST['role'], "Role");
validateField($_POST['attributes'], "Attributes");

// If all validations pass, proceed with the insertion
$insert = $db->insert("bandori", [
    "imageurl" => $_POST["picture"],
    "name" => $_POST['name'],
    "actor" => $_POST['actor'],
    "birthday" => $_POST['birthday'],
    "age" => $_POST['age'],
    "height" => $_POST['height'],
    "band" => $_POST['band'],
    "genre" => $_POST['genre'],
    "role" => $_POST['role'],
    "attributes" => $_POST['attributes'],
]); 

// Handle the result of the insertion
if ($insert) {
    $_SESSION['status'] = '<h2 style="color: white;">Record added successfully</h2>';
    header('Location: index.php');
} else {
    $_SESSION['status'] = '<h2 style="color: white;">Record Failed</h2>';
    header('Location: index.php');
}
?>
