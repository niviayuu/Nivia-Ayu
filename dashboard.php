<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nivia Ayu Andini Asih</title>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="admin.css" />

    <?php
    session_start();
    include("koneksi.php");

    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['email'])) {
        header("location:index.php");
    }
    ?>

    <script>
        // Fungsi untuk mengatur ulang timer logout
        function resetLogoutTimer() {
            clearTimeout(logoutTimer);
            logoutTimer = setTimeout(function () {
                window.location.href = 'logout.php';
            }, 50000); // Waktu dalam milidetik (50 detik)
        }

        // Set pertama kali timer logout saat halaman dimuat
        let logoutTimer = setTimeout(function () {
            window.location.href = 'logout.php';
        }, 50000);

        // Event listener untuk aktivitas pengguna (gerakan mouse dan klik)
        window.addEventListener('mousemove', resetLogoutTimer);
        window.addEventListener('click', resetLogoutTimer);
        window.addEventListener('keypress', resetLogoutTimer);
    </script>
</head>

<body>
    <!-- Container -->
    <div class="container">
        <!-- Navigation -->
        <div class="navigation">
            <ul>
                <li><a href="#">
                        <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
                        <span class="title">University</span>
                    </a>
                </li>
                <li><a href="?page=dashboard">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li><a href="?page=form">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">Form</span>
                    </a>
                </li>
                <li>
                    <a href="?page=chart">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title"> Data Chart</span>
                    </a>
                </li>
                <li><a href="?page=tabelbiasa">
                        <span class="icon"><ion-icon name="tablet-landscape-outline"></ion-icon></span>
                        <span class="title">Table</span>
                    </a>
                </li>
                <li><a href="?page=chart">
                        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                        <span class="title">Chart</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengguna">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">Pengguna</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                        <span class="title">Setting</span>
                    </a>
                </li>
                <li><a href="#">
                        <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <span class="title">Password</span>
                    </a>
                </li>
                <li><a href="logout.php">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main">
            <!-- Topbar -->
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <div class="search">
                    <label>
                        <input type="text" placeholder="search here" />
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <div class="user">
                    <img src="img/avatar1.jpg" alt="" />
                </div>
            </div>

            <!-- Page Content -->
            <?php
            // Memuat halaman sesuai parameter "page"
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if ($page == 'dashboard') {
                    include "welcome.php";
                } elseif ($page == 'form') {
                    include 'from.php';
                } elseif ($page == 'table') {
                    include "tabel.php";
                } elseif ($page == 'tabelbiasa') {
                    include 'tabel_a.php';
                } elseif ($page == 'chart') {
                    include 'chart.php';
                } elseif ($page == 'pengguna') {
                    include 'pengguna.php';
                } elseif ($page == 'form_input') {
                    include 'form_data.php';
                } elseif ($page == 'edit_data') {
                    include 'edit_data.php';
                } elseif ($page == 'data_chart') {
                    include 'data_chart.php';
                }
                else {
                    include "welcome.php";
                }
            } else {
                include "welcome.php";
            }
            ?>
        </div>
    </div>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="main.js"></script>

    <?php
    // Menampilkan email pengguna yang sedang login
    echo $_SESSION['email'];
    ?>
</body>

</html>