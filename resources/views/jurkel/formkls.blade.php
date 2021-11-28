            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Tambah Kelas</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('kelas.store') }}" method="post">
                    @csrf
                    <div class="row">
                      <div class="form-group col-6">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="nama" required>
                      </div>
                      <div class="form-group col-6">
                        <label>Wali Kelas</label>
                        <select class="form-control select2" name="wali">
                          @foreach($wali as $r)
                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-4">
                        <label>Jurusan</label>
                        <select name="jur" class="form-control">
                          @foreach($jur as $r)
                            @if($r->id != 0)
                              <option value="{{ $r->id }}">{{ $r->nama }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-5">
                        <label>Angkatan</label>
                        <select name="akt" class="form-control">
                          @foreach($akt as $r)
                            <option value="{{ $r->id }}">{{ $r->tahun }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group col-3">
                        <label>Tingkat</label>
                        <select name="tingkat" class="form-control">
                          @for($i=1; $i < 4; $i++)
                          <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Kelas</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>