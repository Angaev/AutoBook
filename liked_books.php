<?php
    require_once('include/common.inc.php');
    $message = null;
    
    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    if (!isUserLogin()) {
        redirect('index.php');
    }
    
    $bookCount = getCountLikedBooks($_SESSION['user_id']);
    $lastPage = ceil($bookCount / LIMIT_ON_PAGE);
    
    $vars = array( 
        'activeMenu' => '2', 
        'headerData' => loadHeaderLinks(),
        'titleText' => 'Вам понравилось',
        'books' => getAllLikedBooks($_SESSION['user_id'], $page),
        'message' => $message,
        'pageDescription' => 'Книги, которые Вам понравились',
        'pageList' => getPageList($page, $lastPage),
        'pageName' => $_SERVER['SCRIPT_NAME'],
        'pointer' => getPointerState($page, $lastPage),
        'lastPage' => $lastPage
    );
    echo getView('index.twig', $vars);