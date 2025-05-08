<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="container">
    <form method="POST" class="">
    <h2 class="text-center mb-4">Form Nilai Mahasiswa</h2>
        <div class="form-group row">
            <label for="nim" class="col-4 col-form-label">NIM</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-id-card"></i>
                        </div>
                    </div>
                    <input id="nim" name="nim" type="text" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="matakuliah" class="col-4 col-form-label">Pilih MK</label>
            <div class="col-8">
                <select id="matakuliah" name="matakuliah" class="custom-select" required>
                    <option value="Basis Data">Basis Data</option>
                    <option value="Pemrograman Web">Pemrograman Web</option>
                    <option value="Jaringan Komputer">Jaringan Komputer</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nilai" class="col-4 col-form-label">Nilai</label>
            <div class="col-8">
                <input id="nilai" name="nilai" type="number" class="form-control" min="0" max="100" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <?php
    class NilaiMahasiswa {
        public $nim;
        public $matakuliah;
        public $nilai;

        public function __construct($nim, $matakuliah, $nilai) {
            $this->nim = $nim;
            $this->matakuliah = $matakuliah;
            $this->nilai = $nilai;
        }

        public function getNIM() {
            return $this->nim;
        }

        public function getMatakuliah() {
            return $this->matakuliah;
        }

        public function getNilai() {
            return $this->nilai;
        }

        function grade() {
            if ($this->nilai >= 85) {
                return "A";
            } elseif ($this->nilai >= 70) {
                return "B";
            } elseif ($this->nilai >= 55) {
                return "C";
            } elseif ($this->nilai >= 40) {
                return "D";
            }
            return "E";
        }

        function hasil() {
            return ($this->nilai >= 40) ? "Lulus" : "Tidak Lulus";
        }

        public function memunculkan() {
            echo "<div class='alert alert-info mt-4'>";
            echo "<strong>NIM:</strong> " . $this->getNIM() . "<br>";
            echo "<strong>Mata Kuliah:</strong> " . $this->getMatakuliah() . "<br>";
            echo "<strong>Nilai:</strong> " . $this->getNilai() . "<br>";
            echo "<strong>Grade:</strong> " . $this->grade() . "<br>";
            echo "<strong>Status:</strong> " . $this->hasil();
            echo "</div>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nim = $_POST['nim'];
        $matakuliah = $_POST['matakuliah'];
        $nilai = $_POST['nilai'];

        $mahasiswa = new NilaiMahasiswa($nim, $matakuliah, $nilai);
        $mahasiswa->memunculkan();
    }
    ?>
</div>
</body>

</html>
