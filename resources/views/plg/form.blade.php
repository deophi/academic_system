			      <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Poin Pelanggaran</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('pelanggaran.store') }}" method="post">
                  	@csrf
                    <input type="hidden" name="id" value="2">
                    <div class="form-group">
                      <label>Nama Pelanggaran</label>
                      <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Poin Pelanggaran</label>
                      <input type="number" class="form-control" name="poin" required>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Poin Pelanggaran</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>