<!-- ======== order detail ========= -->
<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Data Statistik</h2>
        </div>
        <canvas id="barChart"></canvas>
    </div>
    <!-- ========== detail Customer ========= -->
    <div class="recentCustomer">
        <div class="cardHeader">
            <h2>Data Statistik</h2>
        </div>
        <a href="data_chart" class="btn"></a>
        <canvas id="doughnutChart"></canvas>
    </div>
</div>
<!-- end main -->
</div>
<!-- end container -->
</div>
<!-- Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById("barChart");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [
                        <?php
                        include "koneksi.php";
                        $query = mysqli_query($conn, "SELECT * FROM

tbl_user where jk = 'L'");

                        echo mysqli_num_rows($query);
                        ?>,
                        <?php
                        $query2 = mysqli_query($conn, "SELECT * FROM

tbl_user where jk = 'P'");

                        echo mysqli_num_rows($query2);
                        ?>
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>
<!-- memanggil file Chart.js -->
<!-- <script src="js/barChart.js"></script> -->
<script>
    const ctx2 = document.getElementById("doughnutChart");
    new Chart(ctx2, {
        type: "doughnut",
        data: {
            labels: ["Admin", "User"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [
                        <?php
                        $data = mysqli_query($conn, "SELECT * FROM account where

akses = '1'");

                        echo mysqli_num_rows($data);
                        ?>,
                        <?php
                        $data2 = mysqli_query($conn, "SELECT * FROM account

where akses = '2'");

                        echo mysqli_num_rows($data2);
                        ?>
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>
<script>
    const ctx = document.getElementById("barChart");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [
                {
                    label: "# of Votes",
                    data: [
                        <?php
                        include "koneksi.php";
                        // Hitung jumlah data untuk "Laki-laki"
                        $queryL = mysqli_query($conn, "SELECT * FROM tbl_user WHERE jk = 'L'");
                        echo mysqli_num_rows($queryL);
                        ?>,
                        <?php
                        // Hitung jumlah data untuk "Perempuan"
                        $queryP = mysqli_query($conn, "SELECT * FROM tbl_user WHERE jk = 'P'");
                        echo mysqli_num_rows($queryP);
                        ?>
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
</script>