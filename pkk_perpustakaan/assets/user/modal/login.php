<form action="../action/aksi_login.php" method="post" enctype="multipart/form-data">

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukkan Password">
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
                        <button type="submit" name='login' class="btn btn-primary">Login</button>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
