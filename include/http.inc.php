<?php
  
    function redirect($place)
    { 
        header('Location: '. $place );
        exit(0);
    }
    
    //��������� ���� �� ��������� ����� <input type="file" .../>
    //� ���������� ���� ���� �������� ��� false
    function saveFile($folder, $formName, $prefix)
    {
        $prefix = $prefix . '_';
        $uploadfile = '../' . $folder . basename($prefix . $_FILES[$formName]['name']);

        if (move_uploaded_file($_FILES[$formName]['tmp_name'], $uploadfile)) {
            $fileName = basename($prefix . $_FILES[$formName]['name']);
            $path = $folder . $fileName;
            return $path;
        } else {
            return false;
        }
    }