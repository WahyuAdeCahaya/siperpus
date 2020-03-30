<?php
include '../aset/header.php'
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                <h2>Tambah Data Buku</h2>
                </div>
                <div class="card-body">
                <form method="post" action="proses-tambah.php">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan judul buku">
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan nama penerbit">
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Masukkan nama pengarang">
                        </div>
                        <div class="form-group">
                            <label for="ringkasan">Ringkasan</label>
                            <input type="text" class="form-control" name="ringkasan" id="ringkasan" placeholder="Masukkan ringkasan buku">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Buku</label>
                            <input type="text" class="form-control" name="stok" id="stok" placeholder="Masukkan jumlah stok buku">
                        </div>                        
                            
                            <label for="id_kategori">Kategori Buku</label>
                            <input type="radio" class="form-control" name="id_kategori" id="id_kategori">Laki-Laki
                            <input type="radio" class="form-control" name="id_kategori" id="id_kategori">Laki-Laki
                        </div>


                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../aset/footer.php'
?>

