<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password) && !empty($email)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (username, password, email, role) VALUES ('$username', '$hashed_password', '$email', 'member')";

        try {
            if ($conn->query($sql) === TRUE) {
                sleep(2);
                header("Location: /library_room/index.php");
                exit();
            } else {
                echo "ขออภัย บัญชีนี้มีผู้ใช้งานอยู่แล้ว";
            }
        } catch (mysqli_sql_exception $e) {
            echo "ขออภัย บัญชีนี้มีผู้ใช้งานอยู่แล้ว";
        }
    } else {
        echo "กรุณากรอกข้อมูลให้ครบถ้วน";
    }
}
?>
