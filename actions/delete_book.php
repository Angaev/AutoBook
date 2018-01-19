<?php
    require_once('../include/common.inc.php');
    if (!isAdmin()) {
        redirect('/index.php');
    } 
      
    if (empty($_POST['delId'])) {
        redirect('/index.php?result=2');
    }
    
    if (deleteBook($_POST['delId'])) {
       redirect('/index.php?result=3');
    } else {
       redirect('/index.php?result=2');
    }