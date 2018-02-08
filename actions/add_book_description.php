<?php
    require_once('../include/common.inc.php');

    if (!isAdmin()) {
        redirect('/index.php');
    }
    if (empty($_POST['book_id'])) {
        redirect('/index.php');
    }
    
    if (empty($_POST['book_description']) || empty($_POST['link'])) {
        redirect('/new_book_description.php?result=fail&id='.$_POST['book_id'].'');
    }
    
    $link = $_POST['link'];
    if (addBookDescription($_POST['book_id'], $_POST['book_description']) && addBookLink($_POST['book_id'], $link)) {
        redirect('/index.php?result=add_book');
    } else {
        redirect('/new_book_description.php?result=fail');
    }