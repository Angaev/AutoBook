<?php
    require_once('include/common.inc.php');

    $messages = [
      1 => "Обложка добавлена",
      2 => "Книга не удалена",
      3 => "Книга удалена",
      4 => "Книга добавлена",
      0 => "Что-то пошло не так"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
     
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $lastPage = ceil(getCountBooks() / LIMIT_ON_PAGE);
    
    $vars = array(
        'activeMenu' => '1', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'AutoBook - лучший сервис поиска автомобильной литературы',
        'books' => loadDataBooks($page),
        'pageList' => getPageList($page, $lastPage),
        'pageName' => $_SERVER['SCRIPT_NAME'],
        'pointer' => getPointerState($page, $lastPage),
        'lastPage' => $lastPage,
        'message' => $message
    );
    echo getView('index.twig', $vars);