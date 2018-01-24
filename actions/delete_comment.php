<?php
    require_once('../include/common.inc.php');
    if (!isAdmin() && empty($_POST['commentId']) && empty($_POST['bookId'])) {
        redirect('/index.php');
    } 
      
    if (deleteComment($_POST['commentId'])) {
       redirect('/book.php?result=4&book_id='. $_POST['bookId']);
    } else {
       redirect('/book.php?result=2&book_id='. $_POST['bookId']);
    }