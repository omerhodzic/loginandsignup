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
                    <a class="nav-link" href="<?php echo(URLROOT)?>/edit-profile.php">Edit profile</a>
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

    <div class="row text-center">
        <div class="col">
            <div class="profile-pic">

                <?php if(empty($user->image)): ?>
                <img src="img/profile-pic.png" alt="">
                <?php else: ?>
                <img src="<?= URLROOT.'/img/'.$user->image ?>" alt="">
                <?php endif;?>

            </div>
        </div>
    </div>

    <div class="row text-center mt-3rem">

        <div class="col">
            <div class="user-name">
                <h2 class="text-data"><?php echo($user->name)?></h2>
            </div>
        </div>

    </div>

    <div class="row text-center mt-5rem mb-5rem">
        <div class="col-3">
            <div class="user-info">
                <img class="user-icon" src="img/user.svg">
                <h4>Username</h4>
                <p class="text-data">@<?php echo($user->username);?></p>
            </div>
        </div>
        <div class="col-3">
            <div class="user-info">
                <img class="user-icon" src="img/worldwide.svg">
                <h4>Website</h4>
                <p class="text-data"><?php echo($user->website);?></p>
            </div>
        </div>
        <div class="col-3">
            <div class="user-info">
                <img class="user-icon" src="img/envelope.svg">
                <h4>Email</h4>
                <p class="text-data"><?php echo($user->email);?></p>
            </div>
        </div>
        <div class="col-3">
            <div class="user-info">
                <img class="user-icon" src="img/calendar.svg">
                <h4>Profile created</h4>
                <p class="text-data"><?php echo(fDate($user->created_at));?></p>
            </div>
        </div>
    </div>


<?php require_once 'includes/footer.php';?>