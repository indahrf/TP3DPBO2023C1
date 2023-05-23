<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Bidang.php');
include('classes/Jabatan.php');
include('classes/Dosen.php');
include('classes/Template.php');

$listDosen = new Dosen($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listDosen->open();

if (isset($_GET['btn-cari'])) {
    $keyword = $_GET['cari'];
    $listDosen->searchDosen($_GET['cari']);
} else {
    $listDosen->getDosenJoin();
}

$data = null;

while ($row = $listDosen->getResult()) {
    $data .= '<div class="col-md-4 gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 dosen-thumbnail">
        <a href="detail.php?id=' . $row['dosen_id'] . '">
            <div class="row justify-content-center">
                <img src="assets/images/' . $row['dosen_foto'] . '" class="card-img-top" alt="' . $row['dosen_foto'] . '">
            </div>
            <div class="card-body">
                <p class="card-text dosen-nama my-0">' . $row['dosen_nama'] . '</p>
                <p class="card-text bidang-nama">' . $row['bidang_nama'] . '</p>
                <p class="card-text jabatan-nama my-0">' . $row['jabatan_nama'] . '</p>
            </div>
        </a>
    </div>    
    </div>';
}

$listDosen->close();
$home = new Template('templates/skin.html');
$home->replace('DATA_DOSEN', $data);
$home->write();
