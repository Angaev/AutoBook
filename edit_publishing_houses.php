<?php
    require_once('include/common.inc.php');

    if (!isAdmin()) {
        redirect('/login.php');
    }
    
    $messages = [
        'ok' => "Запрос обработан",
        'fail' => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     

    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование издательств',
        'message' => $message
    );
    echo getView('publishing_houses.twig', $vars);