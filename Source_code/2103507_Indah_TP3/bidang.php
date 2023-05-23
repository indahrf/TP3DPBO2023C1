<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Bidang.php');
include('classes/Template.php');

$bidang = new Bidang($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$bidang->open();
$bidang->getBidang();

if (!isset($_GET['id'])) {
    if (isset($_POST['submit'])) {
        if ($bidang->addBidang($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambah!');
                document.location.href = 'bidang.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambah!');
                document.location.href = 'bidang.php';
            </script>";
        }
    }

    $btn = 'Tambah';
    $title = 'Tambah';
}

$view = new Template('templates/skintabel.html');

$mainTitle = 'Bidang';
$header = '<tr>
<th scope="row">No.</th>
<th scope="row">Nama Bidang</th>
<th scope="row">Aksi</th>
</tr>';
$data = null;
$no = 1;
$formLabel = 'bidang';

while ($div = $bidang->getResult()) {
    $data .= '<tr>
    <th scope="row">' . $no . '</th>
    <td>' . $div['bidang_nama'] . '</td>
    <td style="font-size: 22px;">
        <a href="edit_bidang.php?id=' . $div['bidang_id'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
        <a href="bidang.php?hapus=' . $div['bidang_id'] . '" title="Delete Data" onclick="return confirmDelete()"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>';
    $no++;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        if (isset($_POST['submit'])) {
            if ($bidang->updateBidang($id, $_POST) > 0) {
                echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'bidang.php';
            </script>";
            } else {
                echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'bidang.php';
            </script>";
            }
        }

        $bidang->getBidangById($id);
        $row = $bidang->getResult();

        $dataUpdate = $row['bidang_nama'];
        $btn = 'Simpan';
        $title = 'Ubah';

        $view->replace('DATA_VAL_UPDATE', $dataUpdate);
        $view->replace('DATA_VAL_ID', $id); 
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($bidang->deleteBidang($id) > 0) {
            echo "<script>
                alert('Data berhasil dihapus!');
                document.location.href = 'bidang.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal dihapus!');
                document.location.href = 'bidang.php';
            </script>";
        }
    }
}

$bidang->close();

$view->replace('DATA_MAIN_TITLE', $mainTitle);
$view->replace('DATA_TABEL_HEADER', $header);
$view->replace('DATA_TITLE', $title);
$view->replace('DATA_BUTTON', $btn);
$view->replace('DATA_FORM_LABEL', $formLabel);
$view->replace('DATA_TABEL', $data);
$view->write();
?>
