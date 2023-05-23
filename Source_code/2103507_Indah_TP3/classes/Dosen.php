<?php

class Dosen extends DB
{
    function getDosenJoin()
    {
        $query = "SELECT * FROM dosen 
                  JOIN bidang ON dosen.bidang_id=bidang.bidang_id 
                  JOIN jabatan ON dosen.jabatan_id=jabatan.jabatan_id 
                  ORDER BY dosen.dosen_id";

        return $this->execute($query);
    }

    function getDosen()
    {
        $query = "SELECT * FROM dosen";
        return $this->execute($query);
    }

    function getDosenById($id)
    {
        $query = "SELECT * FROM dosen 
                  JOIN bidang ON dosen.bidang_id=bidang.bidang_id 
                  JOIN jabatan ON dosen.jabatan_id=jabatan.jabatan_id 
                  WHERE dosen_id=$id";
        return $this->execute($query);
    }
    function getDosenById2($id)
    {
        $query = "SELECT * FROM dosen 
                  JOIN bidang ON dosen.bidang_id=bidang.bidang_id 
                  JOIN jabatan ON dosen.jabatan_id=jabatan.jabatan_id 
                  WHERE dosen_id=$id";
        return $this->executeSingle($query);
    }

    function searchDosen($keyword) {
        $query = "SELECT * FROM dosen 
                  JOIN bidang ON dosen.bidang_id=bidang.bidang_id 
                  JOIN jabatan ON dosen.jabatan_id=jabatan.jabatan_id 
                  WHERE dosen_nama LIKE '%$keyword%'";

        return $this->execute($query);
    }

    function addData($data, $file)
    {
        $foto = $file['tmp_name'];
        $nip = $data['dosen_nip'];
        $nama = $data['dosen_nama'];
        $email = $data['dosen_email'];
        $bidangId = $data['bidang_id'];
        $jabatanId = $data['jabatan_id'];

        $targetDir = 'assets/images/';
        $targetFile = $targetDir . basename($file['name']);
        $foto1 = basename($file['name']);

        if (move_uploaded_file($foto, $targetFile)) {
            $query = "INSERT INTO dosen (dosen_foto, dosen_nip, dosen_nama, dosen_email, bidang_id, jabatan_id) 
                      VALUES ('$foto1', '$nip', '$nama', '$email', '$bidangId', '$jabatanId')";
            
            return $this->execute($query);
        } else {
            return false;
        }
    }

    function updateData($id, $data)
    {
        $foto = $data['dosen_foto'];
        $nip = $data['dosen_nip'];
        $nama = $data['dosen_nama'];
        $email = $data['dosen_email'];
        $bidangId = $data['bidang_id'];
        $jabatanId = $data['jabatan_id'];
    
        $query = "UPDATE dosen SET 
                      dosen_foto='$foto', 
                      dosen_nip='$nip', 
                      dosen_nama='$nama', 
                      dosen_email='$email', 
                      bidang_id='$bidangId', 
                      jabatan_id='$jabatanId' 
                      WHERE dosen_id=$id";
            
            return $this->execute($query);
    }
    
    function deleteData($id)
    {
        $query = "DELETE FROM dosen WHERE dosen_id=$id";
        return $this->execute($query);
    }
}