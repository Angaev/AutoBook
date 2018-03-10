<?
    require_once('../include/common.inc.php');
    
    if (!isUserLogin()) {
        redirect('/index.php');
    }

    deleteAvatar();

    echo json_encode('/img/avatar/noavatar.png');