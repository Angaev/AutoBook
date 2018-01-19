<?php
    require_once('../include/common.inc.php');
    
    if (empty($_POST['email']) || empty($_POST['pass1']) || empty($_POST['pass1']) || empty($_POST['name']) 
        || empty($_POST['subname'])) {
        redirect('/login.php?result=2');
    }

    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if (strcmp($pass1, $pass2) !== 0) {
        //если пароли не совпали с учетом регистра
        redirect('/login.php?result=2');
    }
    
    $passHash = md5($pass1);
    
    $email = $_POST['email'];
    if (isUserExistByEmail($email)) {
        //если такая почта уже зарегистрирована
        redirect('/login.php?result=4');
    }
    
    $name = $_POST['name'];
    $subname = $_POST['subname'];
    
    if (createUser($email, $passHash, $name, $subname)) {
        redirect('/login.php?result=1');
    } else {
        redirect('/login.php?result=2');
    }