<?php
    include "../conn.php";
    @session_start();

    $fullname = htmlentities(@$_POST['fullname']);
    $email    = htmlentities(@$_POST['email']);
    $password  = sha1(htmlentities(@$_POST['password']));

    if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {

        $q_cek = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($q_cek);
        // data email sudah ada
        if ($result->num_rows>0) {
            $_SESSION['signin_status'] = true;
            $_SESSION['signin_message'] = "Email sudah terdaftar! Silahkan login!";

            header('location:'.$host.'signin.php');
            exit;
        } else {
            // cek jika fullname kosong
            if ( empty($fullname) ) {
                $_SESSION['signup_status'] = false;
                $_SESSION['signup_message'] = "Fullname Tidak tidak valid!";

                header('Location: '.$host.'signup.php' );
                exit;
            } else {
                // insert to database
                $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

                if ($conn->query($sql) === TRUE) {
                    $sql_profile = "INSERT INTO user_profile (id_user,fullname) VALUES ('$conn->insert_id','$fullname')";
                    if($conn->query($sql_profile) === TRUE){
                        
                        $_SESSION['signin_message'] = true;
                        $_SESSION['signin_message'] = "Signup Success!";
                        header('location:'.$host.'signin.php');
                    } else {;
                        echo("Error description: " . mysqli_error($conn));
                    }  
                } 
            }
        }
    } else {
        if (empty($email) && empty($fullname)) {
            $_SESSION['signup_status'] = false;
            $_SESSION['signup_message'] = "Fullname & Email Tidak tidak valid!";
    
            header('Location: '.$host.'signup.php' );
            exit;
        }
        if (empty($email)) {
            $_SESSION['signup_status'] = false;
            $_SESSION['signup_message'] = "Email Tidak tidak valid!";

            header('Location: '.$host.'signup.php' );
            exit;
        }
    }

?>
