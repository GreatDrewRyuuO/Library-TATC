<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['m_user'];
    $password = $_POST['m_pass'];

    $stmt = $conn->prepare("SELECT * FROM tb_member WHERE m_user = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['m_user'] == $username) {
            $_SESSION['username'] = $username;
            header("Location: ?page=brBook");
            exit();
        }
    }

    header("Location: ?page=home");
    exit();
}
?>
