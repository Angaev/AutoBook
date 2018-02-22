<?php
    require_once('include/common.inc.php');

    if (!isAdmin()) {
        redirect('/login.php');
    }
    
    $messages = [
        ALL_RIGHT => "Запрос обработан",
        FAIL => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     

    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование издательств',
        'publishing_houses' => loadAllPublishingHouses(),
        'message' => $message
    );
    echo getView('publishing_houses.twig', $vars);