<?php
    //добавлет новую книгу в БД
    require_once('../include/common.inc.php');
    
    if (empty($_POST['book_name'])) {
        redirect('/new_book.php?result=fail');
    }  
    $name = $_POST['book_name'];

    if (empty($_POST['year']) && is_numeric(($_POST['year']))) {
        redirect('/new_book.php?result=fail');
    }
    $year = intval($_POST['year']);
            
    if (empty($_POST['publishing_house']) && is_numeric(($_POST['publishing_house']))) {
        redirect('/new_book.php?result=fail');
    }      
    $houseId = $_POST['publishing_house'];
            
    addBook($name, $year, $houseId);
    $bookID = dbGetLastInsertId();
    redirect('/new_book_cover.php?id='. $bookID);
            
