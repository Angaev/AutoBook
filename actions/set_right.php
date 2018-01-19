<?php
    require_once('../include/common.inc.php');
    if (!isAdmin()) {
        redirect('/index.php');
    } 
    
    if(empty($_GET['id'])) {
        redirect('/index.php');
    }
    
    $id = $_GET['id'];
    
    if (flipRight($id)) {
        redirect('/users.php?result=1');
    } else {
        redirect('/users.php?result=2');
    }