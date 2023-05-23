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

    $bidang = new Bidang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $bidang->open();
    $bidangData = array('bidang_nama' => $nama);
    $inserted = $bidang->addBidang($bidangData);

    if ($inserted) {
        header("Location: bidang.php");
        exit();
    } else {
        header("Location: insert_bidang.php");
        exit();
    }
}

$data = '<div class="container" id="form-bidang">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Tambah Bidang</h3>
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
