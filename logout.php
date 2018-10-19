<?php

require_once 'config.php';

if(isUserLoggedIn()) {

    if(isset($_GET['user'])) {

        setcookie('user', '', time() - (86400 * 30), '/');

    }

    if(isset($_SESSION['user'])) {

        unset($_SESSION['user']);

    }

    redirect('login.php');

}


?>