<?php
    require_once('include/common.inc.php');
    
    if (isUserLogin()) {
        redirect('/index.php');
    }
    
    $messages = [
        'reg_done' => "Вы зарегистированы",
        ERR_USER_REGISTRATION_FAIL => "В регистрации отказано, попробуйте другие данные",
        'wrong_data' => "Неверная пара email/пароль",
        'wrong_email' => "Такая почта уже зарегистирована",
        'ban' => "Учетная запись заблокирована"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";

    $vars = array(
      'activeMenu' => '4', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Войти/Зарегистироваться',
      'message' => $message    
      );
    echo getView('login.twig', $vars);