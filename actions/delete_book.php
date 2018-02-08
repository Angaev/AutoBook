<?php
    require_once('../include/common.inc.php');
    if (!isAdmin()) {
        redirect('/index.php');
    } 
      
    if (empty($_GET['delId'])) {
        redirect('/index.php?result=not_delete_book');
    }
    
    if (deleteBook($_GET['delId'])) {
       redirect('/index.php?result=delete_book');
    } else {
       redirect('/index.php?result=not_delete_book');
    }