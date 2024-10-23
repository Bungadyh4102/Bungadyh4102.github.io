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

    form {
      margin: 20px 0;
      text-align: center;
    }

    input[type="text"] {
      padding: 10px;
      width: 200px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 15px;
      margin-left: 5px;
      background-color: #555;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #666;
    }

    .welcome-message {
        text-align: center;
        margin: 20px 0;
        font-size: 20px;
        color: #333;
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .welcome-message strong {
        color: #2c3e50;
    }

    .no-data {
        text-align: center;
        font-size: 18px;
        color: #e74c3c;
    }
  </style>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">Pengenalan Tari Tradisional</span>
    </div>
    <div class="container">
        <br>
        <h3>Data Tari Tradisional</h3>

        <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari nama tari..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Cari</button>
        </form>
        <br>

        <?php
        session_start();

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.html");
            exit;
        }

        echo '<div class="welcome-message">Selamat datang, <strong>' . htmlspecialchars($_SESSION['username']) . '</strong>!</div>';

        require 'koneksi.php'; 

        if (isset($_GET['id_tari'])) {
            $id_tari = htmlspecialchars($_GET["id_tari"]); 
            
            $sql = "DELETE FROM tari WHERE id_tari='$id_tari'";
            $hasil = mysqli_query($conn, $sql);

            if ($hasil) {
                header("Location: index.php"); 
                exit;
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }

        $search = "";
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
        }

        if ($search) {
            $sql = "SELECT * FROM tari WHERE LOWER(nama_tari) LIKE LOWER('%$search%') ORDER BY id_tari ASC";
        } else {
            $sql = "SELECT * FROM tari ORDER BY id_tari ASC";
        }

        $hasil = mysqli_query($conn, $sql);
        $no = 0;
        ?>

        <table class="my-3 table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Tari</th>
                    <th>Asal</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if (mysqli_num_rows($hasil) > 0) {
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($data["nama_tari"]); ?></td>
                    <td><?php echo htmlspecialchars($data["asal"]); ?></td>
                    <td><?php echo htmlspecialchars($data["deskripsi"]); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($data["file_tari"]); ?>" alt="Gambar Tari" style="width: 150px; height: auto;"></td>
                    <td>
                        <a href="update.php?id_tari=<?php echo htmlspecialchars($data['id_tari']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_tari=<?php echo htmlspecialchars($data['id_tari']); ?>" class="btn btn-danger" role="button" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php
            }
            } else {
                echo "<tr><td colspan='6' class='no-data'>Data tari tidak ditemukan.</td></tr>";
            }
            ?>
            </tbody>
        </table>
        <div class="add-button">
            <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
            <a href="logout.php" class="btn btn-danger" role="button">Logout</a>
        </div>
    </div>
</body>
</html>
