<?php
    require_once('../include/common.inc.php');
   
    if (empty($_POST["old_name"]) && !empty($_POST["rename"]))  {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }

    $oldName = dbQuote($_POST["old_name"]);
    $newName = dbQuote($_POST["rename"]);
          
    if (!checkPublishingHouseExist($oldName)) {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    
    if (renamePublishingHouse($oldName, $newName)) {
        redirect('/edit_publishing_houses.php?result=' . ALL_RIGHT);
    } else {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    