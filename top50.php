<?php
    require_once('include/common.inc.php');
    $message = null;
    if (!is_numeric($_GET['page'])) {
        redirect('/index.php');
    }
    
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    
    if (getCountBooks() < 50) {
        $bookCount = getCountBooks();
    } else {
        $bookCount = 50;
    }

    $lastPage = ceil($bookCount / LIMIT_ON_PAGE);
    
    $vars = array( 
        'activeMenu' => '3', 
        'headerData' => loadHeaderLinks(),
        'titleText' => '50 лучших книг ',
        'books' => getTop50Books($page),
        'message' => $message,
        'pageDescription' => '50 лучших книг',
        'pageList' => getPageList($page, $lastPage),
        'pageName' => $_SERVER['SCRIPT_NAME'],
        'pointer' => getPointerState($page, $lastPage),
        'lastPage' => $lastPage
    );
    echo getView('index.twig', $vars);