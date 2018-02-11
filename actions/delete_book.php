<?php
    require_once('../include/common.inc.php');
    if (!isAdmin()) {
        redirect('/index.php');
    } 
      
    if (empty($_GET['delId'])) {
        redirect('/index.php?result=' . BOOK_HAS_NOT_BEEN_DELETE);
    }
    
    if (deleteBook($_GET['delId'])) {
       redirect('/index.php?result=' . BOOK_HAS_BEEN_DELETE);
    } else {
       redirect('/index.php?result=' . BOOK_HAS_NOT_BEEN_DELETE);
    }