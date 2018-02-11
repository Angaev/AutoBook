<?php
    require_once('include/common.inc.php');

    $messages = [
        COVER_HAS_BEEN_ADD => "Обложка добавлена",
        BOOK_HAS_NOT_BEEN_DELETE => "Книга не удалена",
        BOOK_HAS_BEEN_DELETE => "Книга удалена",
        BOOK_ADD => "Книга добавлена"
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