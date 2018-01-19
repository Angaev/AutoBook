<?php
    
    function loadHeaderLinks()
    {
        $login = array(
                    "id" => "4", 
                    "name" => "Вход",
                    "url" => "login.php" 
                  );
        $query = 'select * from header_links order by id';
        $result = dbQueryGetResult($query);
        if (isUserLogin()) {          
            return $result;
        } else {
            $result[3] = $login;
            return $result;
        }
    }