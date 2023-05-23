<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Bidang.php');
include('classes/Template.php');

$bidang = new Bidang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$bidang->open();

$bidangId = $_GET['id'] ?? null;
if (!$bidangId || !is_numeric($bidangId)) {
    header("Location: error.php");
    exit();
}


$bidangData = $bidang->getBidangById($bidangId);

if (!$bidangData) {
    header("Location: error.php");
    exit();
}


if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];

    $bidangData['bidang_nama'] = $nama;
    $updated = $bidang->updateBidang($bidangId, $bidangData);

    if ($updated) {
        header("Location: bidang.php");
        exit();
    } else {
        header("Location: bidang.php");
        exit();
    }
}

$mainTitle = 'Edit Bidang';
$title = 'Edit Bidang';

$data = '<div class="container" id="form-bidang">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Edit Bidang</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="' . $bidangData['bidang_nama'] . '" required>
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
$home->replace('DATA_MAIN_TITLE', $mainTitle);
$home->replace('DATA_TITLE', $title);
$home->write();

$bidang->close();

?>
