<?php
    require_once('../include/common.inc.php');
    if (!isUserLogin())
    {
        die();
    }
    $userId = getLoginUserId();
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'error!';
    }
    else {
        $path = 'img/avatar/' . $userId . '_' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], '../' . $path);
        //echo "cool";
        $userData['path'] = $path;
        $userData['id'] = $userId;
        if (updateUserImg($userData)){
          echo ('/' . $path);
        } else {
          echo 'error!';
        }
    }