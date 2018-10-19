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
                <h2>Forget<span>password</span></h2>
            </div>

            <form class="mt-8rem" id="login-form" action="<?php echo(URLROOT)?>/process/p_forget-password.php" method="post">

                <div class="form-group">
                  <label for="email">Email<span>address</span></label>
                  <input type="text" name="email" value="" class="form-control mt-1rem <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your email">
                  <p class="invalid-feedback"><?php echo($err['email_err']); ?></p>
                </div>
                

                <div class="row">

                    <div class='col mt-2rem'>
                    
                        <input type='submit' name='reset_request' value='Request reset password' class='btn btn-info btn-login'>

                    
                    </div>

                </div>

                <div class="row">

                    <div class='col mt-2rem'>

                        <p class="sign-up-link text-center"><a href="<?php echo(URLROOT)?>/login.php"> Back to login</a></p>

                    </div>
                    
                </div>

            </form>


        </div>

    </div>

<?php require_once 'includes/footer.php'; ?>