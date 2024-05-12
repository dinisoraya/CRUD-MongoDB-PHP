<?php session_start();
require 'config.php';
if (isset($_GET['id'])) {
    $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if (isset($_POST['submit'])) {
    $collection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
        [
            '$set' => [
                'NPM' => $_POST['NPM'],
                'Nama' => $_POST['Nama'],
                'Prodi' => $_POST['Prodi'],
                'JK' => $_POST['JK'],
            ]
        ]
    );
    $_SESSION['success'] = "Data mahasiswa berhasil diupdate";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <CENTER>
            <h1>Edit Data Mahasiswa</h1>
        </CENTER>
        <form method="POST">
            <div class="form-group">
                <label for="NPM"><strong>NPM:</strong></label>
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
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="index.php" class="btn btn-primary">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>