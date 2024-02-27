<?php
include '/controllers/database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    $deleteUsername = $_GET['username'];
    $stmt = $conn->prepare("DELETE FROM user WHERE username = ?");
    $stmt->bind_param("s", $deleteUsername);

    if ($stmt->execute()) {
        header("Location: ?page=manageUsers");

    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    $stmt->close();
}
?>
