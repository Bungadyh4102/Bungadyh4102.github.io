<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>CRUD Tari Tradisional</title>
  <style>
    .navbar {
      background-color: #333;
      color: #ecf0f1;
      padding: 15px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
      font-size: 22px;
      text-align: center;
    }

    .container {
      padding: 20px;
      border-radius: 10px;
      max-width: 900px;
      margin: 30px auto;
      background-color: #f8f8f8;
      color: #333;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
    }

    h3 {
      font-family: 'Arial', sans-serif;
      color: #333;
      font-size: 26px;
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      background-color: #fff;
      border-collapse: collapse;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      font-size: 18px;
      color: #333;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #444;
      color: white;
    }

    tr:nth-child(odd) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    a.btn {
      padding: 10px 16px;
      margin: 5px 0;
      display: inline-block;
      text-decoration: none;
      font-size: 16px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    a.btn-primary {
      background-color: #555;
      color: white;
    }

    a.btn-primary:hover {
      background-color: #666;
    }

    a.btn-warning {
      background-color: #777;
      color: white;
    }

    a.btn-warning:hover {
      background-color: #888;
    }

    a.btn-danger {
      background-color: #888;
      color: white;
    }

    a.btn-danger:hover {
      background-color: #999;
    }

    .add-button {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
    <navbar class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Pengenalan Tari Tradisional</span>
    </navbar>
<div class="container">
    <br>
    <h3>Data Tari Tradisional</h3>
<?php
    include "koneksi.php";

    if (isset($_GET['id_tari'])) {
        $id_tari = htmlspecialchars($_GET["id_tari"]);
        $sql = "DELETE FROM tari WHERE id_tari='$id_tari'";
        $hasil = mysqli_query($conn, $sql);

        if ($hasil) {
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
        }
    }
?>

<table class="my-3 table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Tari</th>
            <th>Asal</th>
            <th>Deskripsi</th>
            <th colspan='2'>Aksi</th>
        </tr>
    </thead>

    <?php
    include "koneksi.php";
    $sql="select * from tari order by id_tari asc";
    $hasil=mysqli_query($conn, $sql);
    $no=0;
    while ($data = mysqli_fetch_array($hasil)) {
        $no++;
    ?>
        <tbody>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["nama_tari"];?></td>
                <td><?php echo $data["asal"];?></td>
                <td><?php echo $data["deskripsi"];?></td>
                <td>
                    <a href="update.php?id_tari=<?php echo htmlspecialchars($data['id_tari']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_tari=<?php echo $data['id_tari']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
        </tbody>
    <?php
    }
    ?>
</table>
<div class="add-button">
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</div>
</body>
</html>
