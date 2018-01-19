<?php
$g_dbLink = null;

function dbInitionConnect()
//создать подключение к БД
{
    global $g_dbLink;
    $g_dbLink = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    //данные берутся из config.inc.php
    $error = mysqli_connect_error();
    
    if ($error) {
        die('Unable to connect to DB');
    }
}

//делает запрос к базе данных и возвращает true в случае удачи и наоборот
function dbQuery($query)
{
    global $g_dbLink;
    $result = mysqli_query($g_dbLink, $query);
    return ($result != false);
}

function dbQuote($value)
//экранирует символы 
{
    global $g_dbLink;
    return mysqli_real_escape_string($g_dbLink, $value);
}

function dbGetLastInsertId()
//возвращает последний вставленный id
{
    global $g_dbLink;
    return mysqli_insert_id($g_dbLink);
}

function dbQueryGetResult($query)
//запрос, а потом в data возвращает результат запроса
{
    global $g_dbLink;
    $data = []; //ассоциативный массив
    $result = mysqli_query($g_dbLink, $query);
    
    if ($result) {
      while ($row = mysqli_fetch_assoc($result))
         array_push($data, $row);
      mysqli_free_result($result);
    }
    
    return $data;
}



