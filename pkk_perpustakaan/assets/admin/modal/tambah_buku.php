<form action="../action/aksi_tambahbuku.php" method="post" enctype="multipart/form-data">

<div class="modal fade" id="tambah_buku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul_buku" class="form-label">Judul</label>
                            <input type="tel" name="judul" id="judul" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="tel" name="penulis" id="penulis" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok (Maksimal 20)</label>
                            <input type="number" name="stok" id="stok" class="form-control" max="20" min="0" required>
                        </div>
                         <div class="mb-3">
                            <label for="gambar" class="form-label">Tambah Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name='simpan' class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
