<?php
    require_once('../include/common.inc.php');
   
    if (!isAdmin()) {
        redirect('/index.php');
    }
    

    if (!isset($_POST['name']) || !isset($_POST['publishing_house']) || 
        !isset($_POST['year']) || !isset($_POST['link']) || 
        !isset($_POST['book_description']) || !isset($_POST['bookId'])) {
          redirect('/index.php');
    }
    
    $bookInfo['name'] = $_POST['name'];
    $bookInfo['publishing_house'] = $_POST['publishing_house'];
    $bookInfo['year'] = $_POST['year'];
    $bookInfo['link'] = $_POST['link'];
    $bookInfo['book_description'] = $_POST['book_description'];
    $bookInfo['bookId'] = $_POST['bookId'];
    if (isset($_POST['deleteCover'])) {
        $bookInfo['deleteCover'] = ($_POST['deleteCover'] == 'on') ? true : false;
    }
    

    $bookInfo['path'] = saveFile(COVER_DIR, 'book_cover', $_POST['bookId']);

    if (updateBook($bookInfo) && updateBookDescription($bookInfo) 
    && updateBookLink($bookInfo) && updateBookCover($bookInfo)) {
        redirect('/book.php?book_id=' . $bookInfo['bookId'] . '&result=' . BOOK_ADD);
    } else {
        redirect('/book.php?book_id=' . $bookInfo['bookId'] . '&result=' . FAIL);
    }

   
    