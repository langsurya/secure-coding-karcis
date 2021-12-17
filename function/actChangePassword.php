<?php
include "../conn.php";

@session_start();

$id = @$_SESSION['id'];

if(!$id){
    header('location:'.$host.'signin.php');
}

$password = sha1($_POST['password']);

// update data
$user = "UPDATE users SET password = '$password' WHERE id = $id";
$conn->query($user);


if($conn->query($user) === FALSE){
    header('Location: '.$host.'changePassword.php?status=failed' );
}

header('Location: '.$host.'changePassword.php?status=success');


