<?php

    include "../conn.php";
    @session_start();

    // calidasi capcha
    if ($_SESSION['code'] !== $_POST['kode']) {
        $_SESSION['signin_status'] = false;
        $_SESSION['signin_message'] = "Captcha yang anda masukkan salah!";
        header('Location: '.$host.'signin.php' );
        exit;
    }

    // cek password apabila kosong
    if (empty(@$_POST['password']) || empty(@$_POST['email'])) {
        $_SESSION['signin_status'] = false;
        $_SESSION['signin_message'] = "Email & Password tidak boleh kosong!";
        header('Location: '.$host.'signin.php' );
        exit;
    }
    $email = @$_POST['email'];
    $password = sha1(@$_POST['password']);

    // validasi email
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        $_SESSION['signin_status'] = false;
        $_SESSION['signin_message'] = "Email tidak valid!";
        header('Location: '.$host.'signin.php' );
        exit;
    }
    $sql = "SELECT * FROM users where email = '$email' and password = '$password'";
    $q = sprintf($sql, mysqli_real_escape_string($conn, $email));
    $result = $conn->query($q);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            session_start();
            @$_SESSION["id"] = $row['id'];
            @$_SESSION["fullname"] = $row['fullname'];
            @$_SESSION['tipe'] = 'users';

            header('Location: '.$host.'profile.php');
        }
    } else {
        $_SESSION['signin_status'] = false;
        $_SESSION['signin_message'] = "Email & Password salah!";
        header('Location: '.$host.'signin.php' );
        exit;
    }
    $conn->close();


?>