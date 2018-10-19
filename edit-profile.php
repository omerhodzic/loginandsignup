<?php require_once 'includes/header.php';?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand"><img src="img/logo-white.svg"><a href="#">Login<span>and</span>Signup<span>system</span></a></div>
        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavId">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo(URLROOT)?>/view-profile.php">View profile</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo(URLROOT)?>/change-password.php">Change password</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo(URLROOT)?>/profile-deactivation.php">Deactivate profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo(URLROOT)?>/logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="title-bg"></div>

    <div class="row text-center mt-5rem">
        <div class="col">
            <h2 class="section-title">Edit your <span>profile</span></h2>
        </div>
    </div>

     <?php 
            
        //getting errors on form
        $err = getMsg('errors');
              

                
                
    ?>

    <form id="edit-form" action="<?php echo(URLROOT)?>/process/p_edit-profile.php" method="post" enctype="multipart/form-data">

        <div class="row mt-5rem">

        <div class="col-4">

            <div class="form-group">
                  <label for="name">Your full<span>name</span></label>
                  <input type="text" name="name" class="form-control mt-1rem <?php echo(isset($err['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $user->name;?>">
                  <p class="invalid-feedback"><?php echo($err['name_err']);?></p>
            </div>

            <div class="form-group mt-2rem">
                  <label for="username">User<span>name</span></label>
                  <input type="text" name="username" class="form-control mt-1rem <?php echo(isset($err['username_err'])) ? 'is-invalid' : ''; ?>" value="@<?php echo $user->username;?>">
                  <p class="invalid-feedback"><?php echo($err['username_err']);?></p>
            </div>

        </div>

        <div class="col-4">

            <div class="form-group">
                <label for="email">Email<span>address</span></label>
                <input type="text" name="email" class="form-control mt-1rem <?php echo(isset($err['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $user->email;?>">
                <p class="invalid-feedback"><?php echo($err['email_err']);?></p>
            </div>

            <div class="form-group mt-2rem">
                  <label for="website">Web<span>site</span></label>
                  <input type="text" name="website" value="<?php echo $user->website;?>" class="form-control mt-1rem <?php echo(isset($err['website_err'])) ? 'is-invalid' : ''; ?>">
                  <p class="invalid-feedback"><?php echo($err['website_err']);?></p>
            </div>

        </div>

        <div class="col-4">  
                      
            <div class="form-group" id='imageUpload'>
                <label for='url'>Select<span>image</span></label>
                <input type='file' name="image"  class="form-control form-control-lg <?php echo(isset($err['image_err'])) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo($err['image_err']); ?></span>
            </div>

        </div>

        <div class="row">

            <div class='col mt-2rem edit-btn-pad'>

                <input type='submit' name='edit-profile' value='Update profile' class='btn btn-info btn-login'>

            </div>

        </div>

    </form>

    </div>

    

    


<?php require_once 'includes/footer.php';?>