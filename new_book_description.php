<?php
    require_once('include/common.inc.php');
    if (empty($_GET["id"]) || !is_numeric($_GET["id"])) {
        redirect('/index.php');
    }
    $book_id = $_GET["id"];
    
    $messages = [
        'ok' => "Обложка добавлена",
        'fail' => "Не удалось добавить описание"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
    
   
    
    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Добавление описания книги',
        'message' => $message,
        'book_id' => $book_id
    );
    echo getView('add_book_description.twig', $vars);
    