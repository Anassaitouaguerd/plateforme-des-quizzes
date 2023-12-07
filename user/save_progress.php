<?php
session_start();
require "../connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user'];
    $courseId = $_POST["courseId"];
    $progress = $_POST["progress"];

    $checkProgressQuery = "SELECT * FROM progressuser WHERE userID = '$userId' AND courseId = '$courseId'";
    $checkResult = mysqli_query($conn, $checkProgressQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        $updateProgressQuery = "UPDATE progressuser SET progress = '$progress' WHERE userID = '$userId' AND courseId = '$courseId'";
        $updateResult = mysqli_query($conn, $updateProgressQuery);

        if ($updateResult) {
            echo "success";
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Error updating progress: " . mysqli_error($conn);
        }
    } else {
        $insertProgressQuery = "INSERT INTO progressuser (userID, courseId, progress) VALUES ('$userId', '$courseId', '$progress')";
        $insertResult = mysqli_query($conn, $insertProgressQuery);

        if ($insertResult) {
            echo "success";
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            echo "Error inserting progress: " . mysqli_error($conn);
        }
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
}

mysqli_close($conn);
?>
