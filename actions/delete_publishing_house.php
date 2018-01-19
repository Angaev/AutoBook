<?php
    require_once('../include/common.inc.php');
    if (!empty($_POST["delete_name"])) {
        $delete_name = dbQuote($_POST["delete_name"]);
              
        if (deletePublishingHouse($delete_name)) {
              redirect('/edit_publishing_houses.php?result=1');
          } else {
              redirect('/edit_publishing_houses.php?result=2');
          }
    } else {
        redirect('/edit_publishing_houses.php?result=2');
    }