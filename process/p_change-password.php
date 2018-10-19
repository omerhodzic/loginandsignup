<?php

require_once '../config.php';

if(isset($_POST['change_password'])) { 

    $errors = array();

    $old_password = filter_input(INPUT_POST, 'old_password', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    // Old password
    if(strlen($old_password) > 20 || strlen($old_password) < 5){

        $errors['old_password_err'] = 'Password min limit is 5 & max is 20 characters';

    } else if (!password_verify($old_password, $user->password)) {

        $errors['old_password_err'] = 'Old password incorrect please enter valid password';

    }

    // New password
    if(strlen($password) > 20 || strlen($password) < 5 ) {

        $errors['password_err'] = 'Password min limit is 5 & max is 20 characters';

    }

    //Confirm new password
    if($password != $confirm_password || empty($confirm_password)) {

        $errors['confirm_pass_err'] = 'Password dont match';

    }

    if(!count($errors)) {

        $stmt = $objDB->prepare('UPDATE users SET password=? WHERE id=?');

        $stmt->bind_param('si', password_hash($password, PASSWORD_DEFAULT), $user->id);

        if($stmt->execute()) {
            unset($_SESSION['user']);
            redirect('password-successfully-changed.php');
            exit();
        }


    } else {

        $data = [

            'old_password' => $old_password,
            'password' => $password,
            'confirm_password' => $confirm_password,
        ];

        setMsg('errors', $errors);
        setMsg('form_data', $data);
        redirect('change-password.php');

    }

}

?>