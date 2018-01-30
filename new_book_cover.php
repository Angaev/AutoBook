﻿<?php
    require_once('include/common.inc.php');
    
    $messages = [
      1 => "Обложка добавлена",
      2 => "Не удалось добавить обложку"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";

    if (!empty($_GET["id"]) && is_numeric($_GET["id"]))  {
        $book_id = $_GET["id"];
        
        $vars = array(
            'activeMenu' => '2', 
            'headerData' => loadHeaderLinks(),
            'titleText' => 'Добавление новой книги',
            'message' => $message,
            'publishing_houses' => loadAllPublishingHouses(),
            'book_id' => $book_id
        );
        echo getView('add_book_cover.twig', $vars);
    } else {
        redirect('index.php');
    }