<?php require_once 'includes/header.php'; ?>

    <div class="row">

        <div class="col-7">

            <div class="container-bg-login"></div>

        </div>

        <?php 
        
        $err = getMsg('errors');
        $data = getMsg('form_data');
        
        ?>

        <div class="col-5">

            <div class="form-title">
                <h2>Log <span>in</span></h2>
            </div>

            <form class="mt-8rem" id="login-form" action="<?php echo(URLROOT)?>/process/p_login.php" method="post">

                <div class="form-group">
                  <label for="username">User<span>name</span></label>
                  <input type="text" name="username" value="<?php echo($data['username']); ?>" class="form-control mt-1rem <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your username">
                  <p class="invalid-feedback"><?php echo($err['username_err']); ?></p>
                </div>

                <div class="form-group mt-2rem">
                    <label for="password">Pass<span>word</span></label>
                    <input type="password" name="password" value="<?php echo($data['password']); ?>" class="form-control mt-1rem <?php echo(isset($err['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Your password">
                    <p class="invalid-feedback"><?php echo($err['password_err']); ?></p>
                </div>

                <div class="row mt-2rem">
                    <div class="col">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember-me">
                            <label class="label-check" for="exampleCheck1">Remember Me</label>
                        </div>
                    </div>
                    <div class="col">
                        <a href="<?php echo(URLROOT)?>/forget-password.php" class="forget-pass-link float-right">Forget Passsword?</a>
                    </div>
                </div>
                

                <div class="row">

                    <div class='col mt-2rem'>
                    
                        <input type='submit' name='login' value='Log in' class='btn btn-info btn-login'>

                        <div class="mt-2rem">
                        <?php echo getMsg('msg_notify');?>
                        </div>
                    
                    </div>

                </div>

                <div class="row">

                    <div class='col mt-2rem'>

                        <p class="sign-up-link text-center">Don't have an account?<a href="<?php echo(URLROOT)?>/signup.php"> Sign up</a></p>

                    </div>
                    
                </div>

            </form>


        </div>

    </div>

<?php require_once 'includes/footer.php'; ?>