<?php
    //здесь хранятся функции работы с БД
  
    //фукнция проверяет есть ли заданная книга
    function checkPublishingHouseExist($name)
    {
        $query = '
            SELECT * FROM publishing_houses WHERE house_name = "' . dbQuote($name) . '"';
        $answer = dbQueryGetResult($query);
        
        return (!empty(dbQueryGetResult($query)));
        
    }
    
    //фукнция добавления издательства
    function addPublishingHouse($name)
    {
        if (checkPublishingHouseExist($name)) {
          return false;
        }
        $query = '
            INSERT INTO publishing_houses (house_name) VALUES("' . dbQuote($name) . '")';            
        return dbQuery($query);
          
    }
    
    //фукнция удаления издательства    
    function deletePublishingHouse($name)
    {
        $query = 'DELETE FROM publishing_houses WHERE house_name = "' . dbQuote($name) . '"';
        return dbQuery($query);
    }
    
    //функция переименовывает издательство
    function renamePublishingHouse($oldName, $newName)
    {
        $query = 'UPDATE publishing_houses SET house_name = "' . dbQuote($newName) . '" WHERE house_name = "' . dbQuote($oldName) . '"';
        return dbQuery($query);
    }
    
    //функция возвращает все издательства в алфавитном порядке
    function loadAllPublishingHouses()
    {
        $query = 'SELECT id, house_name FROM publishing_houses ORDER by house_name';
        return dbQueryGetResult($query);
    }
    
    //фукнция возвращает id издательства по имени
    function getPublishingHouseIdByName($name)
    {
        $query = 'SELECT id FROM publishing_houses WHERE house_name = ' . $name . ' LIMIT 1';
        return dbQueryGetResult($query);
    }