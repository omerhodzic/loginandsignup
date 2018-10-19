<?php 

require_once '../config.php';

if(isset($_POST['request-code'])) {

    //Main errors array
    $errors = array();
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 
     
    if(!preg_match($reg_email, $email)){

        $errors['email_err'] = 'Entered email is invalid';

    } else if (!checkByEmail($email)){

         $errors['email_err'] = 'Email not found.';

    }

    if(!count($errors)) {

        $code = md5(crypt(rand(),'aa'));

        $objDB = objDB();

        $stmt = $objDB->prepare('UPDATE users SET reset_code=? WHERE email=?');

        $stmt->bind_param('ss', $code, $email);

        if($stmt->execute()) {

            redirect("process/p_verify-account.php?code=$code");

        }



    } else {

        setMsg('form_data', $data);
        setMsg('errors', $errors); 

        redirect('request-account-activation.php');
    }

    



}



?>