<div class="detailTable">
  <div class="recentTable">
    <div class="titleTable">
      <h2>Responsive Table</h2>
      <a href="#" class="btn">Add New</a>
    </div>
    <table id="myTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Status</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "koneksi.php";
        $no = 1;
        $data = mysqli_query($conn, "SELECT * FROM account");
        while ($show = mysqli_fetch_array($data)) {
          echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $show["email"] . "</td>
                    <td>" . $show["akses"] . "</td>
                    <td>
                    <a href='#' class='btn-edit'
                    ><ion-icon name='create-outline'></ion-icon
                    ></a>
                    |
                    <a href='#' class='btn-delete'
                    ><ion-icon name='trash-outline'></ion-icon
                    ></a>
                    </td>
                    </tr>
                  ";
        } ?>
      </tbody>
    </table>
  </div>
</div>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="jquery/jquery-3.7.5.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>

  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>