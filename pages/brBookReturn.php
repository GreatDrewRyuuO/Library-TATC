<?php
include "./models/navbar.php";
include "./controllers/database.php";

function getBookDetailsById($bookId, $conn)
{
    $bookId = mysqli_real_escape_string($conn, $bookId);

    $query = "SELECT
    tb_borrow_book.*,
    tb_book.b_name,
    tb_member.m_name
    FROM
    tb_borrow_book
    INNER JOIN
    tb_book ON tb_book.b_id = tb_borrow_book.b_id
    INNER JOIN
    tb_member ON tb_member.m_user = tb_borrow_book.m_user
    WHERE tb_borrow_book.b_id = '$bookId'";

    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $bookDetails = $result->fetch_assoc();
        return $bookDetails;
    } else {
        return false;
    }
}
?>

<body>
    <div class="container mt-3 align-items-center justify-content-center">
        <div class="col mb-2 text-center">
            <a href="?page=brBookInsert" class="btn btn-success">ยืมคืนหนังสือ</a>
            <a href="?page=brBook" class="btn btn-success">คืนหนังสือ</a>
        </div>
        <h2 class="mb-4 text-center">คืนหนังสือ</h2>

        <form action="?page=brBookReturn" method="post" class="text-center">
            <div class="mb-3 text-center">
                <label for="bookId" class="form-label">รหัสหนังสือที่ต้องการคืน:</label>
                <input type="text" class="form-control" id="bookId" name="bookId" placeholder="รหัสหนังสือ" required>
                <button type="submit" class="btn btn-primary mt-3">ค้นหา</button>
            </div>
        </form>

        <br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["bookId"])) {
                $bookId = $_POST["bookId"];

                $bookDetails = getBookDetailsById($bookId, $conn);

                if ($bookDetails) {
                    $borrowerName = $bookDetails["m_name"];
                    $bookName = $bookDetails["b_name"];
                    $borrowDate = $bookDetails["br_date_br"];
                    $fine = $bookDetails["br_fine"];

                    echo '<div class="container mt-3 align-items-center justify-content-center">
                            <h2 class="mb-4 text-center">รายละเอียดหนังสือ</h2>
                            <form action="?page=brBookReturn" method="post">
                                <table class="table table-bordered text-center">
                                    <tbody>
                                        <tr>
                                            <td>รหัสหนังสือ:</td>
                                            <td>' . $bookId . '</td>
                                        </tr>
                                        <tr>
                                            <td>ชื่อหนังสือ:</td>
                                            <td>' . $bookName . '</td>
                                        </tr>
                                        <tr>
                                            <td>ผู้ยืม-คืนหนังสือ:</td>
                                            <td>' . $borrowerName . '</td>
                                        </tr>
                                        <tr>
                                            <td>วันที่ยืมหนังสือ:</td>
                                            <td>' . $borrowDate . '</td>
                                        </tr>
                                        <tr>
                                            <td>ค่าปรับ:</td>
                                            <td>
                                                <input type="number" name="fine" value="' . $fine . '" required>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" name="bookId" value="' . $bookId . '">
                                <button type="submit" class="btn btn-success" onclick="confirmAction()">คืนหนังสือ</button>
                                <button type="button" class="btn btn-danger" onclick="cancelAction()">ยกเลิก</button>
                            </form>
                        </div>';
                } else {
                    echo "ไม่พบข้อมูลหนังสือ";
                }
            }
            if (!empty($_POST["fine"])) {
                $updatedFine = $_POST["fine"];
                $bookId = $_POST["bookId"];

                $updateQuery = "UPDATE tb_borrow_book SET br_fine = '$updatedFine' WHERE b_id = '$bookId'";
                $conn->query($updateQuery);
            }
        }
        ?>

        <script>
            function confirmAction() {
                alert("ทำรายการสำเร็จ");
            }

            function cancelAction() {
                window.location.href = '?page=brBook';
            }
        </script>
    </div>
</body>
</html>
