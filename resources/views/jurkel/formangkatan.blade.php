            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Tahun Angkatan</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('angkatan') }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Tahun Awal Periode</label>
                        <input type="number" class="form-control" name="awal" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Tahun Akhir Periode</label>
                        <input type="number" name="akhir" class="form-control" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Tahun Angkatan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>