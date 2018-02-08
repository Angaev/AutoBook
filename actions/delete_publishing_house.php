<?php
    require_once('../include/common.inc.php');
    if (empty($_POST["delete_name"])) {
        redirect('/edit_publishing_houses.php?result=fail');
    }
    
    $delete_name = dbQuote($_POST["delete_name"]);
          
    if (deletePublishingHouse($delete_name)) {
          redirect('/edit_publishing_houses.php?result=ok');
    } else {
        redirect('/edit_publishing_houses.php?result=fail');
    }
 