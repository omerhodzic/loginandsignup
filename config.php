<?php

session_start();

// Database info
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'teamly');

// URLROOT
define('URLROOT', 'http://localhost/teamly');

//APPROOT
define('APPROOT', dirname(__FILE__));

require_once 'functions.php';

// Make a connetion
$objDB = objDB();



// public pages

$public_pages = [

    '/teamly/login.php',
    '/teamly/signup.php',
    '/teamly/forget-password.php',
    '/teamly/account-successfully-created.php',
    '/teamly/request-account-activation.php',

];

// restricted_pages

$restricted_pages = [

    '/teamly/logout.php',
    '/teamly/view-profile.php',
    '/teamly/edit-profile.php',
    '/teamly/change-password.php',

];

if(!isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $restricted_pages, true)) {

    redirect('permission.php');
    exit();

}

if(isUserLoggedIn() && in_array($_SERVER['REQUEST_URI'], $public_pages, true)) {

    redirect('view-profile.php');
    exit();

}


// cookie

if(isset($_SESSION['user']) || isset($_COOKIE['user'])){

    $user = isset($_COOKIE['user']) ? unserialize($_COOKIE['user']) : $_SESSION['user'];

} else {

    $user = '';

}


?>