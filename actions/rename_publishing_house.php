<?php
    require_once('../include/common.inc.php');
   
    if (empty($_POST["old_name"]) && !empty($_POST["rename"]))  {
        redirect('/edit_publishing_houses.php?result=fail');
    }

    $oldName = dbQuote($_POST["old_name"]);
    $newName = dbQuote($_POST["rename"]);
          
    if (!checkPublishingHouseExist($oldName)) {
        redirect('/edit_publishing_houses.php?result=fail');
    }
    
    if (renamePublishingHouse($oldName, $newName)) {
        redirect('/edit_publishing_houses.php?result=ok');
    } else {
        redirect('/edit_publishing_houses.php?result=fail');
    }
    