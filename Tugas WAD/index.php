<?php
require 'connection.php';

if(isset($_POST["submit"])) {

  $name = mysqli_real_escape_string($conn, $_POST["nama"]);
  $harga = $_POST["harga"];
  $kategori = mysqli_real_escape_string($conn, $_POST["kategori"]);
  $brand = mysqli_real_escape_string($conn, $_POST["brand"]);

  // your validasi gambar code

  $query = "
    INSERT INTO tb_upload (id, name, harga, kategori, brand, gambar)     
    VALUES ('',?,?,?,?,?) 
  ";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "sssss", $name, $harga, $kategori, $brand, $newImageName);
  
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  
  // success message and redirection code
}
?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
      <head>
          <title>BellZone</title>
      </head>
      <body>
          <form action="" method="get" autocomplete="off" enctype="multipart/form-data">
              <label for="nama">nama: </label>
                  <input type="text" name="nama" id="nama"><br><br>
              <label for="harga">harga: </label>
                  <input type="number" name="harga" id="harga"><br><br>
              <label for="kategori">kategori: </label>
                  <input type="text" name="kategori" id="kategori"><br><br>
              <label for="brand">Brand: </label>
                  <input type="text" name="brand" id="brand"><br><br>
              <label for="gambar">Gambar: </label>
                  <input type="file" name="gambar" id="gambar" accept=".jpg, .jpeg, .png"><br><br>
              <button type="submit" name="submit">submit</button>
          </form>
          <br>
          <a href="data.php">main</a>

  </html>