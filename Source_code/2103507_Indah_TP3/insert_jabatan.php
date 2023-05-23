<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Bidang.php');
include('classes/Jabatan.php');
include('classes/Dosen.php');
include('classes/Template.php');

$data = null;

if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];

    $jabatan = new Jabatan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $jabatan->open();
    $jabatanData = array('jabatan_nama' => $nama);
    $inserted = $jabatan->addJabatan($jabatanData);

    if ($inserted) {
        header("Location: jabatan.php");
        exit();
    } else {
        header("Location: jabatan.php");
        exit();
    }
}

$data = '<div class="container" id="form-jabatan">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Tambah Jabatan</h3>
            <form method="POST"  enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>';

$home = new Template('templates/skinall.html');
$home->replace('DATA', $data);
$home->write();
?>
