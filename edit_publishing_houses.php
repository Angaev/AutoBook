<?php
    require_once('include/common.inc.php');

    $messages = [
      1 => "Запрос обработан",
      2 => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     

    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование издательств',
        'message' => $message
    );
    echo getView('publishing_houses.twig', $vars);