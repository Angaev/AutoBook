<?php
    require_once('../include/common.inc.php');
   
    if (!empty($_POST["old_name"]) && !empty($_POST["rename"]))  {
        $oldName = dbQuote($_POST["old_name"]);
        $newName = dbQuote($_POST["rename"]);
              
        //убедиться что есть такое издательство
        if (checkPublishingHouseExist($oldName)) {
            if (renamePublishingHouse($oldName, $newName)) {
                redirect('/edit_publishing_houses.php?result=1');
            } else {
                redirect('/edit_publishing_houses.php?result=2');
            }
        } else {
            redirect('/edit_publishing_houses.php?result=2');
        }
    } else {
        redirect('/edit_publishing_houses.php?result=2');
    }