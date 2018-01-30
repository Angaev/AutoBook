<?php
    
    function loadHeaderLinks()
    {
        $login = array(
                    "id" => "4", 
                    "name" => "Вход",
                    "url" => "login.php" 
                  );
        $query = 'SELECT * FROM header_links ORDER BY id';
        $result = dbQueryGetResult($query);
        if (isUserLogin()) {          
            return $result;
        } else {
            $result[3] = $login;
            return $result;
        }
    }