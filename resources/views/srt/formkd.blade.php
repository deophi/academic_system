            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Klasifikasi Dasar</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('klasifikasi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="index" value="1">
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Kode</label>
                        <input type="text" name="id" class="form-control" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan Klasifikasi Dasar</button>
                  </form>
                </div>
              </div>
            </div>