<?php
    require_once('include/common.inc.php');

    $message = NULL;
    if (!empty($_GET['result'])) {
        if ($_GET['result'] == 1) {
            $message = 'Обложка добавлена';
        } 
        if ($_GET['result'] == 2) {
            $message = 'Книга не удалена';
        } 
        if ($_GET['result'] == 3) {
            $message = 'Книга удалена';
        } 
        if ($_GET['result'] == 4) {
            $message = 'Книга добавлена';
        } 
        if ($_GET['result'] == 0) {
            $message = 'Что-то пошло не так';
        } 
    }
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