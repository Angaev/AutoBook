<?php
    require_once('include/common.inc.php');

    $messages = [
        ALL_RIGHT => "Изменения внесены",
        FAIL => "Изменения не внесены"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : ""; 
      
    if (!isUserLogin()) {
        redirect('/login.php');
    }
    $userId = $_SESSION['user_id'];
      
    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'userData' => loadUserData($userId),
        'titleText' => 'Все комментарии',
        'allComments' => getAllComment($userId),
        'message' => $message
        );
    echo getView('all_comments.twig', $vars);