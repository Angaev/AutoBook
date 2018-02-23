<?php
    require_once('include/common.inc.php');
    
    $messages = [
        ALL_RIGHT => 'Книга переименована',
        FAIL => 'Изменения не внесены, проверьте данные',
        BOOK_ADD => 'Книга обновлена',
        COMMENT_WAS_DELETE => 'Комментарий удален'
    ];
    $messageId = isset($_GET["result"]) ? ($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
 
    if (empty($_GET['book_id'])) {
       redirect('/index.php');
    }
    $id = $_GET['book_id'];
    if (!isset($_SESSION['user_id'])) {
        $userId = null;
    } else {
        $userId = $_SESSION['user_id'];
    }
    
    if (isUserLogin()) {
      if ((isUserAlreadyLikeBook($userId, $id)) && (isActualLike($userId, $id))) {
          $likeBtn = 'lock';
      } else {
          $likeBtn ='free';
      }
    } else {
       $likeBtn = 'off';
    }
    $vars = array(
        'headerData' => loadHeaderLinks(),
        'titleText' => 'AutoBook - лучший сервис поиска автомобильной литературы',
        'book' => loadBookData($id),
        'description' => loadDescription($id),
        'link' => loadLink($id),
        'likeBtn' => $likeBtn,
        'bookId' => $id,
        'admin' => isAdmin(),
        'message' => $message,
        'countComment' => getCountCommentsBook($id),
        'isUserLogin' => isUserLogin(),
        'userData' => getUserData($userId),
        'commentsData' => getCommentsBook($id),
        'pageName' => 'book'
         );
    echo getView('book.twig', $vars);