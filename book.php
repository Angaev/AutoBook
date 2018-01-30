<?php
    require_once('include/common.inc.php');
    
    $messages = [
      1 => "Книга переименована",
      2 => "Изменения не внесены, проверьте данные",
      3 => "Книга обновлена",
      4 => "Комментарий удален"
    ];
    $messageId = isset($_GET["result"]) ? intval($_GET["result"]) : 0;
    $message = isset($messages[$messageId]) ? $messages[$messageId] : "";
 
    if (empty($_GET['book_id'])) {
       redirect('index.php');
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
        'commentsData' => getCommentsBook($id)
         );
    echo getView('book.twig', $vars);