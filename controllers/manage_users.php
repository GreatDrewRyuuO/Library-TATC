<?php
include 'database.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT
    *
    FROM
    tb_borrow_book
    INNER JOIN
    tb_book ON tb_book.b_id = tb_borrow_book.b_id
    INNER JOIN
    tb_member ON tb_member.m_user = tb_borrow_book.m_user";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
