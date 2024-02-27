<?php
include "./models/navbar.php";
include "./controllers/database.php";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$queryBooks = "SELECT COUNT(*) as total_books FROM tb_book";
$resultBooks = $conn->query($queryBooks);
$rowBooks = $resultBooks->fetch_assoc();
$totalBooks = $rowBooks['total_books'];

$queryTransactions = "SELECT COUNT(*) as total_transactions FROM tb_borrow_book";
$resultTransactions = $conn->query($queryTransactions);
$rowTransactions = $resultTransactions->fetch_assoc();
$totalTransactions = $rowTransactions['total_transactions'];

$queryMembers = "SELECT COUNT(*) as total_members FROM tb_member";
$resultMembers = $conn->query($queryMembers);
$rowMembers = $resultMembers->fetch_assoc();
$totalMembers = $rowMembers['total_members'];

$queryOverdueBooks = "SELECT COUNT(*) as total_overdue_books FROM tb_borrow_book WHERE br_date_rt = '0000-00-00';";
$resultOverdueBooks = $conn->query($queryOverdueBooks);
$rowOverdueBooks = $resultOverdueBooks->fetch_assoc();
$totalOverdueBooks = $rowOverdueBooks['total_overdue_books'];

$conn->close();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-6 col-sm-3">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <ion-icon name="people-outline"></ion-icon>
                    หนังสือทั้งหมด (เล่ม)
                </div>
                <div class="card-body">
                    <h5 class="card-title">จำนวน <?php echo $totalBooks; ?> เล่ม</h5>
                    <p class="card-text">
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <ion-icon name="cart-outline"></ion-icon>
                    การใช้บริการยืม-คืนหนังสือทั้งหมด (ครั้ง)
                </div>
                <div class="card-body">
                    <h5 class="card-title">จำนวน <?php echo $totalTransactions; ?> ครั้ง</h5>
                    <p class="card-text">
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <ion-icon name="desktop-outline"></ion-icon>
                    สมาชิกทั้งหมด (คน)
                </div>
                <div class="card-body">
                    <h5 class="card-title">จำนวน <?php echo $totalMembers; ?> คน</h5>
                    <p class="card-text">
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-3">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <ion-icon name="cash-outline"></ion-icon>
                    หนังสือค้างส่ง (เล่ม)
                </div>
                <div class="card-body">
                    <h5 class="card-title"> จำนวน <?php echo $totalOverdueBooks; ?> เล่ม</h5>
                    <p class="card-text">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>