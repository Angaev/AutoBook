<?php
    require_once('../include/common.inc.php');
   
    if (empty($_POST["publishing_house"]) || empty($_POST["rename"]))  {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }

    $id = dbQuote($_POST["publishing_house"]);
    $newName = dbQuote($_POST["rename"]);
    
    if (renamePublishingHouseById($id, $newName)) {
        redirect('/edit_publishing_houses.php?result=' . ALL_RIGHT);
    } else {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    