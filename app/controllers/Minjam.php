<?php

class Minjam extends Controller {

    public function index()
    {
        $data['judul'] = 'Data Peminjaman';
        $data['minjam'] = $this->model('MinjamModel')->getAllMinjam();
        $this->view('templates/header', $data);
        $this->view('minjam/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Tambah Peminjaman';
        $this->view('templates/header', $data);
        $this->view('minjam/create');
        $this->view('templates/footer');
    }

    public function simpanMinjam(){
        if ($_POST['jenis_barang'] == 'Pilih') {
            echo "<script> alert('Pilih Jenis Barang Terlebih Dahulu!!');
            document.location.href = '". BASE_URL ."/minjam/index';
            </script>";
            exit;
        }

        if( $this->model("MinjamModel")->tambahMinjam($_POST) > 0 ) {
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/minjam/index');
            exit;
        }
    }

    public function edit($id){

        $data['judul'] = 'Edit Peminjaman';
        $data['minjam'] = $this->model('MinjamModel')->getMinjamById($id);
        $this->view('templates/header', $data);
        $this->view('minjam/edit', $data);
        $this->view('templates/footer');
    }

    public function updateMinjam() {
        if ($this->model('MinjamModel')->updateDataMinjam($_POST) > 0) {
            header('location: ' . BASE_URL . '/minjam/index');
            exit;
        } else {
            header('location: ' . BASE_URL . '/minjam/index');
            exit;
        }
    }
    

    public function hapus($id){
            if ( $this->model('MinjamModel')->deleteMinjam($id) > 0) {
                header('location: '. BASE_URL . '/minjam/index');
                exit;
            }else{
                header('location: '. BASE_URL . '/minjam/index');
                exit;
            }
    }

    public function cari(){

        $data['judul'] = 'Data Peminjaman';
        $data['minjam'] = $this->model('MinjamModel')->cariMinjam();
        $this->view('templates/header', $data);
        $this->view('minjam/index', $data);
        $this->view('templates/footer');
    }
   
}
?>