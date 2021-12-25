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




    $date = $_POST["date"];
    $fav = $_POST["fav"];
    $sql = "UPDATE borrowers SET fav='$fav' WHERE date= '$date' ";

    // try {
        $result3 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $obj->statusCode = 200;
        $obj->statusMessage = "Updated";
    // } catch (error) {
    //     $obj->statusCode = 202;
    //     $obj->statusMessage = "Invalid data";
    // }
} else {
    $obj->statusCode = 400;
    $obj->statusMessage = "Invalid request type";
}
echo json_encode($obj);
