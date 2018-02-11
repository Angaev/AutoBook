<?php
    require_once('../include/common.inc.php');
    if (!isAdmin() && empty($_POST['commentId']) && empty($_POST['bookId'])) {
        redirect('/index.php');
    } 
      
    if (deleteComment($_POST['commentId'])) {
       redirect('/book.php?result=' . COMMENT_WAS_DELETE . '&book_id=' . $_POST['bookId']);
    } else {
       redirect('/book.php?result=' . FAIL . '&book_id=' . $_POST['bookId']);
    }