<?php
    include "../conn.php";

    $fullname = htmlspecialchars(@$_POST['fullname']);
    $email    = htmlspecialchars(@$_POST['email']);
    $password  = sha1(@$_POST['password']);

    // insert to database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $sql_profile = "INSERT INTO user_profile (id_user,fullname) VALUES ('$conn->insert_id','$fullname')";
        if($conn->query($sql_profile) === TRUE){
            
            header('location:'.$host.'signin.php?status=success');
        } else {;
            echo("Error description: " . mysqli_error($conn));
        }  
    } 


?>
