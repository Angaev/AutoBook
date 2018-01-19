<?php
    //не реализовано
    require_once('../include/common.inc.php');
    if (!empty($_POST['book_id']) && !empty($_POST['url'])) {
        $book_id = $_POST['book_id'];
        $url = $_POST['url'];
        $uploaddir = '../img/book_cover/';
        
        $ReadFile = fopen($URL, "rb");
        if ($ReadFile) {
            $WriteFile = fopen ($PATH, "wb");
            if ($WriteFile){
                while(!feof($ReadFile)) {
                    fwrite($WriteFile, fread($ReadFile, filesize($ReadFile)));
                }
                fclose($WriteFile);
            }
            fclose($ReadFile);
        } else {
            redirect('../new_book_cover.php?result=2' . $book_id);
        }
    } else {
        redirect('index.php');
    }