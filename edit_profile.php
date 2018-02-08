<?php
    require_once('include/common.inc.php');
    
    if (!isUserLogin()) {
        redirect('/index.php');
    }
    
    $id = $_SESSION['user_id'];
    
    $messages = [
        'ok' => "Изменения внесены",
        'fail' => "Изменения не внесены"    
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     
    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование ваших данных',
        'user' => loadUserData($id),
        'message' => $message,
        'publishing_houses' => loadAllPublishingHouses()
      );
    echo getView('edit_user_data.twig', $vars);