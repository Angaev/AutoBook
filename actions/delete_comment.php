<?php
    require_once('../include/common.inc.php');
    if (!isAdmin() && empty($_POST['commentId']) && empty($_POST['bookId'])) {
        redirect('/index.php');
    } 
      
    if (deleteComment($_POST['commentId'])) {
       redirect('/book.php?result=del_comment&book_id=' . $_POST['bookId']);
    } else {
       redirect('/book.php?result=fail&book_id=' . $_POST['bookId']);
    }