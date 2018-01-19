<?php
  require_once('../include/common.inc.php');
  //добавить проверку пустого входного параметра
  if (!empty($_POST["new_name"])) {
      $new_name = dbQuote($_POST["new_name"]);
            
      if (addPublishingHouse($new_name)) {
          redirect('/edit_publishing_houses.php?result=1');
      } else {
          redirect('/edit_publishing_houses.php?result=2');
      }
  } else {
      redirect('/edit_publishing_houses.php?result=2');
  }