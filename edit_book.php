<?php
    require_once('include/common.inc.php');
    if (!isAdmin()) {
        redirect('index.php');
    }
    if (empty($_GET['id'])) {
        redirect('index.php');
    }
    $id = $_GET['id'];
    
    $messages = [
      1 => "Запрос обработан",
      2 => "Запрос не обработан, проверьте вводимые данные"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     
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