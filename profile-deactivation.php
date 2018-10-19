<?php require_once 'includes/header.php'; ?>

    <div class="row">

        <div class="col-7">

            <div class="container-bg-login"></div>

        </div>

        <div class="col-5 mt-5rem">

            <div class="form-title">
                <h2><span>Deactivate your</span><br>profile.</h2>
                <h4 class="mt-3rem">Please think once more before your finale decision.</h4>
            </div>


            <form  action="<?php echo(URLROOT)?>/process/p_deactivate-profile.php" class="btn-deactivate" method="post">

                <input type='submit' name='deactivate' value='Deactivate your profile' class='btn btn-info btn-login'>

                <h4 class="mt-3rem text-center">Back to <a class="login-link-ver" href="<?php echo(URLROOT)?>/view-profile.php">profile</a>.</h4>

            </form>

        </div>

    </div>

<?php require_once 'includes/footer.php'; ?>