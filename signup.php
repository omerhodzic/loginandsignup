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

            <div class="form-title-signup">
                <h2>Sign <span>up</span></h2>
            </div>

            <form class="mt-5rem" id="signup-form" action="<?php echo(URLROOT) ?>/process/p_signup.php" method="post">

                <div class="form-group">
                  <label for="username">User<span>name</span></label>
                  <input type="text" name="username" value="<?php echo($data['username']); ?>" class="form-control mt-1rem <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your username">
                  <p class="invalid-feedback"><?php echo($err['username_err']);?></p>
                </div>

                <div class="form-group mt-2rem">
                    <label for="password">Email<span>address</span></label>
                    <input type="text" name="email" value="<?php echo($data['email']); ?>" class="form-control mt-1rem <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your email address">
                    <p class="invalid-feedback"><?php echo($err['email_err']);?></p>
                </div>

                <div class="form-group mt-2rem">
                    <label for="password">Pass<span>word</span></label>
                    <input type="password" name="password" value="<?php echo($data['password']); ?>" class="form-control mt-1rem <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your password">
                    <p class="invalid-feedback"><?php echo($err['password_err']);?></p>
                </div>
                

                <div class="row">

                    <div class='col mt-3rem'>
                    
                        <input type='submit' name='signup' value='Sign up' class='btn btn-info btn-login'>
                    
                    </div>

                </div>

                <div class="row">

                    <div class='col mt-2rem'>

                        <p class="sign-up-link text-center">Already have an account?<a href="<?php echo(URLROOT)?>/login.php"> Log in</a></p>

                    </div>
                    
                </div>

            </form>


        </div>

    </div>

<?php require_once 'includes/footer.php'; ?>