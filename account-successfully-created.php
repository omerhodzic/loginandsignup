<?php require_once 'includes/header.php'; ?>

    <div class="row">

        <div class="col-7">

            <div class="container-bg-login"></div>

        </div>

        <div class="col-5">

            <div class="success-message text-center mt-20rem">
                
                <div class="title">
                    <h3>Your account <br>is successfully created.</h3>
                </div>

                <div class="verify-text">
                    <h4>Before start to using your account,<br>you must activate first.</h4>
                </div>

                <div class="verify-link mt-3rem">
                    <a class="btn-verified" href="<?php echo(URLROOT)?>/request-account-activation.php">Please click here to activate.</a>
                </div>

            </div>


        </div>

    </div>



<?php require_once 'includes/footer.php'; ?>