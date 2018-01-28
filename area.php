<?php
  require_once('include/common.inc.php');

  $message = NULL;
  if (!empty($_GET['result'])) {
      if ($_GET['result'] == 1) {
          $message = 'Изменения внесены';
      } 
      if ($_GET['result'] == 2) {
          $message = 'Изменения не внесены';
      } 
  }
    
  if (!isUserLogin()) {
      redirect('login.php');
  }
  $userId = $_SESSION['user_id'];
    
  $vars = array(
      'activeMenu' => '2', 
      'headerData' => loadHeaderLinks(),
      'userData' => loadUserData($userId),
      'admin' => isAdmin(),
      'titleText' => 'Личный кабинет',
      'lastComment' => getLastComment($userId),
      'books' => getLikesBooks($userId, 6),
      'message' => $message
      );
  // var_dump($vars["books"]);
  // die();
  echo getView('area.twig', $vars);