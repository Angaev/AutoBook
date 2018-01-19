<?php
    require_once('include/common.inc.php');
    if (!isUserLogin()) {
        redirect('index.php');
    }
    
    
    $message = null;
    if (!empty($_GET["result"])) {
        if($_GET["result"] == 1) {
            //удалось добавить 
            $message = "Запрос обработан";
        }
        elseif ($_GET["result"] == 2) {
            //не удалось добавить
            $message = "Запрос не обработан, проверьте вводимые данные";
        }
    }
    
    $vars = array(
      'activeMenu' => '2', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Добавление новой книги',
      'message' => $message,
      'publishing_houses' => loadAllPublishingHouses()
      );
    echo getView('add_book.twig', $vars);