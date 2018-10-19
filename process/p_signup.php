<?php

require_once '../config.php';

if(isset($_POST['signup'])) {

    $errors = array();

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // username
    if(strlen($username) > 15 || strlen($username) < 5) {

        $errors['username_err'] = "Username cannot be less than 5 character and 15 character long";

    } else if(checkByUsername($username)) {

        $errors['username_err'] = "Username already exist";

    }
    
    // email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 

    if(!preg_match($reg_email, $email)){

        $errors['email_err'] = 'Enetered email is invalid';

    } else if(checkByEmail($email)){

         $errors['email_err'] = 'Email already exists';

    }

    //password 

    if(strlen($password) > 20 || strlen($password) < 5){

        $errors['password_err'] = 'Password min limit is 5 & max is 20 characters';

    }

    if(!count($errors)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $code = md5(crypt(rand(),'aa'));

        $stmt = $objDB->prepare('INSERT INTO users(username, email, password, created_at, reset_code) VALUES(?, ?, ?, ?, ?)');
        $stmt->bind_param('sssis', $username, $email, $password, time(), $code);

        if($stmt->execute()) {
            redirect('account-successfully-created.php');
        }

    } else {

        $data = [

            'username' => $username,
            'email' => $email,
            'passwrod' => $password,

        ];

        setMsg('form_data', $data);
        setMsg('errors', $errors);

        redirect('signup.php');

    }

}










?>