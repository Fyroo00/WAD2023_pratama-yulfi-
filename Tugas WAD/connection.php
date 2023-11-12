<?php
$conn = mysqli_connect("localhost", "root", "","bellzone" );
if (!$conn) {
    echo "Gagal terhubung ke database";
    exit();
  }
  