<?php 

// connection to DB
function objDB() {

    $objDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if($objDB->connect_error) {

        die("Connection failed");

    }

    return $objDB;

}

// check by email 
function checkByEmail($email) {

    $objDB = objDB();

    $stmt = $objDB->prepare('SELECT * FROM users WHERE email=?');

    $stmt->bind_param('s', $email);

    $stmt->execute();

    $stmt->store_result();

    return $stmt->num_rows;

}

// check by username 
function checkByUsername($username) {

    $objDB = objDB();

    $stmt = $objDB->prepare('SELECT * FROM users WHERE username=?');

    $stmt->bind_param('s', $username);

    $stmt->execute();

    $stmt->store_result();

    return $stmt->num_rows;

}

// check by user activate
function checkByActivation($username) {

    $objDB = objDB();

    $stmt = $objDB->prepare('SELECT * FROM users WHERE username=? AND is_active=1');

    $stmt->bind_param('s', $username);

    $stmt->execute();

    $stmt->store_result();

    return $stmt->num_rows;

}

// check user by ID

function checkByID($user_id) {

    $objDB = objDB();

    $stmt = $objDB->prepare('SELECT * FROM users WHERE id=?');

    $stmt->bind_param('i', $user_id);
    
    $stmt->execute();

    //get the data
    $result = $stmt->get_result();
    
    return $result->fetch_object();

}

//check user by code

function checkByCode($code) {

    $objDB = objDB();

    $stmt = $objDB->prepare('SELECT * FROM users WHERE reset_code=?');

    $stmt->bind_param('s', $code);

    $stmt->execute();

    $stmt->store_result();

    return $stmt->num_rows();

}

//verify user

function verifyUser($code) {

    $objDB = objDB();

    $stmt = $objDB->prepare("UPDATE users SET is_active=1 WHERE reset_code=?");

    $stmt->bind_param('s', $code);

    $stmt->execute();

    $stmt->store_result();

    return $stmt->affected_rows;

}

// redirect

function redirect($file) {
    header("Location:".URLROOT.'/'.$file);
}

// set & get Msg

function setMsg($name, $value, $class = 'success') {

    if(is_array($value)) {
        $_SESSION[$name] = $value;
    } else {
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }

}

function getMsg($name) {

    if(isset($_SESSION[$name])){
        $session=$_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
    
}

// format date 24 June, 2018

function fDate($timestamp) {
    return date('j F, Y', $timestamp);
}
 
// Logged in

function isUserLoggedIn() {

    if(isset($_SESSION['user']) || isset($_COOKIE['user'])) {

        return true;

    } else {

        return false;

    }
}


// upload images

function upload_image($image) {

    //create image directory if doesn't exists    
    if(!is_dir(APPROOT.'/img')){

        mkdir(APPROOT.'/img');

    }

    if($image['error'] == 4) {

        die('Image file not uploaded');

    }

    if($image['type'] != 'image/png') {

        die('Only PNG allowed');

    }

    $image_info = pathinfo($image['name']);

    extract($image_info);

    $image_convention = $filename. time() . ".$extension";

    if(move_uploaded_file($image['tmp_name'], APPROOT. "/img/" .$image_convention)) {

        return $image_convention;

    } else {
        
        return false;

    }
}

?>