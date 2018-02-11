<?php
    require_once('include/common.inc.php');
    if (!isUserLogin()) {
        redirect('/index.php');
    }
    
    $messages = [
        ALL_RIGHT => "Запрос обработан",
        FAIL => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     
    $vars = array(
      'activeMenu' => '2', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Добавление новой книги',
      'message' => $message,
      'publishing_houses' => loadAllPublishingHouses()
      );
    echo getView('add_book.twig', $vars);