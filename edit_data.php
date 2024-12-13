<div class="details">

    <div class="recentOrder">
        <div class="text">Form Edit Data</div>
        <hr />
        <form action="" class="form_input" method="POST">
            <?php
            include "koneksi.php";
            $id = $_GET['id'];
            $data = mysqli_query($conn, "SELECT * FROM tbl_user where id_account=$id");
            $show = mysqli_fetch_assoc($data);
            ?>
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="nama" value="<?php echo $show['nama']; ?>" placeholder="Enter full name"
                    required />
            </div>
            <div class="input-box">
                <label>Phone Number</label>
                <input type="number" value="<?php echo $show['telepon']; ?>" name="telepon"
                    placeholder="Enter phone number" required />
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Birth Place</label>
                    <input type="text" value="<?php echo $show['tempatlahir']; ?>" name="tempat"
                        placeholder="Enter birth place" required />
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" name="tgl" value="<?php echo $show['tgl_lahir']; ?>"
                        placeholder="Enter birth date" required />
                </div>
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" <?php if ($show['jk'] == 'L')
                            echo 'checked' ?> value="L"
                                name="gender" />
                            <label for="check-male">Male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" <?php if ($show['jk'] == 'P')
                            echo 'checked' ?> value="P"
                                name="gender" />
                            <label for="check-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="input-box address">
                    <label>Address</label>
                    <input type="text" name="alamat" value="<?php echo $show['alamat']; ?>"
                    placeholder="Enter street address" required />
            </div>
            <button type="submit" name="button">Submit</button>
        </form>
    </div>

</div>

<style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Container for the form */
    .details {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Header */
    .recentOrder .text {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    /* Form styling */
    .form_input {
        display: flex;
        flex-direction: column;
    }

    /* Input boxes and labels */
    .input-box {
        margin-bottom: 15px;
    }

    .input-box label {
        font-size: 14px;
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }

    .input-box input {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        outline: none;
    }

    .input-box input:focus {
        border-color: #007bff;
    }

    /* Multi-column layout */
    .column {
        display: flex;
        justify-content: space-between;
        gap: 15px;
    }

    /* Gender section */
    .gender-box {
        margin-bottom: 15px;
    }

    .gender-box h3 {
        font-size: 16px;
        margin-bottom: 10px;
        font-weight: bold;
        color: #555;
    }

    .gender-option {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .gender label {
        font-size: 14px;
        font-weight: normal;
        color: #555;
    }

    .gender input {
        margin-right: 5px;
    }

    /* Address field */
    .address {
        margin-bottom: 15px;
    }

    /* Submit Button */
    button[type="submit"] {
        background-color: #007bff;
        color: white;
        font-size: 16px;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    button[type="submit"]:active {
        background-color: #004085;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .column {
            flex-direction: column;
        }

        .input-box input {
            font-size: 12px;
            padding: 8px;
        }

        button[type="submit"] {
            font-size: 14px;
            padding: 8px;
        }
    }
</style>

<?php
include "koneksi.php";
if (isset($_POST['button'])) {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $tempat = $_POST['tempat'];
    $tgl = $_POST['tgl'];
    $jk = $_POST['gender'];
    $alamat = $_POST['alamat'];

    $data = "UPDATE tbl_user SET nama = '$nama',
telepon = '$telepon',
tempatlahir = '$tempat',
tgl_lahir = '$tgl',
jk = '$jk',
alamat = '$alamat' where id_account=$id";
    if (mysqli_query($conn, $data)) {
        echo "<script>
Swal.fire({
title: 'Edit Data',
text: 'Edi Data Success.',
icon: 'success',
}).then(() => {
window.location.href = '?page=pengguna';
});
</script>";
    } else {
        echo "<script>
Swal.fire({
icon: 'error',
title: 'Edit Data Fault',
text: 'Try Again..!',
}).then(() => {
window.location.href = '?page=pengguna';
});
</script>";
    }
}
?>