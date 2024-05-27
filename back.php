<?php
class RentalMotor {
  private $namaPelanggan,
          $lamaRental,
          $jenisMotor,
          $hargaPerHari,
          $listMember = ["cahyo", "annaafi", "arga", "yogi"],
          $pajak;
          
  const HARGA_SCOOTER = 70000;
  const HARGA_SPORT = 100000;
  const HARGA_CRUISER = 150000;
  const HARGA_OFFROAD = 120000;
  
  private function getHargaPerHari($jenisMotor) {
    switch ($jenisMotor) {
      case "Scooter":
        return self::HARGA_SCOOTER;
      case "Sport":
        return self::HARGA_SPORT;
      case "Cruiser":
        return self::HARGA_CRUISER;
      case "Offroad":
        return self::HARGA_OFFROAD;
      default:
        return 0;
    }
  }
   public function __construct($namaPelanggan, $lamaRental, $jenisMotor) {
     $this->namaPelanggan = $namaPelanggan;
     $this->lamaRental = $lamaRental;
     $this->jenisMotor = $jenisMotor;
     $this->hargaPerHari = $this->getHargaPerHari($jenisMotor);
     $this->listMember = in_array(strtolower($namaPelanggan), $this->listMember);
     $this->pajak = 10000;
     $this->diskonMember = 0.05;
   }

  public function totalBiaya() {
    $total = $this->hargaPerHari * $this->lamaRental;
    if ($this->listMember) {
      $total -= $total * $this->diskonMember;
    }
    $total += $this->pajak;
    return $total;
  }

  public function getRentalDetails() {
      $statusMember = $this->listMember ? "berstatus sebagai Member mendapatkan diskon sebesar 5%" : "tidak berstatus sebagai Member";
      return "Nama Pelanggan: {$this->namaPelanggan} <br>
              Lama Waktu Rental: {$this->lamaRental} hari <br>
              Jenis motor yang dirental adalah {$this->jenisMotor} <br>
              Harga rental per-harinya: Rp. " . number_format($this->hargaPerHari, 0, ',', '.') . "<br>
              {$statusMember} <br>
              Pajak: Rp. " . number_format($this->pajak, 0, ',', '.') . "<br>
              Besar yang harus dibayarkan adalah Rp. " . number_format($this->totalBiaya(), 0, ',', '.');
  }
}
?>