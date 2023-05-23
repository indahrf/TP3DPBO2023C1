<?php

class Bidang extends DB
{
    function getBidang()
    {
        $query = "SELECT * FROM bidang";
        return $this->execute($query);
    }

    function getBidangById($id)
    {
        $query = "SELECT * FROM bidang WHERE bidang_id=$id";
        return $this->executeSingle($query); 
    }

    function addBidang($data)
    {
        $bidangNama = $data['bidang_nama'];
        $query = "INSERT INTO bidang (bidang_nama) VALUES ('$bidangNama')";
        return $this->executeAffected($query);
    }

    function updateBidang($id, $data)
    {
        $bidangNama = $data['bidang_nama'];
        $query = "UPDATE bidang SET bidang_nama='$bidangNama' WHERE bidang_id=$id";
        return $this->executeAffected($query);
    }

    function deleteBidang($id)
    {
        $query = "DELETE FROM bidang WHERE bidang_id=$id";
        return $this->executeAffected($query);
    }
}
