<?php
    require_once('include/common.inc.php');
    $message = NULL;
    
    if (!empty($_GET['result'])) {
        if ($_GET['result'] == 1) {
            $message = 'Выполнено';
        }
        if ($_GET['result'] == 2) {
            $message = 'Не удалось';
        }
    }
    
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