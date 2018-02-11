<?php
    require_once('include/common.inc.php');
    
    if (empty($_GET["id"]) || !is_numeric($_GET["id"]))  {
        redirect('/index.php');
    }
    $book_id = $_GET["id"];
    
    $messages = [
        ALL_RIGHT => "Обложка добавлена",
        FAIL => "Не удалось добавить обложку"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";

    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Добавление новой книги',
        'message' => $message,
        'publishing_houses' => loadAllPublishingHouses(),
        'book_id' => $book_id
    );
    echo getView('add_book_cover.twig', $vars);
    