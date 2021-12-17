<?php
include "header.php";

$hash = mysqli_real_escape_string($conn, htmlentities(@$_GET['hash']));

$reset_password = sprintf("SELECT link FROM forgot_password WHERE hash = '$hash'");

$reset_password_result = $conn->query($reset_password);

$r_reset_password = mysqli_fetch_row($reset_password_result);

?>

<div class="login-clean">
<?php if($r_reset_password) { ?>
            <h2 class="sr-only">Reset Password</h2>

            <div class="form-group">
                <a href="http://<?php echo $r_reset_password[0]; ?>">
                    <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                </a>
            </div>

            
            <?php } else {
                echo "Data Not Found, <a href=login.php>Login</a>";
                
            } ?>
</div>
<?php
include "footer.php";
?>