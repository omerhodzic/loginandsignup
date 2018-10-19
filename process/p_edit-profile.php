<?php 

require_once '../config.php';

if(isset($_POST['edit-profile'])){}

    $errors = array();

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); 
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL);
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';

    $user = $_SESSION['user'];

    //name
    if(strlen($name)> 50 || strlen($name) < 3){

        $errors['name_err'] = 'Name min limit is 6 & max is 50 characters';

    }

    //username
    if(strlen($username) > 15 || strlen($username) < 5){

        $errors['username_err'] = 'Username min limit is 5 & max is 15 characters';

    }

    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 

    if(!preg_match($reg_email, $email)){

        $errors['email_err'] = 'Enetered email is invalid';

    } else if (checkByEmail($email)) {

        $errors['email_err'] = 'Email already exists';
    }

    //Website
    if(empty($website)){

        $errors['website_err'] = 'Invalid entry';

    }

    //upload file

    if($image['error'] != 4){
    
    //create image directory if doesn't exists

      if(!is_dir(APPROOT.'/img')){
           mkdir(APPROOT.'/img');
      }

      if($image['error'] == 4){

         $errors['image_err'] =' Please, upload file';

      } else if ($image['type'] != 'image/png' && $image['type'] != 'image/jpg'){

          $errors['image_err'] = 'Only, png/jpg image is allowed';
      }
    
      $image_info = pathinfo($image['name']);

      extract($image_info);

      $image_convention = $filename . time() . ".$extension";

      move_uploaded_file($image['tmp_name'], APPROOT ."/img/".  $image_convention);
        
    } else {

        $image_convention = $user->image;

    }

    if(!count($errors)) {

        $stmt = $objDB->prepare('UPDATE users SET name=?, username=?, email=?, website=?, image=? WHERE id=?');

        $stmt->bind_param('sssssi', $name, $username, $email, $website, $image_convention, $user->id);

        if($stmt->execute()) {

            $_SESSION['user'] = checkByID($user->id);
            
            redirect('profile-successfully-updated.php');

        }

    } else {

        setMsg('errors', $errors); 
        redirect('edit-profile.php');

    }


?>