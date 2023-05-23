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

$data = null;

if (isset($_POST['nama'])) {
    $foto = $_FILES['dosen_foto'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $bidangId = $_POST['bidang_id'];
    $jabatanId = $_POST['jabatan_id'];

    $dosen = new Dosen($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
    $dosen->open();

    $data1 = array(
        'dosen_nip' => $nip,
        'dosen_nama' => $nama,
        'dosen_email' => $email,
        'bidang_id' => $bidangId,
        'jabatan_id' => $jabatanId
    );

    $inserted = $dosen->addData($data1, $foto);

    if ($inserted) {
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
            <h3 class="text-center mt-5">Tambah Dosen</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="dosen_foto" required>
                </div>
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="bidang_id" class="form-label">Bidang</label>
                    <select class="form-select" id="bidang_id" name="bidang_id" required>
                        <option selected disabled>Pilih Bidang</option>';
while ($div = $bidang->getResult()) {
    $data .= '<option value="' . $div['bidang_id'] . '">' . $div['bidang_nama'] . '</option>';
}
$data .= '</select>
                </div>
                <div class="mb-3">
                    <label for="jabatan_id" class="form-label">Jabatan</label>
                    <select class="form-select" id="jabatan_id" name="jabatan_id" required>
                        <option selected disabled>Pilih Jabatan</option>';
while ($j = $jabatan->getResult()) {
    $data .= '<option value="' . $j['jabatan_id'] . '">' . $j['jabatan_nama'] . '</option>';
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
?>
