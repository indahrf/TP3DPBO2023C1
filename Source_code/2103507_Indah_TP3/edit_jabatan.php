<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Jabatan.php');
include('classes/Template.php');

$jabatan = new Jabatan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$jabatan->open();

$jabatanId = $_GET['id'] ?? null;
if (!$jabatanId || !is_numeric($jabatanId)) {
    header("Location: error.php");
    exit();
}


$jabatanData = $jabatan->getJabatanById($jabatanId);

if (!$jabatanData) {
    header("Location: error.php");
    exit();
}


if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];

    $jabatanData['jabatan_nama'] = $nama;
    $updated = $jabatan->updateJabatan($jabatanId, $jabatanData);

    if ($updated) {
        header("Location: jabatan.php");
        exit();
    } else {        
        header("Location: jabatan.php");
        exit();
    }
}

$mainTitle = 'Edit Jabatan';
$title = 'Edit Jabatan';

$data = '<div class="container" id="form-jabatan">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Edit Jabatan</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="' . $jabatanData['jabatan_nama'] . '" required>
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

$jabatan->close();

?>
