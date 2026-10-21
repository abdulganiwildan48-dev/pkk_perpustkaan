<form action="../action/aksi_hapus_pinjam.php" method="post">
<div class="modal fade" id="modal_pinjam<?= $data['id_pinjam'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="id_pinjam" id="id_pinjam"value="<?= $data['id_pinjam']?>">
                    <input type="hidden" name="id_buku" id="id_buku"value="<?= $data['id_buku']?>">
                        <div>
                            <h5>Apakah anda yakin ingin menghapus data ?</h5>
                            <p>Nama: <b><?= $data['nama_peminjam']?></b></p>
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name='hapus' class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
</form>