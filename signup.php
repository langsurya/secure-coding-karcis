<?php
include "header.php";
?>

<div class="login-clean">
        <form method="post" action="<?php echo $host;?>function/actSignup.php">
            <h2 class="sr-only">Login Form</h2>
            <!-- if signup failed -->
            <?php
            $status = $_SESSION['signup_status'] ?? false;
            $msg = $_SESSION['signup_message'] ?? '';

            unset($_SESSION['signup_message']);
            unset($_SESSION['signup_message']);

            if ($status==false) { ?>
                <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)"><?= $msg; ?></b>
            <?php } ?>
            <!--  -->
            <div class="illustration"><i class="fa fa-ticket"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="fullname" placeholder="Nama Lengkap"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up</button></div><a class="forgot" href="#">Forgot your email or password?</a></form>
    </div>
    
<?php
include "footer.php";
?>