<?php
    require_once('../include/common.inc.php');
    
    if (!isDataNewUserExist()) {
        redirect('/login.php?result=reg_fail');
    }

    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if (strcmp($pass1, $pass2) !== 0) {
        redirect('/login.php?result=reg_fail');
    }
    
    $passHash = md5($pass1);
    
    $email = $_POST['email'];
    if (isUserExistByEmail($email)) {
        redirect('/login.php?result=wrong_email');
    }
    
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    
    if (createUser($email, $passHash, $name, $subname)) {
        redirect('/login.php?result=reg_done');
    } else {
        redirect('/login.php?result=reg_fail');
    }