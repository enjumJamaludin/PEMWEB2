<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form method="POST">
        <div class="form-group row">
            <label for="nim" class="col-4 col-form-label">NIM</label>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-address-card"></i>
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
                    <option value="PEMWEB">PEMWEB</option>
                    <option value="JARKOM">JARKOM</option>
                    <option value="UI/UX">UI/UX</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="nilai" class="col-4 col-form-label">Nilai</label>
            <div class="col-8">
                <input id="nilai" name="nilai" type="number" class="form-control" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        class NilaiMahasiswa
        {
            public $matakuliah;
            public $nilai;
            public $nim;

            function __construct($matakuliah, $nilai, $nim)
            {
                $this->matakuliah = $matakuliah;
                $this->nilai = $nilai;
                $this->nim = $nim;
            }

            function grade()
            {
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

            function hasil()
            {
                if ($this->nilai >= 40) {
                    return "Lulus";
                } else {
                    return "Tidak Lulus";
                }
            }
        }


        $nim = $_POST['nim'];
        $matakuliah = $_POST['matakuliah'];
        $nilai = $_POST['nilai'];


        $mahasiswa = new NilaiMahasiswa($matakuliah, $nilai, $nim);


        echo '<div class="container mt-4">';
        echo '<h3>Hasil Nilai Mahasiswa</h3>';
        echo '<p><strong>NIM:</strong> ' . htmlspecialchars($mahasiswa->nim) . '</p>';
        echo '<p><strong>Mata Kuliah:</strong> ' . htmlspecialchars($mahasiswa->matakuliah) . '</p>';
        echo '<p><strong>Nilai:</strong> ' . htmlspecialchars($mahasiswa->nilai) . '</p>';
        echo '<p><strong>Grade:</strong> ' . htmlspecialchars($mahasiswa->grade()) . '</p>';
        echo '<p><strong>Hasil:</strong> ' . htmlspecialchars($mahasiswa->hasil()) . '</p>';
        echo '</div>';
    }
    ?>
</body>

</html>