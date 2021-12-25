<?php

$obj = new stdClass();

if (empty($_SERVER['CONTENT_TYPE'])) {
    $_SERVER['CONTENT_TYPE'] = "application/x-www-form-urlencoded";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('dbconnect.php');

    $params = json_decode(file_get_contents("php://input"), true);
    if ($params != null)
        $_POST = $params;


    $name = $_POST["name"];
    $date = $_POST["date"];

    $rupee = "";
    if (isset($_POST["rupee"])) {
        $rupee = $_POST["rupee"];
    }

    $desc = "";
    if (isset($_POST["desc"])) {
        $desc = $_POST["desc"];
    }

    $status = $_POST["status"];
    $fav = " ";
    $sql = "INSERT INTO borrowers (name, date, amount, 	description , status, fav) VALUES ('$name', '$date', '$rupee', '$desc', '$status', '$fav')";

    // try {
        if (mysqli_query($conn, $sql) or die(mysqli_error($conn))) {
            $obj->statusCode = 200;
            $obj->statusMessage = "Saved";
        } else {
            $obj->statusCode = 202;
            $obj->statusMessage = "Invalid data";
        }
    // } catch (error) {
    //     $obj->statusCode = 202;
    //     $obj->statusMessage = "Invalid data";
    // }
} else {
    $obj->statusCode = 400;
    $obj->statusMessage = "Invalid request type";
}
echo json_encode($obj);
