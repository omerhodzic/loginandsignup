<?php require_once 'includes/header.php'; ?>

    <div class="row">

        <div class="col-7">

            <div class="container-bg-login"></div>

        </div>

        <?php
            
                //getting errors on form
                $err = getMsg('errors');
              
                //getting data back which was entered on form
                $data = getMsg('form_data');
            ?>

        <div class="col-5">

            <div class="form-title">
                <h2>Reset<span>password</span></h2>
            </div>

            <form class="mt-8rem" id="login-form" action="<?php echo(URLROOT)?>/process/p_reset-password.php" method="post">

                <div class="form-group">
                  <label for="password">New<span>password</span></label>
                  <input type="password" name="password" value="" class="form-control mt-1rem <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="New password">
                  <p class="invalid-feedback"><?php echo($err['password_err']); ?></p>
                </div>

                <div class="form-group mt-2rem">
                  <label for="password">Confirm<span>password</span></label>
                  <input type="password" name="confirm_password" value="" class="form-control mt-1rem <?php echo(isset($err['confirm_pass_err'])) ? 'is-invalid' : ''; ?>" placeholder="Confirm password">
                  <p class="invalid-feedback"><?php echo($err['confirm_pass_err']); ?></p>
                </div>
                

                <div class="row">

                    <div class='col mt-2rem'>
                    
                        <input type='submit' name='reset_password' value='Reset password' class='btn btn-info btn-login'>

                    
                    </div>

                </div>

            </form>


        </div>

    </div>

<?php require_once 'includes/footer.php'; ?>