            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Jurusan</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('jurusan.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label>Nama Jurusan</label>
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Jurusan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>