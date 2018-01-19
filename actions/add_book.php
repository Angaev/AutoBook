<?php
    require_once('../include/common.inc.php');
    
    if (!empty($_POST['book_name'])) {
        $name = $_POST['book_name'];
        
        if (!empty($_POST['year']) && is_numeric(($_POST['year']))) {
            $year = $_POST['year'];
            
            if (!empty($_POST['publishing_house']) && is_numeric(($_POST['publishing_house']))) {
                $houseId = $_POST['publishing_house'];
                addBook($name, $year, $houseId);
                $bookID = dbGetLastInsertId();
                redirect('/new_book_cover.php?id='. $bookID);
            } else {
                redirect('/new_book.php?result=2');
            }
        } else {
            redirect('/new_book.php?result=2');
        }
    } else {
        redirect('/new_book.php?result=2');
    }