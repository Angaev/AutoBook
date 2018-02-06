<?php
    require_once('../include/common.inc.php');
    
    if (!isDataNewUserExist()) {
        redirect('/login.php?result=2');
    }

    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if (strcmp($pass1, $pass2) !== 0) {
        redirect('/login.php?result=2');
    }
    
    $passHash = md5($pass1);
    
    $email = $_POST['email'];
    if (isUserExistByEmail($email)) {
        redirect('/login.php?result=4');
    }
    
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    
    if (createUser($email, $passHash, $name, $subname)) {
        redirect('/login.php?result=1');
    } else {
        redirect('/login.php?result=2');
    }