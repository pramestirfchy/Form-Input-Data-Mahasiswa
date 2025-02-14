Script mahasiswa_form.php

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Mahasiswa</title>
</head>
<body>
    <table border="2" align="center">
        <tr>
            <td>
                <h2 align="center">Form Input Data Mahasiswa</h2>

                <?php if (session()->getFlashdata('errors')) : ?>
                    <ul style="color: red;">
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <form action="<?= base_url('/mahasiswa/store') ?>" method="post">
                    <table>
                        <tr>
                            <td><label>NIM:</label></td>
                            <td><input type="text" name="nim" value="<?= old('nim') ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Nama Lengkap:</label></td>
                            <td><input type="text" name="nama" value="<?= old('nama') ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Kelas:</label></td>
                            <td><input type="text" name="kelas" value="<?= old('kelas') ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Program Studi:</label></td>
                            <td><input type="text" name="prodi" value="<?= old('prodi') ?>"></td>
                        </tr>
                        <tr>
                            <td><label>Email:</label></td>
                            <td><input type="email" name="email" value="<?= old('email') ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit">Simpan</button>
                                <button type="button" onclick="window.history.back();">Batal</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
