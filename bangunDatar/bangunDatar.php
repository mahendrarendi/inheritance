<?php

// Kelas Induk (Superclass) - BangunDatar
class BangunDatar {
    protected $jenis;

    public function __construct($jenis) {
        $this->jenis = $jenis;
    }

    public function hitungLuas() {
        // Metode ini akan di-override oleh kelas anak
    }

    public function tampilkanInfo() {
        echo "Jenis: " . $this->jenis . "<br>";
    }
}

// Kelas Anak (Subclass) - Persegi
class Persegi extends BangunDatar {
    private $sisi;

    public function __construct($sisi) {
        parent::__construct("Persegi");
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }
}

// Kelas Anak (Subclass) - Persegi Panjang
class PersegiPanjang extends BangunDatar {
    private $panjang;
    private $lebar;

    public function __construct($panjang, $lebar) {
        parent::__construct("Persegi Panjang");
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
}

// Kelas Anak (Subclass) - Segitiga
class Segitiga extends BangunDatar {
    private $alas;
    private $tinggi;

    public function __construct($alas, $tinggi) {
        parent::__construct("Segitiga");
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function hitungLuas() {
        return 0.5 * $this->alas * $this->tinggi;
    }
}

// Kelas Anak (Subclass) - Lingkaran
class Lingkaran extends BangunDatar {
    private $jariJari;

    public function __construct($jariJari) {
        parent::__construct("Lingkaran");
        $this->jariJari = $jariJari;
    }

    public function hitungLuas() {
        return 22/7 * $this->jariJari * $this->jariJari;
    }
}

// Fungsi untuk menampilkan formulir HTML
function tampilkanFormulir() {
    echo '<form method="post" class="container mt-5">';
    echo '<h2 class="mb-4">Kalkulator Luas Bangun Datar Menggunakan Konsep Inheritance</h2>';
    echo '<div class="form-group">';
    echo 'Jenis Bangun Datar: ';
    echo '<select name="jenis" id="jenis" class="form-control">';
    echo '<option value="Persegi">Persegi</option>';
    echo '<option value="PersegiPanjang">Persegi Panjang</option>';
    echo '<option value="Segitiga">Segitiga</option>';
    echo '<option value="Lingkaran">Lingkaran</option>';
    echo '</select>';
    echo '</div>';
    echo '<div class="mb-4">';
    echo 'Masukkan Nilai:';
    echo '</div>';
    
    // Input sisi untuk Persegi
    echo '<div id="inputPersegi" class="form-group">';
    echo 'Sisi: <input type="text" name="sisi_persegi" class="form-control"><br>';
    echo '</div>';

    // Input panjang dan lebar untuk Persegi Panjang
    echo '<div id="inputPersegiPanjang" style="display:none;" class="form-group">';
    echo 'Panjang: <input type="text" name="panjang_persegi_panjang" class="form-control"><br>';
    echo 'Lebar: <input type="text" name="lebar_persegi_panjang" class="form-control"><br>';
    echo '</div>';

    // Input alas dan tinggi untuk Segitiga
    echo '<div id="inputSegitiga" style="display:none;" class="form-group">';
    echo 'Alas: <input type="text" name="alas_segitiga" class="form-control"><br>';
    echo 'Tinggi: <input type="text" name="tinggi_segitiga" class="form-control"><br>';
    echo '</div>';

    // Input jari-jari untuk Lingkaran
    echo '<div id="inputLingkaran" style="display:none;" class="form-group">';
    echo 'Jari-Jari: <input type="text" name="jari_jari_lingkaran" class="form-control"><br>';
    echo '</div>';

    echo '<button type="submit" class="btn btn-primary">Hitung Luas</button>';
    echo '</form>';
}


// Fungsi untuk menampilkan hasil perhitungan luas
function tampilkanHasil($jenis, $values) {
    if (isset($jenis)) {
        if ($jenis == 'Persegi') {
            $sisi = $values['sisi_persegi'];
            if (is_numeric($sisi)) {
                $bangunDatar = new Persegi($sisi);
                $luas = $bangunDatar->hitungLuas();
                echo '<div class="container mt-4">';
                echo '<h3>Hasil Perhitungan</h3>';
                echo "Jenis: Persegi<br>";
                echo "Sisi: $sisi<br>";
                echo "Luas: " . $luas . "<br>";
                echo '</div>';
            } else {
                echo '<div class="container mt-4 alert alert-danger">';
                echo "Sisi harus berupa angka!";
                echo '</div>';
            }
        } elseif ($jenis == 'PersegiPanjang') {
            $panjang = $values['panjang_persegi_panjang'];
            $lebar = $values['lebar_persegi_panjang'];
            if (is_numeric($panjang) && is_numeric($lebar)) {
                $bangunDatar = new PersegiPanjang($panjang, $lebar);
                $luas = $bangunDatar->hitungLuas();
                echo '<div class="container mt-4">';
                echo '<h3>Hasil Perhitungan</h3>';
                echo "Jenis: Persegi Panjang<br>";
                echo "Panjang: $panjang<br>";
                echo "Lebar: $lebar<br>";
                echo "Luas: " . $luas . "<br>";
                echo '</div>';
            } else {
                echo '<div class="container mt-4 alert alert-danger">';
                echo "Panjang dan Lebar harus berupa angka!";
                echo '</div>';
            }
        } elseif ($jenis == 'Segitiga') {
            $alas = $values['alas_segitiga'];
            $tinggi = $values['tinggi_segitiga'];
            if (is_numeric($alas) && is_numeric($tinggi)) {
                $bangunDatar = new Segitiga($alas, $tinggi);
                $luas = $bangunDatar->hitungLuas();
                echo '<div class="container mt-4">';
                echo '<h3>Hasil Perhitungan</h3>';
                echo "Jenis: Segitiga<br>";
                echo "Alas: $alas<br>";
                echo "Tinggi: $tinggi<br>";
                echo "Luas: " . $luas . "<br>";
                echo '</div>';
            } else {
                echo '<div class="container mt-4 alert alert-danger">';
                echo "Alas dan Tinggi harus berupa angka!";
                echo '</div>';
            }
        } elseif ($jenis == 'Lingkaran') {
            $jariJari = $values['jari_jari_lingkaran'];
            if (is_numeric($jariJari)) {
                $bangunDatar = new Lingkaran($jariJari);
                $luas = $bangunDatar->hitungLuas();
                echo '<div class="container mt-4">';
                echo '<h3>Hasil Perhitungan</h3>';
                echo "Jenis: Lingkaran<br>";
                echo "Jari-Jari: $jariJari<br>";
                echo "Luas: " . $luas . "<br>";
                echo '</div>';
            } else {
                echo '<div class="container mt-4 alert alert-danger">';
                echo "Jari-Jari harus berupa angka!";
                echo '</div>';
            }
        } else {
            echo '<div class="container mt-4 alert alert-danger">';
            echo "Jenis bangun datar tidak valid!";
            echo '</div>';
        }
    }
}

?>

<!-- kode html dari program menggunakan inheritance -->
<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Luas Bangun Datar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
    tampilkanFormulir();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenis = $_POST["jenis"];
        $values = $_POST;

        // Hapus jenis dari nilai yang akan diproses
        unset($values['jenis']);

        tampilkanHasil($jenis, $values);
    }

    echo '<script>
    const jenisDropdown = document.getElementById("jenis");
    const inputPersegi = document.getElementById("inputPersegi");
    const inputPersegiPanjang = document.getElementById("inputPersegiPanjang");
    const inputSegitiga = document.getElementById("inputSegitiga");
    const inputLingkaran = document.getElementById("inputLingkaran");

    jenisDropdown.addEventListener("change", function() {
        const jenis = jenisDropdown.value;

        // Sembunyikan semua elemen form
        inputPersegi.style.display = "none";
        inputPersegiPanjang.style.display = "none";
        inputSegitiga.style.display = "none";
        inputLingkaran.style.display = "none";

        if (jenis === "Persegi") {
            inputPersegi.style.display = "block";
        } else if (jenis === "PersegiPanjang") {
            inputPersegiPanjang.style.display = "block";
        } else if (jenis === "Segitiga") {
            inputSegitiga.style.display = "block";
        } else if (jenis === "Lingkaran") {
            inputLingkaran.style.display = "block";
        }
    });

    // Set form yang sesuai saat halaman pertama kali dimuat
    const jenisDefault = jenisDropdown.value;
    if (jenisDefault === "Persegi") {
        inputPersegi.style.display = "block";
    } else if (jenisDefault === "PersegiPanjang") {
        inputPersegiPanjang.style.display = "block";
    } else if (jenisDefault === "Segitiga") {
        inputSegitiga.style.display = "block";
    } else if (jenisDefault === "Lingkaran") {
        inputLingkaran.style.display = "block";
    }
  </script>';

    ?>
</body>
</html>
