<?php
    //здесь хранятся функции работы с БД
  
    //фукнция проверяет есть ли заданная книга
    function checkPublishingHouseExist($name)
    {
        $query = '
            SELECT * FROM publishing_houses WHERE house_name = "'. $name . '"';
        $answer = dbQueryGetResult($query);
        
        if (!empty(dbQueryGetResult($query))) {
            return true;
            //такая книга есть
        } else {
            return false;
            //такой книги нет
        }
    }
    
    //фукнция добавления издательства
    function addPublishingHouse($name)
    {
        if (!checkPublishingHouseExist($name)) {  
          $query = '
              INSERT INTO publishing_houses (house_name) VALUES("'. $name . '")';
              
          if (dbQuery($query)) {
              return true;
          } else {
              return false;
          }
        } else {
            return false;
        }
    }
    
    //фукнция удаления издательства    
    function deletePublishingHouse($name)
    {
        $query = 'DELETE FROM publishing_houses WHERE house_name = "'. $name .'"';
        if (dbQuery($query)) {
            return true;
        } else {
            return false;
        }
    }
    
    //функция переименовывает издательство
    function renamePublishingHouse($oldName, $newName)
    {
        $query = 'UPDATE publishing_houses SET house_name = "'. $newName .'" WHERE house_name = "'. $oldName .'"';
        if (dbQuery($query)) {
            return true;
        } else {
            return false;
        }
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