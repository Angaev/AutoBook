<?php
    require_once('include/common.inc.php');

    $messages = [
        'ok' => "Запрос обработан"
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
    
    if (empty($_GET['name'])) {
        redirect('/index.php');  
    } 
    $name = $_GET['name'];

    if (!is_numeric($_GET['page'])) {
        redirect('/index.php');
    }
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $lastPage = ceil(getCountBooksByName($name) / LIMIT_ON_PAGE);

    $vars = array( 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Поиск ' . $name,
        'books' => getBooksByName($name, $page),
        'search' => $name,
        'pageList' => getPageList($page, $lastPage),
        'pageName' => $_SERVER['SCRIPT_NAME'],
        'pointer' => getPointerState($page, $lastPage),
        'lastPage' => $lastPage,  
        'message' => $message,
        'pageDescription' => 'Книги по запросу: ' . $name
    );
    echo getView('index.twig', $vars);