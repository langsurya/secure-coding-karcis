<?php
include "../conn.php";

@session_start();

$id_user = mysqli_real_escape_string($conn,htmlentities(@$_SESSION['id']));
$feedback = mysqli_real_escape_string($conn,htmlentities(@$_POST['feedback']));


// insert table feedback
$sql = sprintf("INSERT INTO feedbacks (id_user, feedback) VALUES ('$id_user', '$feedback')");

if ($conn->query($sql) === TRUE) {

    header('Location: ' . $host . 'feedback.php?status=success');
} else {
    echo ("Error description: " . mysqli_error($conn));
}
