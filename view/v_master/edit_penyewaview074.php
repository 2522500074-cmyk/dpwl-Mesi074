<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1 class="m-0">Update Penyewa</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C074/index">Master Penyewa</a>
                        </li>
                        <li class="breadcrumb-item active">Update Penyewa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user-edit"></i>
                        Form Update Data Penyewa - <?= $p['nik074'] ?>
                    </h3>
                </div>

                <form action="<?= BASEURL ?>/?url=c_master/Penyewa_C074/ubah" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="user_lama074" value="<?= $p['user_plg074'] ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username074" class="form-control"
                                        value="<?= $p['user_plg074'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password074" class="form-control"
                                        value="<?= $p['sandi074'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik074" class="form-control"
                                        value="<?= $p['nik074'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap074" class="form-control"
                                        value="<?= $p['nm_lngkp074'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP</label>
                                    <input type="text" name="no_handphone074" class="form-control"
                                        value="<?= $p['no_hp074'] ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap074" class="form-control" rows="4" required><?= $p['almt_lngkp074'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Foto KTP</label><br>
                                    <img src="<?= BASEURL ?>/img/<?= $p['ft_ktp'] ?>"
                                        width="150" style="border-radius:8px; border:1px solid #ddd; margin-bottom:8px;"><br>
                                    <input type="file" name="ft_ktp074" class="form-control" accept="image/*">
                                    <small> Kosongkan jika tidak ganti</small>
                                </div>

                                <div class="form-group">
                                    <label>Foto SIM A</label><br>
                                    <img src="<?= BASEURL ?>/img/<?= $p['ft_sim_a'] ?>"
                                        width="150" style="border-radius:8px; border:1px solid #ddd; margin-bottom:8px;"><br>
                                    <input type="file" name="ft_sim_a074" class="form-control" accept="image/*">
                                    <small> Kosongkan jika tidak ganti</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                        <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C074/index" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>