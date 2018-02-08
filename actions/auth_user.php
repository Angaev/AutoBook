<?php
    require_once('../include/common.inc.php');
    
    $login = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    
    $userInfo = findUserByLogin($login, $pass);
    
    if (empty($userInfo)) {
        redirect('/login.php?result=wrong_data');
    }
    
    if (isUserBan($userInfo['id'])) {
        redirect('/login.php?result=ban');
    }
    
    saveSessionUser($userInfo);
    redirect('/index.php');
