<?php
session_start();

function check_session() {
    if (!isset($_SESSION['login'])) {
        header("Location: ../pages/login.php");
        exit;
    }
}

// Pastikan pengguna sudah login
check_session();

// Periksa peran pengguna dan arahkan ke halaman yang sesuai
$userRole = $_SESSION['user_type'];
$current_page = basename($_SERVER['PHP_SELF']);

$adminpanel = array('dashboard.php', 'category.php', 'customer.php', 'product.php', 'customer-order.php', 'data-transaksi.php', 'edit-product.php', 'edit-harga.php');

if ($userRole === 'admin') {
    if (!in_array($current_page, $adminpanel)) {
        header("Location: adminpanel/dashboard.php");
        exit();
    }
} elseif ($userRole === 'employee') {
    if ($current_page !== 'adminpanel/dashboard-employee.php') {
        header("Location: adminpanel/dashboard-employee.php");
        exit();
    }
} elseif ($userRole === 'customer') {
    header("Location: " . base_url());
    exit();
}

// Tetapkan waktu timeout (dalam detik)
$timeout_duration = 900; // 900 detik = 15 menit

// Cek apakah waktu terakhir aktivitas telah ditetapkan
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Hitung waktu tidak aktif
    $inactive_time = time() - $_SESSION['LAST_ACTIVITY'];

    // Jika waktu tidak aktif melebihi batas waktu, logout
    if ($inactive_time >= $timeout_duration) {
        session_unset();
        session_destroy();
        header("Location: ../pages/login.php");
        exit();
    }
}

// Perbarui waktu terakhir aktivitas
$_SESSION['LAST_ACTIVITY'] = time();
?>
