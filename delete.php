<?php session_start();
require 'config.php';
if (isset($_GET['id'])) {
    $mhs = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if (isset($_POST['submit'])) {
    require 'config.php';
    $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
    $_SESSION['success'] = "Data mahasiswa berhasil dihapus";
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Hapus Mahasiswa</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <CENTER>
            <h1>Hapus Data Mahasiswa</h1>
        </CENTER>
        <br>
        <p> Apakah Anda yakin untuk menghapus mahasiswa yang bernama <?php echo "$mhs->Nama"; ?> ? </p>
        <form method="POST">
            <div class="form-group">
                <input type="hidden" value="<?php echo "$mhs->Nama"; ?>" class="form-control" name="Nama">
                <a href="index.php" class="btn btn-primary">Kembali</a>
                <button type="submit" name="submit" class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</body>

</html>