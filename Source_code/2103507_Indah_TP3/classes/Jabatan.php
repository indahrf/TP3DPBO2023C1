<?php
class Jabatan extends DB
{
    function getJabatan()
    {
        $query = "SELECT * FROM jabatan";
        return $this->execute($query);
    }

    function getJabatanById($id)
    {
        $query = "SELECT * FROM jabatan WHERE jabatan_id=$id";
        return $this->executeSingle($query);
    }

    function addJabatan($data)
    {
        $jabatanNama = $data['jabatan_nama'];
        $query = "INSERT INTO jabatan (jabatan_nama) VALUES ('$jabatanNama')";
        return $this->execute($query);
    }

    function updateJabatan($id, $data)
    {
        $jabatanNama = $data['jabatan_nama'];
        $query = "UPDATE jabatan SET jabatan_nama='$jabatanNama' WHERE jabatan_id=$id";
        return $this->execute($query);
    }

    function deleteJabatan($id)
    {
        $query = "DELETE FROM jabatan WHERE jabatan_id=$id";
        return $this->execute($query);
    }
}
