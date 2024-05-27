<!DOCTYPE html>
<html>
<head>
  <title>Rental Motor</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h1>Rental Motor</h1>
  <form method="post">
    Nama Pelanggan: <input type="text" name="nama_pelanggan" required><br>
    Lama Waktu Rental (per hari): <input type="number" name="lama_rental" required><br>
    Jenis Motor: 
      <select name="jenis_motor" required>
      <option disabled selected>--- Pilih Jenis Motor ---</option>
      <option value="Scooter">Scooter</option>
      <option value="Sport">Sport</option>
      <option value="Cruiser">Cruiser</option>
      <option value="Offroad">Offroad</option>
      </select><br>
      <input type="submit" name="kirim" value="kirim">
  </form>
</body>
</html>

<?php
include 'back.php';
if(isset($_POST['kirim'])) {
$namaPelanggan = $_POST['nama_pelanggan'];
$lamaRental = $_POST['lama_rental'];
$jenisMotor = $_POST['jenis_motor'];

$rental = new RentalMotor($namaPelanggan, $lamaRental, $jenisMotor);
echo "<div style='margin-top: 20px; padding: 10px; border: 1px solid #000;'>";
echo $rental->getRentalDetails();
echo "</div>";
}
?>
</div>