<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatitble" content="IE=Edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nivia Ayu Andini Asih</title>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="admin.css" />
  <?php
  session_start();
  include("koneksi.php");
  if (!isset($_SESSION['email'])) {
    header("location:index.php");
  }

  ?>
  <script>
    // Fungsi untuk mengatur ulang timer
    function resetLogoutTimer() {
      // Jika ada timer lama, hapus terlebih dahulu
      clearTimeout(logoutTimer);
      // Atur timer ulang selama 5 detik (5000 ms)
      logoutTimer = setTimeout(function () {
        window.location.href = 'logout.php';
      }, 5000); // 5000 ms = 5 detik
    }
    // Set pertama kali timer logout saat halaman dimuat
    let logoutTimer = setTimeout(function () {
      window.location.href = 'logout.php';
    }, 5000); // 5000 ms = 5 detik
    // Event listener untuk aktivitas pengguna (gerakan mouse dan klik)
    window.addEventListener('mousemove', resetLogoutTimer);
    window.addEventListener('click', resetLogoutTimer);
    window.addEventListener('keypress', resetLogoutTimer);
  </script>
</head>

<body>



  <!-- navigation -->
  <div class="container">
    <div class="navigation">
      <ul>
        <li>
          <a href="#">
            <span class="icon"><ion-icon name="school-outline"></ion-icon></span>
            <span class="title">University</span>
          </a>
        </li>
        <li>
          <a href="?page=user">
            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
            <span class="title">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="input.html">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Form</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"><ion-icon name="tablet-landscape-outline"></ion-icon></span>
            <span class="title">Table</span>
          </a>
        </li>
        <li>
          <a href="chart.html">
            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
            <span class="title">Chart</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
            <span class="title">Setting</span>
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
            <span class="title">Password</span>
          </a>
        </li>
        <li>
          <a href="logout.php">
            <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
            <span class="title">Sign Out</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="main">
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
      <?php
      // Memuat halaman sesuai parameter "page"
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'user') {
          include "welcome.php";
        }

      } else {
        include "welcome.php";
      }
      ?>
    </div>
  </div>

  <!-- ionicons -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

  <script src="main.js"></script>
  <?php
  session_start();
  include("koneksi.php");
  if (!isset($_SESSION['email'])) {
    header("location:index.php");
  }
  echo $_SESSION['email'];
  ?>
</body>

</html>