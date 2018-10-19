<?php

require_once '../config.php';

if(isset($_GET['reset_code'])) {

    $code = filter_input(INPUT_GET, 'reset_code', FILTER_SANITIZE_STRING);

    if(checkByCode($code)){
      
        $_SESSION['reset_code'] = $code;

        redirect('reset-password.php');

        exit();
        
    }else{
        
        setMsg('msg', 'Invalid reset code', 'warning');
       
    }

}else{
    setMsg('msg', 'Reset password code empty', 'warning');
    
}

 //common redirection
 redirect('login.php');
 exit();



?>