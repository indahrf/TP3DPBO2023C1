<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Bidang.php');
include('classes/Jabatan.php');
include('classes/Dosen.php');
include('classes/Template.php');

$bidang = new Bidang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$bidang->open();
$bidang->getBidang();
$jabatan = new Jabatan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$jabatan->open();
$jabatan->getJabatan();
$dosen = new Dosen($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$dosen->open();

$dosenId = $_GET['id'] ?? null;
if (!$dosenId || !is_numeric($dosenId)) {
    header("Location: error.php");
    exit();
}

$dosenData = $dosen->getDosenById2($dosenId);
if (!$dosenData) {
    header("Location: error.php");
    exit();
}

$data = null;

if (isset($_POST['nama'])) {
    $foto = $dosenData['dosen_foto'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $bidangId = $_POST['bidang_id'];
    $jabatanId = $_POST['jabatan_id'];

    $data1['dosen_foto'] = $foto;
    $data1['dosen_nip'] = $nip;
    $data1['dosen_nama'] = $nama;
    $data1['dosen_email'] = $email;
    $data1['bidang_id'] = $bidangId;
    $data1['jabatan_id'] = $jabatanId;

    $updated = $dosen->updateData($dosenId, $data1);

    if ($updated) {
        header("Location: index.php");
        exit();
    } else {
        
        header("Location: index.php");
        exit();
    }
}

$data = '<div class="container" id="form-dosen">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center mt-5">Ubah Dosen</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label><br>
                    <img src="assets/images/' . $dosenData['dosen_foto'] . '" alt="Foto Dosen" width="200"><br><br>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="' . $dosenData['dosen_nip'] . '" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="' . $dosenData['dosen_nama'] . '" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" value="' . $dosenData['dosen_email'] . '" required>
                </div>
                <div class="mb-3">
                    <label for="bidang_id" class="form-label">Bidang</label>
                    <select class="form-select" id="bidang_id" name="bidang_id" required>
                        <option selected disabled>Pilih Bidang</option>';
while ($div = $bidang->getResult(true)) {
    $selected = ($div['bidang_id'] == $dosenData['bidang_id']) ? 'selected' : '';
    $data .= '<option value="' . $div['bidang_id'] . '"' . $selected . '>' . $div['bidang_nama'] . '</option>';
}
$data .= '</select>
                </div>
                <div class="mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan_id" name="jabatan_id" required>
                        <option selected disabled>Pilih Jabatan</option>';
while ($j = $jabatan->getResult(true)) {
    $selected = ($j['jabatan_id'] == $dosenData['jabatan_id']) ? 'selected' : '';
    $data .= '<option value="' . $j['jabatan_id'] . '"' . $selected . '>' . $j['jabatan_nama'] . '</option>';
}
$data .= '</select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>';

$home = new Template('templates/skindetail.html');
$home->replace('DATA', $data);
$home->write();
$dosen->close();
?>
