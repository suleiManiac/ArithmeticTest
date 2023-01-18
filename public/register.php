<?php
require_once('../private/initialize.php');
session_start();

if (is_request_post()) {
    $firstName = $_POST['regFName'];
    $lastName = $_POST['regLName'];
    
    $userEmail = $_POST['regUserEmail'];
    $userPass = $_POST['regUserPass'];

    $userType = $_POST['regUserType'];
    $userLevel = $_POST['regUserLevel'];
    
    $user = [];
    $user['email'] = $userEmail;
    $user['password'] = $userPass;
    $user['first_name'] = $firstName;
    $user['last_name'] = $lastName;
    $user['user_type'] = $userType;
    $user['user_level'] = $userLevel;
    
    //echo $user['email'], ' ', $user['password'], ' ', $user['first_name'], ' ', $user['last_name'], ' ',$user['user_type'], ' ', $user['user_level']; 
    $result = insert_new_user($db, $user);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        $_SESSION['email'] = $userEmail;
        $_SESSION['user_type'] = $userType == 1 ? "admin" : "normal" ;
        $_SESSION['name'] = $firstName;
        $_SESSION['user_id'] = $new_id;
        $_SESSION['user_level'] = $userLevel;

        session_write_close();
      
        redirect_to(url_for('index.php'));
    }
    else {
        $errors = $result;
    }
}

//redirect_to(url_for('/index.php'));
?>