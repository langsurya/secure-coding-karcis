<?php
include "header.php";
?>

<div class="login-clean">
        <form method="post" action="<?php echo $host;?>function/actSignin.php">
             <!-- if signup failed -->
             <?php

             $status = $_SESSION['signin_status'] ?? false;
             $msg = $_SESSION['signin_message'] ?? '';

             unset($_SESSION['signin_status']);
             unset($_SESSION['signin_message']);
             
             if ($status) { ?>
                <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)"><?=$msg?></b>
            <?php } else { ?>
                <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)"><?=$msg?></b>
             <?php } ?>
            <!--  -->

            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <i class="fa fa-ticket"></i>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <img class="form-control" src="<?= $host ?>function/captcha.php" alt="gambar" />
            </div>
            <div class="form-group">
                <input class="form-control" name="kode" value="" placeholder="kode captcha" maxlength="5"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Sign In</button>
            </div>
            <a class="forgot" href="forgotPassword.php">Forgot your email or password?</a></form>
</div>

<?php
include "footer.php";
?>