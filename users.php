<?php
    require_once('include/common.inc.php');

    $messages = [
      1 => "Выполнено",
      2 => "Не удалось выполнить",
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
    
    if (!isAdmin()) {
        redirect('index.php');
    }
   
    $vars = array(
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование пользователей',
        'message' => $message,
        'users' => getUsersData()
    );
    echo getView('users.twig', $vars);