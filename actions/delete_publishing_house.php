<?php
    require_once('../include/common.inc.php');
    if (empty($_POST["delete_name"])) {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    
    $delete_name = dbQuote($_POST["delete_name"]);
          
    if (deletePublishingHouse($delete_name)) {
          redirect('/edit_publishing_houses.php?result=' . ALL_RIGHT);
    } else {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
 