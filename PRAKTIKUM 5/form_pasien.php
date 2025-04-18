<?php
require_once "dbkoneksi2.php"; // Connect to the database

// Handle form submission for adding a patient
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_patient'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];

    // Insert new patient into the database
    $stmt = $dbh->prepare("INSERT INTO pasien (kode, nama, gender, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$kode, $nama, $gender, $email]);
}

// Handle form submission for deleting a patient
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_patient'])) {
    $patient_id = $_POST['patient_id'];

    // Delete patient from the database
    $stmt = $dbh->prepare("DELETE FROM pasien WHERE id = ?");
    $stmt->execute([$patient_id]);
}

// Fetch all patients for display
$patients = $dbh->query("SELECT * FROM pasien")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Pasien</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Add New Patient</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" id="kode" name="kode" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label>Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderL" value="L" required>
                <label class="form-check-label" for="genderL">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderP" value="P" required>
                <label class="form-check-label" for="genderP">Perempuan</label>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <button type="submit" class="btn btn-primary" name="add_patient">Add Patient</button>
    </form>

    <h2 class="mt-5">Delete Patient</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="patient_id">Select Patient to Delete</label>
            <select class="form-control" id="patient_id" name="patient_id" required>
                <option value="">Select Patient</option>
                <?php foreach ($patients as $patient) { ?>
                    <option value="<?= $patient['id'] ?>"><?= $patient['nama'] ?> (<?= $patient['kode'] ?>)</option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-danger" name="delete_patient">Delete Patient</button>
    </form>

    <h2 class="mt-5">Current Patients</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Pasien</th>
                <th>Gender</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $idx => $patient) { ?>
            <tr>
                <td><?= $idx + 1 ?></td>
                <td><?= $patient['kode'] ?></td>
                <td><?= $patient['nama'] ?></td>
                <td><?= $patient['gender'] ?></td>
                <td><?= $patient['email'] ?? '-' ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>