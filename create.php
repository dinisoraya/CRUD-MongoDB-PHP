<?php session_start();
if (isset($_POST['submit'])) {
    require 'config.php';
    $insertOneResult = $collection->insertOne([
        'NPM' => $_POST['NPM'],
        'Nama' => $_POST['Nama'],
        'Prodi' => $_POST['Prodi'],
        'JK' => $_POST['JK'],
    ]);
    $_SESSION['success'] = "Data mahasiswa berhasil ditambahkan";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <CENTER>
            <h1>Tambah Data Mahasiswa</h1>
        </CENTER>
        <form method="POST">
            <div class="form-group">
                <label for="Prodi" id="NPM"><strong>NPM:</strong></label>
                <input type="text" class="form-control" name="NPM" required="" placeholder="NPM">
                <label for="Nama"><strong>Nama:</strong></label>
                <input type="text" class="form-control" name="Nama" required="" placeholder="Nama">
                <label for="Prodi"><strong>Program Studi:</strong></label>
                <input type="text" class="form-control" name="Prodi" placeholder="Program Studi">
                <label for="JK"><strong>Jenis Kelamin:</strong></label>
                <select name="JK" id="JK" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <br>
                <button type="submit" name="submit" class="btn btn-success">Tambah</button>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>