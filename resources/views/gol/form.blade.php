              <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Golongan</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('pns.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label>Nama Golongan</label>
                        <input type="text" class="form-control" name="nama">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-action">Simpan Golongan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>