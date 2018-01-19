<?php
    require_once('include/common.inc.php');
    $message = null;
    if (isUserLogin()) {
        redirect('index.php');
    }
    if (!empty($_GET["result"])) {
        if($_GET["result"] == 1) {
            //удалось добавить 
            $message = "Вы зарегистированы";
        }
        elseif ($_GET["result"] == 2) {
            //не удалось зарегистрировать
            $message = "В регистрации отказано, попробуйте другие данные";
        }
        elseif ($_GET["result"] == 3) {
            //не тот почта/пароль
            $message = "Неверная пара email/пароль";
        }
        elseif ($_GET["result"] == 4) {
            //такой емаил уже есть
            $message = "Такая почта уже зарегистирована";
        }
        elseif ($_GET["result"] == 5) {
            //Пользователь забанен
            $message = "Учетная запись заблокирована";
        }
        
    }
    
    $vars = array(
      'activeMenu' => '2', 
      'headerData' => loadHeaderLinks(),
      'titleText' => 'Войти/Зарегистироваться',
      'message' => $message    
      );
    echo getView('login.twig', $vars);