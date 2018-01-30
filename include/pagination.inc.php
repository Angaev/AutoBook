<?php
  
    //возвращает состояние указателя (on, leftOff, rightOff, offAll)
    function getPointerState($currentPage, $lastPage)
    {
        $pointer = 'on';
        if ($currentPage == 1) {
            $pointer = 'leftOff';
        } 
        if ($currentPage == $lastPage) {
            $pointer = 'rightOff';
        } 
        if (($currentPage == 1) && ($currentPage == $lastPage)) {
            $pointer = 'offAll';
        }

        return $pointer;
    }
    
    function getPageList($currentPage, $lastPage)
    {
        //определяем левый край
        if ($currentPage - OFFSET_PAGINATION > 0) {
            $firstPagination = $currentPage - OFFSET_PAGINATION;
        } else {
            $firstPagination = 1;
        }

        //определяем правый край
        if ($currentPage + OFFSET_PAGINATION < $lastPage) {
            $lastPagination = $currentPage + OFFSET_PAGINATION;
        } else {
            $lastPagination =  $lastPage;
        }
        
        //создаем массив списка страниц
        $pageList = [];
        for ($i = $firstPagination; $i <= $lastPagination; $i++) {
            array_push($pageList, $i);
        }
        
        return $pageList;
    }