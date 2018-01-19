<?php
    require_once('include/common.inc.php');
    if (!isAdmin()) {
        redirect('index.php');
    }
    if (empty($_GET['id'])) {
        redirect('index.php');
    }
    $id = $_GET['id'];
    
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
      'titleText' => 'Редактирование книги',
      'book' => loadBookData($id),
      'link' => loadLink($id),
      'bookId' => $id,
      'description' => loadDescription($id),
      'message' => $message,
      'publishing_houses' => loadAllPublishingHouses()
      );
    echo getView('edit_book.twig', $vars);