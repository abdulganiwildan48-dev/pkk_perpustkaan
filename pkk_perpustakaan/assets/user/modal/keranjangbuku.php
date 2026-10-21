<form action="../action/aksi_pinjam.php" method="post">

<div class="modal fade" id="keranjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Keranjang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Buku" class="form-label">Buku</label>
                            <ul>
                            <?php
                            $no = 1;
                            $query = "SELECT tkeranjang.IDKJ, tbuku.judul FROM tbuku INNER JOIN tkeranjang ON tkeranjang.id_buku = tbuku.id_buku";
                            $result = mysqli_query($koneksi, $query);   
                            while ($data = mysqli_fetch_assoc($result)){
                            ?>
                                  
                                  <li>
                                    <?=$data['judul']?>
                                  </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <input type="hidden" name="id_pinjam" id="id_pinjam" class="form-control">
                        <input type="hidden" name="id_buku" id="id_buku" value="<?= $data['id_buku']?>">
                        
                        <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                         <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                         <div class="mb-3">
                            <label for="Telp" class="form-label">NO Telpon</label>
                            <input type="text" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="date" 
                            min=<?= date('Y-m-d', strtotime('+1 day'))?>
                            max=<?= date('Y-m-d', strtotime('+3 day'))?>
                            name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" required>
                            <label for="">Default mulai dari 3 hari sekarang</label>
                            <br>
                            <label for="">Denda dihitung per hari : 2000</label>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" name="reset">Reset</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" name='simpan' class="btn btn-primary">Pinjam</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</form>
