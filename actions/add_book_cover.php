<?php
    //Этот скрипт добавляет указанное изображение к указанной книге
    require_once('../include/common.inc.php');
    if (empty($_POST['book_id'])) {
        redirect('/index.php');
    }
    
    $book_id = $_POST['book_id'];
    
    $path = saveFile(COVER_DIR, 'cover', $book_id);
    if (!$path) {
        redirect('/new_book_cover.php?result=fail&id=' . $book_id);
    }
    
    if (isBookExist($book_id) && addBookCover($book_id, $path)) {
        redirect('/new_book_description.php?result=ok&id=' . $book_id);
    } else {
        redirect('/new_book_cover.php?result=fail&id=' . $book_id);
    }
         
