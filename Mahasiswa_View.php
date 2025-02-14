Script mahasiswa_view.php

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Mahasiswa</title>
</head>
<body>

<h2 style="text-align: center;">Tampil Data Mahasiswa</h2>


<?php if (session()->getFlashdata('error')) : ?>
    <p style="color: red; text-align: center;">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Lengkap</th>
        <th>Kelas</th>
        <th>Program Studi</th>
        <th>Email</th>
        <th>Pilihan</th>
    </tr>
    <?php $no = 1; foreach ($mahasiswa as $mhs) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $mhs['nim']; ?></td>
        <td><?= $mhs['nama']; ?></td>
        <td><?= $mhs['kelas']; ?></td>
        <td><?= $mhs['prodi']; ?></td>
        <td><?= $mhs['email']; ?></td>
        <td>
            <a href="<?= base_url('/mahasiswa/delete/'.$mhs['nim']) ?>" 
               style="color: blue; text-decoration: none;"
               onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
