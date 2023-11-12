<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bellzone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, harga, kategori, brand, gambar FROM tb_upload ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Data</title>
</head>
<body>
  <table border="1" cellspacing="0" cellpadding="10">
    <caption>Products Table</caption>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Kategori</th>
      <th>Brand</th>
      <th>Image</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["id"]. "</td>";
        echo "<td>". $row["name"]. "</td>";
        echo "<td>". $row["harga"]. "</td>";
        echo "<td>". $row["kategori"]. "</td>";
        echo "<td>". $row["brand"]. "</td>";
        echo "<td><img src='". $row["gambar"]. "' width='200' alt='". $row["nama"]. "'></td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
  <br>
  <a href="index.php">Upload Image File</a>
</body>
</html>