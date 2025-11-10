<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Data Diri</title>
</head>
<body>
  <h2>Form Input Data Diri</h2>

  <form method="post">
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="tanggal_lahir" required><br><br>

    <label>Pekerjaan:</label><br>
    <select name="pekerjaan" required>
      <option value="">-- Pilih Pekerjaan --</option>
      <option value="Programmer">Programmer</option>
      <option value="Desainer">Desainer</option>
      <option value="Guru">Guru</option>
      <option value="Dokter">Dokter</option>
      <option value="Petani">Petani</option>
    </select><br><br>

    <input type="submit" value="Kirim">
  </form>

  <hr>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama           = htmlspecialchars($_POST["nama"]);
      $tanggal_lahir  = $_POST["tanggal_lahir"];
      $pekerjaan      = $_POST["pekerjaan"];

      // Hitung umur
      $tanggal_lahir_obj = new DateTime($tanggal_lahir);
      $sekarang = new DateTime();
      $umur = $sekarang->diff($tanggal_lahir_obj)->y;

      // Tentukan gaji berdasarkan pekerjaan
      switch ($pekerjaan) {
        case "Programmer":
          $gaji = 10000000;
          break;
        case "Desainer":
          $gaji = 8000000;
          break;
        case "Guru":
          $gaji = 6000000;
          break;
        case "Dokter":
          $gaji = 12000000;
          break;
        case "Petani":
          $gaji = 5000000;
          break;
        default:
          $gaji = 0;
      }

      // Tampilkan hasil
      echo "<h3>Hasil Input:</h3>";
      echo "Nama: $nama <br>";
      echo "Tanggal Lahir: $tanggal_lahir <br>";
      echo "Umur: $umur tahun <br>";
      echo "Pekerjaan: $pekerjaan <br>";
      echo "Gaji: Rp " . number_format($gaji, 0, ',', '.');
    }
  ?>
</body>
</html>
