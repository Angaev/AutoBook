<?php
    require_once('../include/common.inc.php');
    if (empty($_POST["publishing_house"])) {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    
    $deleteId = dbQuote($_POST["publishing_house"]);
          
    if (deletePublishingHouseById($deleteId)) {
          redirect('/edit_publishing_houses.php?result=' . ALL_RIGHT);
    } else {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
 