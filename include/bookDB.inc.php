<?php
    //здесь хранятся функции работы с БД для книг
    
    function loadDataBooks($page)
    {
        
        $start = ($page - 1) * LIMIT_ON_PAGE;
        $query = '
              SELECT books.id, books.name, books.year,
              IFNULL(books.image, "img/book_cover/no_cover.png") as image,
              (SELECT COUNT(DISTINCT id) FROM likes WHERE likes.book_id = books.id AND likes.actual = 1) AS likeCount, 
              (SELECT COUNT(DISTINCT id) FROM comments WHERE comments.book_id = books.id AND comments.actual = 1) AS commentCount 
              FROM books
              LEFT JOIN publishing_houses ON books.publishing_house_id = publishing_houses.id 
              ORDER BY books.id DESC
              LIMIT ' . dbQuote($start) . ', ' . dbQuote(LIMIT_ON_PAGE);
        return dbQueryGetResult($query);
    }
    
    
    //добавляет новую книгу (не проверяет была ли такая уже)
    function addBook($name, $year, $houseId)
    {
        $query = "INSERT INTO books (name, publishing_house_id, year) 
            VALUES('" . dbQuote($name) . "', '" . dbQuote($houseId) . "', '" . dbQuote($year) . "')";
        dbQuery($query);
    }
    
    //функция возвращает true если id занят (книга сущ)
    function isBookExist($id)
    {
        $query = 'SELECT id FROM books WHERE id = ' . dbQuote($id);
        return dbQuery($query);
    }
    
    //добавляет адрес картинки к указанному id книги
    //img/book_cover/cover.jpg  например
    function addBookCover($id, $path)
    {
        $query = 'UPDATE books set image = "' . dbQuote($path) . '" WHERE id = ' . dbQuote($id);
        return dbQuery($query);
    }
    
    
    function addBookDescription($book_id, $description)
    {
        $query = "INSERT INTO book_description (book_id, description) VALUES('" . dbQuote($book_id) . "', '" . dbQuote($description) . "')";
        
        return dbQuery($query);
    }
    
    function getCountBooksByName($name)
    {
        $query = '
                  SELECT COUNT(*) AS cnt FROM books 
                  WHERE books.name LIKE "%' . dbQuote($name) . '%"';
        $data = dbQueryGetResult($query);
        return $data[0]['cnt'];
    }
    
    function getBooksByName($name, $page)
    {        
        $start = ($page - 1) * LIMIT_ON_PAGE;
        $query = '
              SELECT books.id, books.name, books.year, publishing_houses.house_name, 
              IFNULL(books.image, "img/book_cover/no_cover.png") as image, 
              IFNULL(COUNT(likes.book_id), 0) as likeCount, 
              IFNULL(COUNT(comments.book_id), 0) as commentCount 
              FROM books 
              LEFT JOIN 
                publishing_houses 
                on books.publishing_house_id = publishing_houses.id 
              LEFT JOIN 
                likes 
                on books.id = likes.book_id 
                  and 
                  likes.actual = 1 
              LEFT JOIN 
                comments 
                ON books.id = comments.book_id 
                  and 
                  comments.actual = 1 
              WHERE 
                books.name LIKE "%' . dbQuote($name) . '%"
              GROUP BY books.id, books.name, books.year, publishing_houses.house_name, 
              image              
              LIMIT ' . dbQuote($start) . ', ' . dbQuote(LIMIT_ON_PAGE);

        return dbQueryGetResult($query);
    }
    
    function getTop50Books($page)
    {
        $start = ($page - 1) * LIMIT_ON_PAGE;
        $onPage = LIMIT_ON_PAGE;
        if ($page >= 3 ) {
            $onPage = 10;
        }
        $query = '
              SELECT books.id, books.name, books.year, publishing_houses.house_name, 
              IFNULL(books.image, "img/book_cover/no_cover.png") as image, 
              IFNULL(COUNT(likes.book_id), 0) as likeCount, 
              IFNULL(COUNT(comments.book_id), 0) as commentCount 
              FROM books 
              LEFT JOIN 
                publishing_houses 
                on books.publishing_house_id = publishing_houses.id 
              LEFT JOIN 
                likes 
                on books.id = likes.book_id 
                  and 
                  likes.actual = 1 
              LEFT JOIN 
                comments 
                ON books.id = comments.book_id 
                  and 
                  comments.actual = 1 
              GROUP BY 
                books.id, books.name, books.year, publishing_houses.house_name, image
              ORDER BY likeCount DESC
              LIMIT ' . dbQuote($start) . ', ' . dbQuote(LIMIT_ON_PAGE) . '';
        return dbQueryGetResult($query);
    }
    
    function loadBookData($id)
    {
        $query = '
              SELECT books.id, books.name, books.year, publishing_houses.house_name, 
              IFNULL(books.image, "img/book_cover/no_cover.png") as image, 
              IFNULL(COUNT(likes.book_id), 0) as likeCount, 
              IFNULL(COUNT(comments.book_id), 0) as commentCount 
              FROM books 
              LEFT JOIN 
                publishing_houses 
                on books.publishing_house_id = publishing_houses.id 
              LEFT JOIN 
                likes 
                on books.id = likes.book_id 
                  and 
                  likes.actual = 1 
              LEFT JOIN 
                comments 
                ON books.id = comments.book_id 
                  and 
                  comments.actual = 1 
              WHERE 
                books.id = ' . dbQuote($id) . '
              GROUP BY 
                books.id, books.name, books.year, publishing_houses.house_name, image';
             
        return dbQueryGetResult($query);
    }
    
    function loadDescription($id)
    {
        $query = 'SELECT description as text FROM book_description
                 WHERE book_id = ' . dbQuote($id);
        $data = dbQueryGetResult($query);
        return isset($data[0]['text']) ? $data[0]['text'] : '';
    }
    
    function loadLink($id)
    {
        $query = 'SELECT link FROM book_links 
                  WHERE book_id ='. dbQuote($id);
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
            return $result[0]["link"];
        }
        return '';
    }
    
    function addBookLink($bookId, $link)
    {
        $query = 'INSERT INTO book_links (book_id, link)
                  VALUES ("' . dbQuote($bookId) . '", "' . dbQuote($link) . '")';
        return dbQuery($query);
    }
    
    function isUserAlreadyLikeBook($userId, $bookId)
    {
        $query = 'SELECT id FROM likes 
                  WHERE user_id = "' . dbQuote($userId) . '" and book_id = "' . dbQuote($bookId).'" ';
        return (!empty(dbQueryGetResult($query)));
    }
    
    function isActualLike($userId, $bookId)
    {
        $query = 'SELECT actual FROM likes 
                  WHERE user_id = "' . dbQuote($userId) . '" and book_id = "' . dbQuote($bookId) . '" ';
        $result = dbQueryGetResult($query);
        return ($result[0]["actual"] == 1);
    }
    
    function flipActualLike($userId, $bookId) 
    {
        if (isActualLike($userId, $bookId)) {
            $query = 'UPDATE likes SET actual = 0 
                      WHERE user_id = "' . dbQuote($userId) . '" and book_id = "' . dbQuote($bookId).'" ';
        } else {
            $query = 'UPDATE likes SET actual = 1 
            WHERE user_id = "' . dbQuote($userId) . '" and book_id = "' . dbQuote($bookId).'" ';
        }
        return dbQuery($query);
    }
    
    function likeBook($userId, $bookId)
    {
        if (isUserAlreadyLikeBook($userId, $bookId)) {
            return flipActualLike($userId, $bookId);
        } else {
            $query = 'INSERT INTO likes (user_id, book_id) VALUES (' . dbQuote($userId) . ', ' . dbQuote($bookId) . ')';
            return dbQuery($query);
        }
        
    }
    
    //возвращает кол-во книг в базе 
    function getCountBooks()
    {
        $query = 'SELECT COUNT(*) as CNT FROM books';
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
            return $result[0]["CNT"];
        }
    }
    
    function deleteBook($id)
    {
        $query = 'DELETE FROM books WHERE id = ' . dbQuote($id);
        return dbQuery($query);
    }
    
    //обновляет название, издательство, год, ссылку книги, данные берет из bookInfo
    function updateBook($bookInfo) 
    {
        $query = 'UPDATE books SET 
                    name = "' . dbQuote($bookInfo['name']) . '", 
                    publishing_house_id = "' . dbQuote($bookInfo['publishing_house']) . '",
                    year = "' . dbQuote($bookInfo['year']) . '"
                  WHERE books.id = "' . dbQuote($bookInfo['bookId']) . '"';
        return dbQuery($query);
    }
    

    function isBookDescriptionEmpty($id)
    {
        $query = 'SELECT * FROM book_description WHERE book_id = "' . dbQuote($id) . '"';
        $result = dbQueryGetResult($query);
        return empty($result);
    }
    
    //обновляет описание книги, данные берет из bookInfo
    function updateBookDescription($bookInfo) 
    {
        if (!isBookDescriptionEmpty($bookInfo['bookId'])) {
            $query = 'UPDATE book_description SET 
                        description = "' . dbQuote($bookInfo['book_description']) . '"
                      WHERE book_id = "' . dbQuote($bookInfo['bookId']) . '"';
            return dbQuery($query);
        }
        return (addBookDescription($bookInfo['bookId'], $bookInfo['book_description']));
        
    }
    
    function isBookLinkEmpty($id)
    {
        $query = 'SELECT * FROM book_links WHERE book_id = "' . dbQuote($id) . '"';
        $result = dbQueryGetResult($query);
        return empty($result);
    }
    
    function updateBookLink($bookInfo)
    {
        if (!isBookLinkEmpty($bookInfo['bookId'])) {
            $query = 'UPDATE book_links SET 
                        link = "' . dbQuote($bookInfo['link']) . '"
                      WHERE book_id = "' . dbQuote($bookInfo['bookId']) . '"';
            return dbQuery($query);
        }
        return (addBookLink($bookInfo['bookId'], $bookInfo['link']));
    }
    
    
    function updateBookCover($bookInfo)
    {   
        if ((!$bookInfo['path']) && !$bookInfo['deleteCover']) {
            return true;
        }
        
        
        $image = (($bookInfo['deleteCover'])) ? "NULL" : ('"' . dbQuote($bookInfo['path']) . '"');
        
        $query = 'UPDATE books 
                  SET 
                      image = ' . $image . '
                  WHERE
                    id = "' . dbQuote($bookInfo['bookId']) . '" ';
                    
        return dbQuery($query);
    }
    
    function getLikesBooks($userId, $limit)
    {
        $query = '
                  SELECT 
                    B.name, b.image, b.id
                  FROM
                    likes as L
                  INNER JOIN
                    Books as B ON L.book_id = B.id
                  WHERE
                    L.user_id = "' . dbQuote($userId) . '"
                    AND
                    L.actual = 1
                  ORDER BY
                    L.date DESC
                  LIMIT ' . dbQuote($limit) . '
                  ';
        return dbQueryGetResult($query);
    }
    
    function getAllLikedBooks($userId, $page)
    {
        $start = ($page - 1) * LIMIT_ON_PAGE;
        $query = "
              SELECT books.id, books.name, books.year,  publishing_houses.house_name,
                IFNULL(books.image, 'img/book_cover/no_cover.png') as image,
                IFNULL(res.likeResCount, 0) as likeCount,
                IFNULL(commentRes.commentResCount, 0) as commentCount
              FROM books 
              LEFT JOIN 
                publishing_houses 
                  on books.publishing_house_id = publishing_houses.id
              LEFT JOIN 
                (
                  SELECT COUNT(likes.book_id) as likeResCount, books.id  as book_id
                    FROM likes 
                    LEFT JOIN 
                      books on books.id = likes.book_id  
                    WHERE likes.actual = 1 
                    group BY books.id 
                ) AS res on res.book_id = books.id
              LEFT JOIN
                (
                  SELECT COUNT(comments.book_id) as commentResCount, books.id as book_id
                  FROM 
                    comments
                  LEFT JOIN 
                    books ON books.id = comments.book_id
                  WHERE comments.actual = 1
                  GROUP BY
                    books.id 
                ) as commentRes on commentRes.book_id = books.id
              INNER JOIN
                likes as L on books.id = L.book_id
              WHERE 
                L.user_id = '" . dbQuote($userId) . "'
                AND
                L.actual = 1
              LIMIT " . dbQuote($start) . ", " . dbQuote(LIMIT_ON_PAGE);

        return dbQueryGetResult($query);
    }
    
    function getCountLikedBooks($userId)
    {
        $query = '
                  SELECT COUNT(*) as Count
                  FROM
                    Books as B
                  INNER JOIN
                    likes as L on B.id = L.book_id
                  WHERE
                    L.user_id = "' . dbQuote($userId) . '"
                    AND
                    L.actual = 1';
        $result = dbQueryGetResult($query);
        if (!empty($result)) {
            return $result[0]["Count"];
        }
    }