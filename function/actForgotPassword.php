<?php
    include "../conn.php";

    if (empty(@$_POST['email'])) {
        header('location:'.$host.'forgotPassword.php?status=failed');exit;
    }

    $email = htmlentities(@$_POST['email']);
    $hash = sha1($email);
    $link = $host."resetPassword.php?hash=".$hash;

    
    $sql = "INSERT INTO forgot_password (email, hash, link) VALUES ('$email', '$hash', '$link')";
    $q = sprintf($sql, mysqli_real_escape_string($conn, $email));

    if ($conn->query($q) === TRUE) {
        header('location:'.$host.'confirmation.php?hash='.$hash);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>