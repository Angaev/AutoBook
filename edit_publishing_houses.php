<?php
    require_once('include/common.inc.php');
    $message = null;

    if (!empty($_GET["result"])) {
        if($_GET["result"] == 1) {
            //удалось добавить 
            $message = "Запрос обработан";
        }
        else {
            //не удалось добавить
            $message = "Запрос не обработан";
        }
        
    }

    $vars = array(
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Редактирование издательств',
        'message' => $message
        );
    echo getView('publishing_houses.twig', $vars);