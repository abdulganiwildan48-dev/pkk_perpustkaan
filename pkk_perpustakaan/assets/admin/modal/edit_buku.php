<div class="modal fade" id="edit<?= $data['id_buku']?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="../action/aksi_edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_buku" id="id_buku" value="<?= $data['id_buku']?>">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?=$data['judul']?>">
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control"
                            value="<?=$data['penulis']?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select type="select" name="status" id="status" class="form-control"
                            value="<?=$data['status']?>">
                            <option value="Tersedia">Tersedia</option>
                            <option value="tidak tersedia">tidak tersedia</option>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok (Maksimal 20)</label>
                        <input type="teks" name="stok" id="stok" class="form-control" value="<?=$data['stok']?>">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Tambah Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <input type="hidden" name="gambar_lama" value="<?=$data['gambar']?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name='update' class="btn btn-primary">Ubah</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>