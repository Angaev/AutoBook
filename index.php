<?php
    require_once('include/common.inc.php');

    $messages = [
        'add_cover' => "Обложка добавлена",
        'not_delete_book' => "Книга не удалена",
        'delete_book' => "Книга удалена",
        'add_book' => "Книга добавлена"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
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