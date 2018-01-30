<?php
//Здесь обкатываются функции
require_once('include/common.inc.php');


$query = 'select books.id, books.name, books.year, books.image, books.image, publishing_houses.house_name, 
          res.likeCount
          from books 
          left join 
            publishing_houses on books.publishing_house_id = publishing_houses.id
          left join 
            (
              SELECT COUNT(likes.book_id) as likeCount, books.name as name
                from likes left join books on likes.book_id = books.id 
                group BY books.name
            ) AS res on res.name = books.name
          where
            likes.book_id = books.id
          ';
            
//$vars = dbQueryGetResult($query);

// if (isUserLogin()) {
    // echo 'Этот залогинен';
// }

// if (isAdmin()) {
    // echo "админ";
// } else {
    // echo "не админ";
// }

//var_dump(loadHeaderLinks());


//redirectToIndex('result=1');



//select * from books left join publishing_houses on books.publishing_houses_id = publishing_houses.id;
/*
$email = 'some@yandex.ru';
$passHash = md5('password');
$name = 'Имя';
$subname = 'Фамилия';

if (createUser($email, $passHash, $name, $subname)) {
    echo 'Получилось';
} else {
    echo 'Не удалось';
}
*/

/*
if (isUserLogin()) {
    echo 'Логин';
} else {
    echo 'Не логин';
}*/

//var_dump loadHeaderLinks();
$bookId = 4;
$link = 'www.yandex.ru';

    if (!isset($_SESSION['user_id'])) {
        $userId = null;
    } else {
        $userId = $_SESSION['user_id'];
    }
// if (isUserBan($id)) {
    // echo 'Бан';
// } else {
    // echo 'Не бан';
// }

$login = 'ban@ban.ru';
$pass = 'password';
$name = 'acura';
$book_id = 2;
$commentId = 8;
//echo (getCountCommentsBook($book_id));
var_dump(deleteComment($commentId));