<?php
    include "../conn.php";

    // validasi email
    if (empty(@$_POST['email']) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('location:'.$host.'forgotPassword.php?status=failed');exit;
    }

    $email = mysqli_real_escape_string($conn, htmlentities(@$_POST['email']));
    $hash = sha1($email);
    $link = mysqli_real_escape_string($conn, $host."resetPassword.php?hash=".$hash);

    
    $sql = sprintf("INSERT INTO forgot_password (email, hash, link) VALUES ('$email', '$hash', '$link')");

    if ($conn->query($q) === TRUE) {
        header('location:'.$host.'confirmation.php?hash='.$hash);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>