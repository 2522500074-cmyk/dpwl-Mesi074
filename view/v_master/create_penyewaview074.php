<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6"><h1 class="m-0">Entri Data Penyewa</h1></div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-users"></i> Form Entri Data Penyewa</h3>
        </div>
        <!-- INI YANG AKU BENERIN - PAKAI BASEURL -->
        <form action="<?= BASEURL ?>/?url=c_master/Penyewa_C074/simpan" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Username (User Pelanggan)</label>
                  <input type="text" name="username074" class="form-control" placeholder="Contoh: Budi123" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kata Sandi (Password)</label>
                  <input type="password" name="password074" class="form-control" placeholder="Masukkan kata sandi" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>NIK</label>
                  <input type="text" name="nik074" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_lengkap074" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. Handphone</label>
                  <input type="text" name="no_handphone074" class="form-control" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Alamat Lengkap</label>
              <textarea name="alamat_lengkap074" class="form-control" rows="3" required></textarea>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Foto KTP</label>
                  <input type="file" name="ft_ktp074" id="ft_ktp074" class="form-control" accept="image/*" required>
                  <img id="preview_ktp074" src="" width="100%" style="margin-top:10px; display:none; border-radius:8px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Foto SIM A</label>
                  <input type="file" name="ft_sim_a074" id="ft_sim_a074" class="form-control" accept="image/*" required>
                  <img id="preview_sim_a074" src="" width="100%" style="margin-top:10px; display:none; border-radius:8px;">
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="<?= BASEURL ?>/?url=c_master/Penyewa_C074/index" class="btn btn-secondary">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<script>
  function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById(previewId).src = e.target.result;
        document.getElementById(previewId).style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  document.getElementById('ft_ktp074').addEventListener('change', function(){ previewImage(this, 'preview_ktp074'); });
  document.getElementById('ft_sim_a074').addEventListener('change', function(){ previewImage(this, 'preview_sim_a074'); });
</script>