<?php
    require_once('include/common.inc.php');
    
    if (!isUserLogin()) {
        redirect('index.php');
    }
    
    $id = $_SESSION['user_id'];
    
   
    $message = null;
    if (!empty($_GET["result"])) {
        if($_GET["result"] == 1) {
            //удалось обновить 
            $message = "Запрос обработан";
        }
        elseif ($_GET["result"] == 2) {
            //не удалось обновить
            $message = "Запрос не обработан, проверьте вводимые данные";
        }
    }
    
    $vars = array(
      'activeMenu' => '2', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Редактирование ваших данных',
      'user' => loadUserData($id),
      'message' => $message,
      'publishing_houses' => loadAllPublishingHouses()
      );
    echo getView('edit_user_data.twig', $vars);