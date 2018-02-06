<?php
    require_once('include/common.inc.php');
    
    if (!isUserLogin()) {
        redirect('/index.php');
    }
    
    $id = $_SESSION['user_id'];
    
    $messages = [
      1 => "Запрос обработан",
      2 => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
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