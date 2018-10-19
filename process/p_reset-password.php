<?php

require_once '../config.php';

if(isset($_POST['reset_password'])) {

    $errors = array();

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    if(strlen($password) > 20 || strlen($password) < 5 ) {

        $errors['password_err'] = 'Password min limit is 5 & max is 20 characters';

    }

    if($password != $confirm_password || empty($confirm_password)) {

        $errors['confirm_pass_err'] = 'Password dont match';

    }

    if(!count($errors)) {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $code = $_SESSION['reset_code'];

        $stmt = $objDB->prepare("UPDATE users SET reset_code='', is_active=1, password=? WHERE reset_code=?");

        $stmt->bind_param('ss', $password, $code);

        if($stmt->execute()) {
            redirect('password-successfully-reset.php');
        }

    } else {

        $data = [

            'password' => $password,
            'confirm_password' => $confirm_password,

        ];


        setMsg('errors', $errors);
        setMsg('data', $data);

        redirect('reset-password.php');

    }

}



?>