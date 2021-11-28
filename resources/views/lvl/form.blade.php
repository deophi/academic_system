      			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Jabatan</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('status.store') }}" method="post">
                  	@csrf
                    <div class="form-group">
                      <label>Nama Jabatan</label>
                      <input type="text" class="form-control" name="nama" required>
                      <div class="invalid-feedback">
                      	Nama Jabatan harus diisi
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Jabatan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>