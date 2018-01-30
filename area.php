<?php
    require_once('include/common.inc.php');

    $messages = [
      1 => "Изменения внесены",
      2 => "Изменения не внесены"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
 
    if (!isUserLogin()) {
        redirect('login.php');
    }
    $userId = $_SESSION['user_id'];
      
    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'userData' => loadUserData($userId),
        'admin' => isAdmin(),
        'titleText' => 'Личный кабинет',
        'lastComment' => getLastComment($userId),
        'books' => getLikesBooks($userId, 3),
        'message' => $message
        );
    echo getView('area.twig', $vars);