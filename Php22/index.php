<?php

$host = '127.0.0.1';
$db   = 'labas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options); // pdo objektas

// SELECT column_name(s)
// FROM table1
// INNER JOIN table2
// ON table1.column_name = table2.column_name;

$sql = "SELECT `name`, surname, title, authors.id AS aid,  books.id AS bid
FROM authors
LEFT JOIN books
ON authors.id = books.author_id
-- WHERE books.id <5
ORDER BY `name`
";


$stmt = $pdo->query($sql); // steitmento objektas
echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li><b>ID:'.$row['aid'].'</b> '.$row['name'].' '.$row['surname']. ' '.$row['bid'].' '.$row['title']. '</li>';
}
echo "</ul>";
echo "<br>";


// SELECT customerName, customercity, customermail, salestotal
// FROM onlinecustomers AS oc
//    INNER JOIN
//    orders AS o
//    ON oc.customerid = o.customerid
//    INNER JOIN
//    sales AS s
//    ON o.orderId = s.orderId

$sql = "SELECT `name`, surname, title, a.id AS aid,  b.id AS bid
FROM authors AS a
INNER JOIN auth_books AS ab
ON a.id = ab.author_id
INNER JOIN books AS b
ON b.id = ab.book_id

ORDER BY b.title
";

$stmt = $pdo->query($sql); // steitmento objektas
echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li><b>ID:'.$row['aid'].'</b> '.$row['name'].' '.$row['surname']. ' '.$row['bid'].' '.$row['title']. '</li>';
}
echo "</ul>";

//----------------------

// Zinom knygos id

// $sql = "INSERT INTO authors
// (`name`, surname)
// VALUES ('Slyva', 'Abrikosovicius')
// ";

// $pdo->query($sql);

// $lastId = $pdo->lastInsertId();
// echo $lastId;

// $sql = "INSERT INTO auth_books
// (author_id, book_id)
// VALUES ($lastId, 1)
// ";

// $pdo->query($sql);

