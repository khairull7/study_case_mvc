<?php

class MinjamModel {

    private $table = 'tb_minjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMinjam()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMinjamById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahMinjam($data)
{
    // Menghitung tanggal kembali dengan menambahkan 2 hari ke tanggal peminjaman
    $tgl_kembali = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days'));

    $query = "INSERT INTO tb_minjam (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
    $this->db->query($query);
    $this->db->bind('nama_peminjam', $data['nama_peminjam']);
    $this->db->bind('jenis_barang', $data['jenis_barang']);
    $this->db->bind('no_barang', $data['no_barang']);
    $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
    $this->db->bind('tgl_kembali', $tgl_kembali); // Menggunakan tanggal kembali yang dihitung
    $this->db->execute();

    return $this->db->rowCount();
}


    public function updateDataMinjam($data) {
        
        $query = "UPDATE tb_minjam SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    

    public function deleteMinjam($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMinjam()
    {
        $cari = $_POST['cari'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_peminjam LIKE :cari');
        $this->db->bind('cari', "%$cari%");
        return $this->db->resultSet();
    }
}

?>