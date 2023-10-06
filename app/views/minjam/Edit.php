<div class="container">
  
    <h3 class="mb-3">Edit Peminjaman : <?= $data['minjam']['nama_peminjam']?></h3>

    <form action="<?= BASE_URL; ?>/minjam/updateMinjam" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['minjam']['id']; ?>">
            <div class="form-group mb-3">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama_peminjam" value="<?= $data['minjam']['nama_peminjam']?>"   >

        </div>
        <div class="form-group mb-3">
            <label for="jenis_barang">Jenis Barang</label>
            <select class="form-select" aria-label="Default select example" id="jenis_barang" name="jenis_barang" >
            <option hidden><?= $data['minjam']['jenis_barang']; ?></option>
            <option value="1">Laptop</option>
            <option value="2">HP</option>
            <option value="3">Adaptor LAN</option>
            </select>
            </div>
            <div class="form-group mb-3">
            <label for="no_barang">Nomor Barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['minjam']['no_barang']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['minjam']['tgl_pinjam']; ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['minjam']['tgl_kembali']; ?>">
        </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>