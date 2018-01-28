<?php
    require_once('include/common.inc.php');

    $message = NULL;
    if (!empty($_GET['result'])) {
        $result  = $_GET['result'];
        if ($result == 1) {
            $message = 'Запрос обработан';
        }
    }
    
    if (empty($_GET['name'])) {
        redirect('index.php');  
    } 
    $name = $_GET['name'];

    if (empty($_GET['page'])) {
        $page = 1;
    } else {
        if (!is_numeric($_GET['page'])) {
            redirect('index.php');
        }
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
    // var_dump($vars["pointer"]);
    echo getView('index.twig', $vars);