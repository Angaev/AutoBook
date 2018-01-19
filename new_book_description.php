<?php
    require_once('include/common.inc.php');
    $message = NULL;
    if (!empty($_GET['result'])) {
        if ($_GET['result'] == 1) {
            $message = 'Обложка добавлена';
        } else {
            $message = 'Не удалось добавить описание';
        }
    }
    if (!empty($_GET["id"]) && is_numeric($_GET["id"]))  {
        $book_id = $_GET["id"];
        
        $vars = array(
            'activeMenu' => '2', 
            'headerData' => loadHeaderLinks(),
            'titleText' => 'Добавление описания книги',
            'message' => $message,
            'book_id' => $book_id
            );
        echo getView('add_book_description.twig', $vars);
    } else {
        redirect('index.php');
    }