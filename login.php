<?php
    require_once('include/common.inc.php');
    
    if (isUserLogin()) {
        redirect('index.php');
    }
    
    $messages = [
      1 => "Вы зарегистированы",
      2 => "В регистрации отказано, попробуйте другие данные",
      3 => "Неверная пара email/пароль",
      4 => "Такая почта уже зарегистирована",
      5 => "Учетная запись заблокирована"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";

    
    $vars = array(
      'activeMenu' => '4', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Войти/Зарегистироваться',
      'message' => $message    
      );
    echo getView('login.twig', $vars);