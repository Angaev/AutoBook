<?php
    //здесь хранятся функции работы с БД для комментариев

    function getCountCommentsBook($bookId)
    {
        $query = '
                  SELECT COUNT(*) as CNT FROM comments
                  WHERE
                    book_id = "' . dbQuote($bookId) . '"
                  ';
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
            return($result[0] ["CNT"]);
        }
    }
    
    function getCommentsBook($book_id)
    {
        $query = '
                  SELECT 
                    U.Name, U.Subname, U.img, C.date, C.comment, C.id, C.book_id 
                  FROM comments as C
                  INNER JOIN
                    users as U ON C.user_id = U.id
                  WHERE
                    C.book_id = "' . dbQuote($book_id) . '" AND C.actual = 1
                  ORDER BY 
                  C.date DESC
                  ';
        return dbQueryGetResult($query);
    }
    
    function addComment($userId, $bookId, $comment)
    {
        $query = '
                  INSERT INTO comments (user_id, book_id, comment)
                  VALUES ("' . dbQuote($userId) . '", "' . dbQuote($bookId) . '", "' . dbQuote($comment) . '")';
        return dbQuery($query);
    }
    
    function deleteComment($id)
    {
        $query = '
                  DELETE FROM comments
                  WHERE
                    id = ' . dbQuote($id);
        return dbQuery($query);
    }
    
    function getLastComment($userId)
    {
        $query = '
                  SELECT C.comment, B.name, C.date, C.book_id, C.date
                  FROM
                    comments as C
                  INNER JOIN
                    books as B ON C.book_id = B.id
                  WHERE
                    C.user_id = "' . dbQuote($userId) . '"
                    AND
                    c.actual = 1
                  ORDER BY
                    C.date DESC
                  LIMIT 1
                 ';
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
          return $result[0];
        }
    }
    
    function getAllComment($userId)
    {
        $query = '
                  SELECT C.comment, B.name, C.date, C.book_id
                  FROM
                    comments as C
                  INNER JOIN
                    books as B ON C.book_id = B.id
                  WHERE
                    C.user_id = "' . dbQuote($userId) . '"
                    AND
                    c.actual = 1
                  ORDER BY
                    C.date DESC
                 ';
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
          return $result;
        }
    }