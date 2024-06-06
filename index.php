<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <br>
        <CENTER>
            <h1>Data Mahasiswa Universitas Lampung</h1>
        </CENTER>
        <a href="create.php" class="btn btn-success">Tambah Mahasiswa</a>
        <?php
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th style="background-color: #FFEA00;" scope="col">NPM</th>
                    <th style="background-color: #FFEA00;" scope="col">Nama</th>
                    <th style="background-color: #FFEA00;" scope="col">Program Studi</th>
                    <th style="background-color: #FFEA00;" scope="col">Jenis Kelamin</th>
                    <th style="background-color: #FFEA00;" scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
            require 'config.php';
            $mhs = $collection->find();
            foreach ($mhs as $mhs) {
                echo "<tr>";
                echo "<th scope='row'>" . $mhs->NPM . "</th>";
                echo "<td>" . $mhs->Nama . "</td>";
                echo "<td>" . $mhs->Prodi . "</td>";
                echo "<td>" . $mhs->JK . "</td>";
                echo "<td>";
                echo "<a href = 'edit.php?id=" . $mhs->_id . "'class='btn btn-primary' style='margin-right: 10px;'>EDIT</a>";
                echo "<a href = 'delete.php?id=" . $mhs->_id . "'class='btn btn-danger'>HAPUS</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>