<?php
include "./models/navbar.php";
include "./controllers/manage_users.php";

$current_page = isset($_GET['page']) ? $_GET['page'] : '';

if ($current_page === 'brBook') {
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM tb_borrow_book
            INNER JOIN tb_book ON tb_book.b_id = tb_borrow_book.b_id
            INNER JOIN tb_member ON tb_member.m_user = tb_borrow_book.m_user
            WHERE b_name LIKE '%$searchTerm%' OR m_name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);
}
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>การจัดการข้อมูลการยืม-คืนหนังสือ</h2>
        </div>

        <form class="d-flex" role="search" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="page" value="brBook">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


        <div class="col mt-4 mb-2">
            <a href="?page=brBookInsert" class="btn btn-success">ยืมคืนหนังสือ</a>
            <a href="?page=dashboard" class="btn btn-success">ข้อมูลสถิติ</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>รหัสหนังสือ</th>
                        <th>ชื่อหนังสือ</th>
                        <th>ผู้ยืม-คืน</th>
                        <th>วันที่ยืม</th>
                        <th>วันที่คืน</th>
                        <th>ค่าปรับ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display search results
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['b_id']; ?></td>
                            <td><?php echo $row['b_name']; ?></td>
                            <td><?php echo $row['m_name']; ?></td>
                            <td><?php echo $row['br_date_br']; ?></td>
                            <td><?php echo $row['br_date_rt']; ?></td>
                            <td><?php echo $row['br_fine']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>