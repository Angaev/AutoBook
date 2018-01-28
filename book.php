<?php
    require_once('include/common.inc.php');
    $message = NULL;
    
    if (!empty($_GET['result'])) {
        if ($_GET['result'] == 1) {
            $message = 'Книга переименована';
        }
        if ($_GET['result'] == 2) {
            $message = 'Изменения не внесены, проверьте данные';
        }
        if ($_GET['result'] == 3) {
            $message = 'Книга обнолена';
        }
        if ($_GET['result'] == 4) {
            $message = 'Комментарий удален';
        }
    }
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
      if (isUserAlreadyLikeBook($userId, $id)) {
          if (isActualLike($userId, $id)) {
              $likeBtn = 'lock';
          } else {
              $likeBtn ='free';
          }
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