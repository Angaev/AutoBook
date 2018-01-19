<?php
    require_once('../include/common.inc.php');
    if (empty($_POST['book_id'])) {
        redirect('/index.php');
    }
    
    $book_id = $_POST['book_id'];
    //$uploaddir = '../img/book_cover/';
    
    
    //получаем путь куда и какой файл перенести из tmp
    $path = saveFile(COVER_DIR, 'cover', $book_id);
    //если не сохранился файл
    if (!$path) {
        redirect('/new_book_cover.php?result=2&id=' . $book_id);
    }
    
    if (isBookExist($book_id) && addBookCover($book_id, $path)) {
        redirect('/new_book_description.php?result=1&id=' . $book_id);
    } else {
        redirect('/new_book_cover.php?result=2&id=' . $book_id);
    }
         
