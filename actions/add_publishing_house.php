<?php
    require_once('../include/common.inc.php');

    if (empty($_POST["new_name"])) {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    

    $new_name = $_POST["new_name"];
          
    if (addPublishingHouse($new_name)) {
        redirect('/edit_publishing_houses.php?result=' . ALL_RIGHT);
    } else {
        redirect('/edit_publishing_houses.php?result=' . FAIL);
    }
    