<?php 

require_once '../config.php';

if(isset($_GET['code'])){
    
    $code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING);
    
    if(checkByCode($code)){
      
        verifyUser($code);
        redirect('verify-account.php');
        exit();
        
    }else{
        
        setMsg('msg', 'Invalid activation code', 'warning');
       
    }

}else{
    setMsg('msg', 'Activation code not exists', 'warning');
    
}

 //common redirection
 redirect('signup.php');
 exit();

    


?>