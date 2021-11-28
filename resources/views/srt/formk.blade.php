            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Klasifikasi</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('klasifikasi.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="index" value="2">
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Kode</label>
                        <input type="text" name="id" class="form-control" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Klasifikasi Dasar</label>
                      <select class="form-control" name="sid">
                        @foreach($kd as $r)
                          <option value="{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }}">{{ str_pad($r->id, 3, '0', STR_PAD_LEFT) }} - {{ $r->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Klasifikasi</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>