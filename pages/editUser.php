<?php
include "./models/navbar.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $editEmail = mysqli_real_escape_string($conn, $_POST['editEmail']);
    $editRole = mysqli_real_escape_string($conn, $_POST['editRole']);
    $editUsername = mysqli_real_escape_string($conn, $_POST['editUsername']);

    $updateSql = "UPDATE tb_member SET email='$editEmail', role='$editRole' WHERE username='$editUsername'";
    if ($conn->query($updateSql) === TRUE) {
        header("Location: ?page=manageUser");
        exit();
    } else {
        echo "Error updating user information: " . $conn->error;
    }
}

?>

<div class="container mt-5">
    <h2 class="text-center">Edit User</h2>

    <?php
    if (isset($_GET['username'])) {
        $editUsername = $_GET['username'];

        $sql = "SELECT * FROM user WHERE username = '$editUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
    ?>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="editUsername" class="form-label">Username:</label>
                    <input type="text" id="editUsername" name="editUsername" value="<?php echo $user['m_user']; ?>" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="editEmail" class="form-label">Email:</label>
                    <input type="text" id="editPassword" name="editPassword" value="<?php echo $user['m_pass']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="editRole" class="form-label">Role:</label>
                    <select id="editRole" name="editRole" class="form-select" required>
                        <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="member" <?php echo ($user['role'] == 'member') ? 'selected' : ''; ?>>Member</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>

    <?php
        } else {
            echo "User not found";
        }
    } else {
        echo "Invalid request. Username not specified.";
    }
    ?>
</div>