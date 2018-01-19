<?php
    require_once('../include/common.inc.php');
     
    if (!isUserLogin()) {
        redirect('/index.php');
    }
    
    if (!isset($_POST['name']) || !isset($_POST['subname']) || 
        !isset($_POST['email']) || !isset($_POST['pass1']) || 
        !isset($_POST['pass2']) || !isset($_POST['oldPass'])) {
        redirect('/index.php');
    } 
    
    if (!isCorrectPass($_SESSION["user_id"], $_POST['oldPass'])) {
        redirect('/edit_profile.php?result=2');
    }
  
  
    if ($_POST['pass1'] != $_POST['pass2']) {
        redirect('/edit_profile.php?result=2');
    }
  
    $userData['name'] = $_POST['name'];
    $userData['subname'] = $_POST['subname'];
    $userData['email'] = $_POST['email'];
    $userData['pass'] = $_POST['pass1'];
    $userData['id'] = $_SESSION["user_id"];
    
    if (isset($_POST['deleteAvatar'])) {
        $userData['deleteAvatar'] = ($_POST['deleteAvatar'] == 'on') ? true : false;
    }
    

    $userData['path'] = saveFile(AVATAR_DIR, 'avatar', $_SESSION["user_id"]);
    
    if (updateUserName($userData) && updateUserImg($userData) && updatePassword($userData)) {
        redirect('/area.php?result=1');
    } else {
        redirect('/edit_profile.php?result=2');
    }
    

   
    