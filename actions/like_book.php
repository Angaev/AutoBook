<?php
    require_once('../include/common.inc.php');
    
    if (!empty($_SERVER['HTTP_REFERER'])) {
        $from = $_SERVER['HTTP_REFERER'];
    } else {
        $from = '/index.php';
    }
    
    if (empty($_GET['id'])) {
        redirect($from);
    }
    $bookId = $_GET['id'];
    
    if (isUserLogin()) {
        $userId = $_SESSION['user_id'];
    } else {
        redirect($from);
    }
    
    likeBook($userId, $bookId);
    redirect($from);