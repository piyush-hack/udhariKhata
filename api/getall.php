<?php

$obj = new stdClass();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('dbconnect.php');

    $params = json_decode(file_get_contents("php://input"), true);
    if ($params != null){
        $_POST = $params;
    }



    $filter = $_POST["filter"];


    $sql = "SELECT * FROM borrowers";
    // WHERE status='$filter' ";

    // try {
            $result3 = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $files = mysqli_fetch_all($result3, MYSQLI_ASSOC);
            $obj->data = $files;
            $obj->statusCode = 200;
            $obj->statusMessage = "Saved";
        
    // } catch (error) {
    //     $obj->statusCode = 202;
    //     $obj->statusMessage = "Invalid data";
    // }
} else {
    $obj->statusCode = 400;
    $obj->statusMessage = "Invalid request type";
}
echo json_encode($obj);
