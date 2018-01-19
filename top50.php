<?php
    require_once('include/common.inc.php');
    $message = null;
    
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
    //далее не 50 должно быть, а кол-во книг
    $lastPage = ceil($bookCount / LIMIT_ON_PAGE);
    
    $vars = array( 
        'activeMenu' => '3', 
        'headerData' => loadHeaderLinks(),
        'titleText' => '50 лучших книг ',
        'books' => getTop50Books($page), //модернизировать limit x,20
        'pageCount' => array(
            1, 2, 3, 4
          ),
        'message' => $message,
        'pageDescription' => '50 лучших книг',
        //для пагинации
        'pageList' => getPageList($page, $lastPage),
        'pageName' => $_SERVER['SCRIPT_NAME'],
        'pointer' => getPointerState($page, $lastPage),
        'lastPage' => $lastPage
        );
    echo getView('index.twig', $vars);