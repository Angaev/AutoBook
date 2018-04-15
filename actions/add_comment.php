<?php
    require_once('../include/common.inc.php');
    
    if(!isUserLogin()) {
        redirect("/index.php");
    }
    
    if (!isset($_POST["text"]) && !isset($_POST["book_id"]) ) {
        redirect("/index.php");
    }
    
    $comment = $_POST['text']; 
    $bookId = $_POST['book_id'];
    $userId = $_SESSION['user_id'];
    
    if (addComment($userId, $bookId, $comment)) {
        redirect('/book.php?book_id=' . $bookId . '&result=' . COMMENT_WAS_ADD);
    } else {
        redirect('/book.php?book_id=' . $bookId . '&result=' . FAIL);
    }